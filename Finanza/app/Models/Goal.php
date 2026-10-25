<?php

namespace App\Models;

use Database\Factories\GoalFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'name', 'target_amount', 'current_amount', 'target_date'])]
class Goal extends Model
{
    /** @use HasFactory<GoalFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'target_amount' => 'decimal:2',
            'current_amount' => 'decimal:2',
            'target_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Porcentaje de avance de la meta (0 a 100).
     */
    public function progress(): float
    {
        if ((float) $this->target_amount <= 0) {
            return 0.0;
        }

        return min(100.0, round((float) $this->current_amount / (float) $this->target_amount * 100, 1));
    }
}
