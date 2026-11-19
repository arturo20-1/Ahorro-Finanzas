<?php

namespace App\Models;

use Database\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id', 'name', 'type', 'balance', 'currency'])]
class Account extends Model
{
    /** @use HasFactory<AccountFactory> */
    use HasFactory;

    /**
     * Tipos de cuenta: nombre para mostrar, ícono y grupo (para los filtros de la pantalla).
     */
    public const TYPES = [
        'checking' => ['label' => 'Cuenta corriente', 'icon' => 'account_balance', 'group' => 'bank'],
        'savings' => ['label' => 'Ahorros', 'icon' => 'savings', 'group' => 'bank'],
        'cash' => ['label' => 'Efectivo', 'icon' => 'payments', 'group' => 'cash'],
        'credit' => ['label' => 'Tarjeta de crédito', 'icon' => 'credit_card', 'group' => 'credit'],
    ];

    /**
     * Monedas disponibles al crear una cuenta.
     */
    public const CURRENCIES = ['USD', 'MXN', 'EUR', 'COP', 'PEN', 'ARS', 'CLP'];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'balance' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
