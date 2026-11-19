<?php

namespace App\Http\Resources;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $tipo = Account::TYPES[$this->type] ?? null;
        $atributos = $this->resource->getAttributes();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'type_label' => $tipo['label'] ?? $this->type,
            'icon' => $tipo['icon'] ?? 'account_balance',
            'group' => $tipo['group'] ?? 'bank',
            'balance' => (float) $this->balance,
            'currency' => $this->currency,
            // Solo aparece si el controller usó withCount('transactions')
            'transactions_count' => $this->whenCounted('transactions'),
            // Solo aparecen si el controller calculó el movimiento del mes (listado)
            'month_income' => $this->when(array_key_exists('ingresos_mes', $atributos), fn () => (float) $this->ingresos_mes),
            'month_expenses' => $this->when(array_key_exists('gastos_mes', $atributos), fn () => (float) $this->gastos_mes),
            'last_movement' => $this->when(array_key_exists('ultimo_movimiento', $atributos), fn () => $this->ultimo_movimiento),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
