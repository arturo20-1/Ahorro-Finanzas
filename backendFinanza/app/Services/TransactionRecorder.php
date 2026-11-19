<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * Guarda una transacción y ajusta el saldo de su cuenta, todo o nada.
 * Lo usan el controller web y el de la API, así la regla vive en un solo lugar.
 */
class TransactionRecorder
{
    /**
     * @param  array{type: string, amount: numeric-string|float|int, description: string, category_id: int, account_id: int, transaction_date: string}  $datos
     */
    public function record(User $usuario, array $datos): Transaction
    {
        return DB::transaction(function () use ($usuario, $datos) {
            $transaccion = Transaction::create(['user_id' => $usuario->id] + $datos);

            // Bloquea la fila de la cuenta para que dos movimientos a la vez no pisen el saldo
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

            return $transaccion;
        });
    }
}
