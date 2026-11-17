<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Muestra las cuentas del usuario con su saldo y el movimiento del mes.
     */
    public function index(Request $request): View
    {
        $usuario = $request->user();

        $inicio = Carbon::today()->startOfMonth()->toDateString();
        $fin = Carbon::today()->endOfMonth()->toDateString();

        $delMes = fn (string $tipo) => fn ($q) => $q
            ->where('type', $tipo)
            ->whereBetween('transaction_date', [$inicio, $fin]);

        $cuentas = $usuario->accounts()
            ->withCount('transactions')
            ->withSum(['transactions as ingresos_mes' => $delMes(Transaction::TYPE_INCOME)], 'amount')
            ->withSum(['transactions as gastos_mes' => $delMes(Transaction::TYPE_EXPENSE)], 'amount')
            ->withMax('transactions as ultimo_movimiento', 'transaction_date')
            ->orderBy('name')
            ->get();

        $porGrupo = $cuentas->groupBy(fn (Account $c) => Account::TYPES[$c->type]['group'] ?? 'bank')
            ->map->count();

        $partes = [];
        foreach (['bank' => ['Bancaria', 'Bancarias'], 'credit' => ['Tarjeta', 'Tarjetas'], 'cash' => ['Efectivo', 'Efectivo']] as $grupo => [$singular, $plural]) {
            $n = (int) ($porGrupo[$grupo] ?? 0);
            if ($n > 0) {
                $partes[] = $n.' '.($n === 1 ? $singular : $plural);
            }
        }

        $ingresosMes = (float) $cuentas->sum('ingresos_mes');
        $gastosMes = (float) $cuentas->sum('gastos_mes');

        return view('accounts', [
            'cuentas' => $cuentas,
            'tipos' => Account::TYPES,
            'monedas' => Account::CURRENCIES,
            'patrimonio' => (float) $cuentas->sum('balance'),
            'nCuentas' => $cuentas->count(),
            'nBancarias' => (int) ($porGrupo['bank'] ?? 0),
            'nTarjetas' => (int) ($porGrupo['credit'] ?? 0),
            'nEfectivo' => (int) ($porGrupo['cash'] ?? 0),
            'resumenTipos' => $partes === [] ? 'Aún sin cuentas' : implode(' • ', $partes),
            'flujoMes' => $ingresosMes - $gastosMes,
            'nMovimientosMes' => (int) Transaction::query()
                ->where('user_id', $usuario->id)
                ->whereBetween('transaction_date', [$inicio, $fin])
                ->count(),
        ]);
    }

    public function store(AccountRequest $request): RedirectResponse
    {
        $request->user()->accounts()->create($request->validated());

        return redirect()->route('accounts.index')->with('status', 'Cuenta creada correctamente.');
    }

    public function update(AccountRequest $request, Account $account): RedirectResponse
    {
        // El dueño ya se comprobó en AccountRequest::authorize()

        $account->update($request->validated());

        return redirect()->route('accounts.index')->with('status', 'Cuenta actualizada correctamente.');
    }

    public function destroy(Request $request, Account $account): RedirectResponse
    {
        $this->comprobarDueno($request, $account);

        $borradas = $account->transactions()->count();
        $nombre = $account->name;

        // Las transacciones de la cuenta se borran con ella (cascada de la base de datos)
        $account->delete();

        $mensaje = 'Cuenta «'.$nombre.'» eliminada';
        $mensaje .= $borradas > 0 ? ' junto con '.$borradas.' '.($borradas === 1 ? 'transacción.' : 'transacciones.') : '.';

        return redirect()->route('accounts.index')->with('status', $mensaje);
    }

    /**
     * Una cuenta ajena se trata como si no existiera.
     */
    private function comprobarDueno(Request $request, Account $account): void
    {
        abort_unless($account->user_id === $request->user()->id, 404);
    }
}
