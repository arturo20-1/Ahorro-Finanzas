<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Models\Category;
use App\Models\Transaction;
use App\Services\TransactionRecorder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
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
    public function store(StoreTransactionRequest $request, TransactionRecorder $registrador): RedirectResponse
    {
        $usuario = $request->user();

        // Datos ya validados (incluida la regla "categoría del mismo tipo") por StoreTransactionRequest
        $datos = $request->validated();

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
            // Guarda la transacción y ajusta el saldo de la cuenta (ver App\Services\TransactionRecorder)
            $registrador->record($usuario, $datos);
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
