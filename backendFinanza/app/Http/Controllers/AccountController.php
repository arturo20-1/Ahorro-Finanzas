<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

/**
 * CRUD de cuentas. Se registra con Route::apiResource.
 */
class AccountController extends Controller
{
    /**
     * Cuentas del usuario con su saldo y el movimiento del mes, más un resumen y las opciones de los formularios.
     */
    public function index(Request $request): AnonymousResourceCollection
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

        $tipos = collect(Account::TYPES)
            ->map(fn (array $t, string $clave) => ['value' => $clave, 'label' => $t['label'], 'icon' => $t['icon'], 'group' => $t['group']])
            ->values();

        return AccountResource::collection($cuentas)->additional([
            'summary' => [
                'net_worth' => (float) $cuentas->sum('balance'),
                'accounts_count' => $cuentas->count(),
                'bank_count' => (int) ($porGrupo['bank'] ?? 0),
                'credit_count' => (int) ($porGrupo['credit'] ?? 0),
                'cash_count' => (int) ($porGrupo['cash'] ?? 0),
                'month_flow' => (float) $cuentas->sum('ingresos_mes') - (float) $cuentas->sum('gastos_mes'),
                'month_transactions' => (int) Transaction::query()
                    ->where('user_id', $usuario->id)
                    ->whereBetween('transaction_date', [$inicio, $fin])
                    ->count(),
            ],
            'options' => [
                'types' => $tipos,
                'currencies' => Account::CURRENCIES,
            ],
        ]);
    }

    public function store(AccountRequest $request): AccountResource
    {
        $cuenta = $request->user()->accounts()->create($request->validated());

        return new AccountResource($cuenta);
    }

    public function show(Request $request, Account $account): AccountResource
    {
        $this->comprobarDueno($request, $account);

        return new AccountResource($account->loadCount('transactions'));
    }

    public function update(AccountRequest $request, Account $account): AccountResource
    {
        // El dueño ya se comprobó en AccountRequest::authorize()
        $account->update($request->validated());

        return new AccountResource($account);
    }

    public function destroy(Request $request, Account $account): Response
    {
        $this->comprobarDueno($request, $account);

        $account->delete();

        return response()->noContent(); // 204, sin cuerpo
    }

    /**
     * Una cuenta ajena se trata como si no existiera.
     */
    private function comprobarDueno(Request $request, Account $account): void
    {
        abort_unless($account->user_id === $request->user()->id, 404);
    }
}
