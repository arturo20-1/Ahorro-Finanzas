<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Throwable;

class TransactionController extends Controller
{
    /**
     * Lista las transacciones del usuario con filtros, totales y paginación.
     */
    public function index(Request $request): View
    {
        $usuario = $request->user();

        // ---- Filtros (vienen por la dirección: ?q=...&type=...&period=...) ----
        $busqueda = trim((string) $request->query('q', ''));
        $tipo = $request->query('type');
        $tipo = in_array($tipo, [Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE], true) ? $tipo : null;
        $periodo = $request->query('period');
        $periodo = in_array($periodo, ['month', '30days', 'year', 'all'], true) ? $periodo : 'month';
        $cuentaId = $request->integer('account');
        $categoriaId = $request->integer('category');

        $hoy = Carbon::today();

        $consulta = Transaction::query()
            ->where('user_id', $usuario->id)
            ->when($busqueda !== '', fn ($q) => $q->where('description', 'like', '%'.$busqueda.'%'))
            ->when($tipo, fn ($q) => $q->where('type', $tipo))
            ->when($cuentaId > 0, fn ($q) => $q->where('account_id', $cuentaId))
            ->when($categoriaId > 0, fn ($q) => $q->where('category_id', $categoriaId));

        if ($periodo === 'month') {
            $consulta->whereBetween('transaction_date', [
                $hoy->copy()->startOfMonth()->toDateString(),
                $hoy->copy()->endOfMonth()->toDateString(),
            ]);
        } elseif ($periodo === '30days') {
            $consulta->where('transaction_date', '>=', $hoy->copy()->subDays(30)->toDateString());
        } elseif ($periodo === 'year') {
            $consulta->whereBetween('transaction_date', [
                $hoy->copy()->startOfYear()->toDateString(),
                $hoy->copy()->endOfYear()->toDateString(),
            ]);
        }

        // ---- Totales del filtro aplicado ----
        $totales = (clone $consulta)
            ->selectRaw('type, COUNT(*) as cantidad, SUM(amount) as total')
            ->groupBy('type')
            ->get()
            ->keyBy('type');

        $ingresos = (float) ($totales->get(Transaction::TYPE_INCOME)?->total ?? 0);
        $gastos = (float) ($totales->get(Transaction::TYPE_EXPENSE)?->total ?? 0);
        $nIngresos = (int) ($totales->get(Transaction::TYPE_INCOME)?->cantidad ?? 0);
        $nGastos = (int) ($totales->get(Transaction::TYPE_EXPENSE)?->cantidad ?? 0);
        $neto = $ingresos - $gastos;
        $tasa = $ingresos > 0 ? ($neto / $ingresos) * 100 : 0.0;

        $transacciones = $consulta
            ->with(['category', 'account'])
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('transactions', [
            'transacciones' => $transacciones,
            'cuentas' => $usuario->accounts()->orderBy('name')->get(),
            'categorias' => Category::orderBy('name')->get(),
            'ingresos' => $ingresos,
            'gastos' => $gastos,
            'nIngresos' => $nIngresos,
            'nGastos' => $nGastos,
            'neto' => $neto,
            'tasa' => $tasa,
            'busqueda' => $busqueda,
            'tipo' => $tipo,
            'periodo' => $periodo,
            'cuentaId' => $cuentaId,
            'categoriaId' => $categoriaId,
        ]);
    }

    /**
     * Guarda una transacción nueva y actualiza el saldo de la cuenta.
     */
    public function store(Request $request): RedirectResponse
    {
        $usuario = $request->user();

        $datos = $request->validate([
            'type' => ['required', Rule::in([Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE])],
            'amount' => ['required', 'numeric', 'gt:0', 'max:9999999999.99'],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // La cuenta debe ser del mismo usuario
            'account_id' => ['required', Rule::exists('accounts', 'id')->where('user_id', $usuario->id)],
            'transaction_date' => ['required', 'date', 'before_or_equal:today'],
            // Código único del formulario: evita guardar la misma transacción dos veces
            'submission_token' => ['required', 'string', 'max:64'],
        ], [
            'type.required' => 'Elige si es un gasto o un ingreso.',
            'type.in' => 'El tipo de transacción no es válido.',
            'amount.required' => 'Escribe el importe.',
            'amount.numeric' => 'El importe debe ser un número.',
            'amount.gt' => 'El importe debe ser mayor que cero.',
            'amount.max' => 'El importe es demasiado grande.',
            'description.required' => 'Escribe el concepto o establecimiento.',
            'description.max' => 'El concepto no puede pasar de 255 caracteres.',
            'category_id.required' => 'Elige una categoría.',
            'category_id.exists' => 'Esa categoría no es válida.',
            'account_id.required' => 'Elige una cuenta.',
            'account_id.exists' => 'Esa cuenta no es válida.',
            'transaction_date.required' => 'Elige la fecha.',
            'transaction_date.date' => 'La fecha no es válida.',
            'transaction_date.before_or_equal' => 'La fecha no puede ser futura.',
        ]);

        // El tipo de la categoría debe coincidir con el de la transacción
        $categoria = Category::findOrFail($datos['category_id']);

        if ($categoria->type !== $datos['type']) {
            throw ValidationException::withMessages([
                'category_id' => 'La categoría elegida no corresponde a este tipo de transacción.',
            ]);
        }

        // Anti doble envío: cada formulario trae un código; solo el primer envío con ese código se guarda
        $token = $datos['submission_token'];
        unset($datos['submission_token']);
        $clave = 'tx-submit:'.$usuario->id.':'.$token;

        if (! Cache::add($clave, true, now()->addMinutes(10))) {
            return redirect()
                ->route('transactions.index')
                ->with('status', 'Esa transacción ya se había guardado.');
        }

        try {
            DB::transaction(function () use ($usuario, $datos) {
                Transaction::create(['user_id' => $usuario->id] + $datos);

                $cuenta = Account::query()
                    ->whereKey($datos['account_id'])
                    ->where('user_id', $usuario->id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($datos['type'] === Transaction::TYPE_INCOME) {
                    $cuenta->increment('balance', $datos['amount']);
                } else {
                    $cuenta->decrement('balance', $datos['amount']);
                }
            });
        } catch (Throwable $e) {
            // Si algo falló, libera el código para poder reintentar
            Cache::forget($clave);

            throw $e;
        }

        // Si la fecha no es de este mes, muestra todo el historial para que se vea la nueva transacción
        $parametros = Carbon::parse($datos['transaction_date'])->isSameMonth(Carbon::today())
            ? []
            : ['period' => 'all'];

        return redirect()
            ->route('transactions.index', $parametros)
            ->with('status', 'Transacción guardada correctamente.');
    }
}
