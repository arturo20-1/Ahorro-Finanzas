<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AnalyticsController extends Controller
{
    /**
     * Reportes: totales, gasto por categoría y evolución de los últimos 6 meses.
     * Parámetro: ?period=month|quarter|year  (por defecto month)
     */
    public function index(Request $request): JsonResponse
    {
        $usuario = $request->user();

        $periodo = in_array($request->query('period'), ['month', 'quarter', 'year'], true)
            ? $request->query('period')
            : 'month';

        $hoy = Carbon::today();

        [$desde, $hasta] = match ($periodo) {
            'quarter' => [$hoy->copy()->startOfMonth()->subMonthsNoOverflow(2), $hoy->copy()->endOfMonth()],
            'year' => [$hoy->copy()->startOfYear(), $hoy->copy()->endOfYear()],
            default => [$hoy->copy()->startOfMonth(), $hoy->copy()->endOfMonth()],
        };

        $enPeriodo = Transaction::query()
            ->where('user_id', $usuario->id)
            ->whereBetween('transaction_date', [$desde->toDateString(), $hasta->toDateString()]);

        $totales = (clone $enPeriodo)
            ->selectRaw('type, COUNT(*) as cantidad, SUM(amount) as total')
            ->groupBy('type')
            ->get()
            ->keyBy('type');

        $ingresos = (float) ($totales->get(Transaction::TYPE_INCOME)?->total ?? 0);
        $gastos = (float) ($totales->get(Transaction::TYPE_EXPENSE)?->total ?? 0);
        $neto = $ingresos - $gastos;

        // Gasto por categoría, de mayor a menor
        $categorias = (clone $enPeriodo)
            ->where('type', Transaction::TYPE_EXPENSE)
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->with('category')
            ->get()
            ->map(fn ($fila) => [
                'id' => $fila->category_id,
                'name' => $fila->category?->name,
                'color' => $fila->category?->color,
                'icon' => $fila->category?->icon,
                'total' => (float) $fila->total,
                'percentage' => $gastos > 0 ? round((float) $fila->total / $gastos * 100, 1) : 0.0,
            ])
            ->values();

        // Últimos 6 meses (incluye el actual)
        $inicioSerie = $hoy->copy()->startOfMonth()->subMonthsNoOverflow(5);
        $filas = Transaction::query()
            ->where('user_id', $usuario->id)
            ->where('transaction_date', '>=', $inicioSerie->toDateString())
            ->get(['type', 'amount', 'transaction_date']);

        $mensual = collect(range(0, 5))->map(function (int $i) use ($inicioSerie, $filas) {
            $mes = $inicioSerie->copy()->addMonthsNoOverflow($i);
            $delMes = $filas->filter(fn ($t) => $t->transaction_date->isSameMonth($mes));
            $ing = (float) $delMes->where('type', Transaction::TYPE_INCOME)->sum('amount');
            $gas = (float) $delMes->where('type', Transaction::TYPE_EXPENSE)->sum('amount');

            return ['month' => $mes->format('Y-m'), 'income' => $ing, 'expenses' => $gas, 'net' => $ing - $gas];
        })->values();

        return response()->json(['data' => [
            'period' => $periodo,
            'from' => $desde->toDateString(),
            'to' => $hasta->toDateString(),
            'net_worth' => (float) $usuario->accounts()->sum('balance'),
            'income' => $ingresos,
            'expenses' => $gastos,
            'net' => $neto,
            'savings_rate' => $ingresos > 0 ? round(($neto / $ingresos) * 100, 1) : 0.0,
            'transactions_count' => (int) $totales->sum('cantidad'),
            'top_category' => $categorias->first(),
            'categories' => $categorias,
            'monthly' => $mensual,
        ]]);
    }
}
