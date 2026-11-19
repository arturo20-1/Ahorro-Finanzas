<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BudgetResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $limite = (float) $this->amount_limit;
        $gastado = (float) ($this->spent ?? 0); // lo calcula BudgetController
        $porcentaje = $limite > 0 ? round($gastado / $limite * 100, 1) : 0.0;

        return [
            'id' => $this->id,
            'amount_limit' => $limite,
            'spent' => $gastado,
            'remaining' => round($limite - $gastado, 2),
            'percent' => $porcentaje,
            // ok = menos de 80 %, warning = entre 80 y 100 %, exceeded = pasó el límite
            'status' => $porcentaje > 100 ? 'exceeded' : ($porcentaje >= 80 ? 'warning' : 'ok'),
            'start_date' => $this->start_date->toDateString(),
            'end_date' => $this->end_date->toDateString(),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
