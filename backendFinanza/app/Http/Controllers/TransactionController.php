<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionRecorder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Lista paginada con filtros y totales del filtro aplicado.
     * Filtros (en la URL): ?q=texto&type=income|expense&period=month|30days|year|all&account_id=3&category_id=2
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $usuario = $request->user();

        $busqueda = trim((string) $request->query('q', ''));
        $tipo = in_array($request->query('type'), [Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE], true)
            ? $request->query('type')
            : null;
        $periodo = in_array($request->query('period'), ['month', '30days', 'year', 'all'], true)
            ? $request->query('period')
            : 'month';
        $cuentaId = $request->integer('account_id');
        $categoriaId = $request->integer('category_id');

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

        // Totales del filtro aplicado
        $totales = (clone $consulta)
            ->selectRaw('type, COUNT(*) as cantidad, SUM(amount) as total')
            ->groupBy('type')
            ->get()
            ->keyBy('type');

        $ingresos = (float) ($totales->get(Transaction::TYPE_INCOME)?->total ?? 0);
        $gastos = (float) ($totales->get(Transaction::TYPE_EXPENSE)?->total ?? 0);
        $neto = $ingresos - $gastos;

        $transacciones = $consulta
            ->with(['category', 'account'])
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return TransactionResource::collection($transacciones)->additional([
            'summary' => [
                'income' => $ingresos,
                'expenses' => $gastos,
                'income_count' => (int) ($totales->get(Transaction::TYPE_INCOME)?->cantidad ?? 0),
                'expense_count' => (int) ($totales->get(Transaction::TYPE_EXPENSE)?->cantidad ?? 0),
                'net' => $neto,
                'savings_rate' => $ingresos > 0 ? round(($neto / $ingresos) * 100, 1) : 0.0,
                'period' => $periodo,
            ],
        ]);
    }

    /**
     * Registra la transacción y ajusta el saldo de la cuenta (ver App\Services\TransactionRecorder).
     */
    public function store(StoreTransactionRequest $request, TransactionRecorder $registrador): JsonResponse
    {
        $transaccion = $registrador->record($request->user(), $request->validated());

        return (new TransactionResource($transaccion->load(['category', 'account'])))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Request $request, Transaction $transaction): TransactionResource
    {
        abort_unless($transaction->user_id === $request->user()->id, 404);

        return new TransactionResource($transaction->load(['category', 'account']));
    }
}
