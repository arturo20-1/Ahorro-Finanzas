<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
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
        $variacion = fn (float $ahora, float $antes): ?float => $antes > 0 ? (($ahora - $antes) / $antes) * 100 : null;
        $formato = fn (?float $v): string => $v === null ? 'Sin datos previos' : (($v >= 0 ? '+' : '').number_format($v, 1).'%');

        $cambioIngresos = $variacion($ingresos, $ingresosPrevio);
        $cambioGastos = $variacion($gastos, $gastosPrevio);

        if ($tasa >= 50) {
            $saludTasa = 'Salud excelente ✨';
        } elseif ($tasa >= 20) {
            $saludTasa = 'Buen ritmo de ahorro';
        } elseif ($tasa >= 0) {
            $saludTasa = 'Ahorro ajustado';
        } else {
            $saludTasa = 'Gastas más de lo que ingresas';
        }

        return view('dashboard', [
            'balance' => (float) $usuario->accounts()->sum('balance'),
            'nCuentas' => $usuario->accounts()->count(),
            'ingresos' => $ingresos,
            'gastos' => $gastos,
            'nIngresos' => (int) ($actual->get(Transaction::TYPE_INCOME)?->cantidad ?? 0),
            'neto' => $neto,
            'tasa' => $tasa,
            'tasaCirculo' => max(0, min(100, round($tasa, 1))),
            'saludTasa' => $saludTasa,
            'textoCambioIngresos' => $formato($cambioIngresos),
            'textoCambioGastos' => $formato($cambioGastos),
            'iconoIngresos' => ($cambioIngresos ?? 0) >= 0 ? 'north_east' : 'south_east',
            'iconoGastos' => ($cambioGastos ?? 0) > 0 ? 'north_east' : 'south',
            'gastoSubio' => ($cambioGastos ?? 0) > 0,
            'totalMes' => (int) $actual->sum('cantidad'),
            'recientes' => Transaction::query()
                ->where('user_id', $usuario->id)
                ->with(['category', 'account'])
                ->orderByDesc('transaction_date')
                ->orderByDesc('id')
                ->limit(6)
                ->get(),
        ]);
    }
}
