<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Resumen del mes para la pantalla principal.
     */
    public function index(Request $request): JsonResponse
    {
        $usuario = $request->user();

        $hoy = Carbon::today();
        $inicio = $hoy->copy()->startOfMonth();
        $fin = $hoy->copy()->endOfMonth();
        $inicioPrevio = $inicio->copy()->subMonthNoOverflow();
        $finPrevio = $inicioPrevio->copy()->endOfMonth();

        // Totales de un periodo, separados por tipo (ingreso / gasto)
        $totalesDe = fn (Carbon $desde, Carbon $hasta) => Transaction::query()
            ->where('user_id', $usuario->id)
            ->whereBetween('transaction_date', [$desde->toDateString(), $hasta->toDateString()])
            ->selectRaw('type, COUNT(*) as cantidad, SUM(amount) as total')
            ->groupBy('type')
            ->get()
            ->keyBy('type');

        $actual = $totalesDe($inicio, $fin);
        $previo = $totalesDe($inicioPrevio, $finPrevio);

        $ingresos = (float) ($actual->get(Transaction::TYPE_INCOME)?->total ?? 0);
        $gastos = (float) ($actual->get(Transaction::TYPE_EXPENSE)?->total ?? 0);
        $ingresosPrevio = (float) ($previo->get(Transaction::TYPE_INCOME)?->total ?? 0);
        $gastosPrevio = (float) ($previo->get(Transaction::TYPE_EXPENSE)?->total ?? 0);

        $neto = $ingresos - $gastos;
        $tasa = $ingresos > 0 ? ($neto / $ingresos) * 100 : 0.0;

        // Variación porcentual contra el mes anterior (null si no hay datos para comparar)
        $variacion = fn (float $ahora, float $antes): ?float => $antes > 0
            ? round((($ahora - $antes) / $antes) * 100, 1)
            : null;

        if ($tasa >= 50) {
            $salud = 'Salud excelente ✨';
        } elseif ($tasa >= 20) {
            $salud = 'Buen ritmo de ahorro';
        } elseif ($tasa >= 0) {
            $salud = 'Ahorro ajustado';
        } else {
            $salud = 'Gastas más de lo que ingresas';
        }

        $recientes = Transaction::query()
            ->where('user_id', $usuario->id)
            ->with(['category', 'account'])
            ->orderByDesc('transaction_date')
            ->orderByDesc('id')
            ->limit(6)
            ->get();

        return response()->json(['data' => [
            'balance' => (float) $usuario->accounts()->sum('balance'),
            'accounts_count' => $usuario->accounts()->count(),
            'income' => $ingresos,
            'expenses' => $gastos,
            'income_count' => (int) ($actual->get(Transaction::TYPE_INCOME)?->cantidad ?? 0),
            'expense_count' => (int) ($actual->get(Transaction::TYPE_EXPENSE)?->cantidad ?? 0),
            'net' => $neto,
            'savings_rate' => round($tasa, 1),
            'health' => $salud,
            'income_change' => $variacion($ingresos, $ingresosPrevio),
            'expense_change' => $variacion($gastos, $gastosPrevio),
            'month_transactions' => (int) $actual->sum('cantidad'),
            'recent' => TransactionResource::collection($recientes)->resolve(),
        ]]);
    }
}
