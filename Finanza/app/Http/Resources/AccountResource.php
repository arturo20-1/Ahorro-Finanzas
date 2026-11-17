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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'type_label' => Account::TYPES[$this->type]['label'] ?? $this->type,
            'balance' => (float) $this->balance,
            'currency' => $this->currency,
            // Solo aparece si el controller usó withCount('transactions')
            'transactions_count' => $this->whenCounted('transactions'),
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
