<?php

namespace App\Http\Requests;

use App\Models\Goal;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Valida crear y editar una meta de ahorro.
 */
class GoalRequest extends FormRequest
{
    public function authorize(): bool
    {
        $meta = $this->route('goal');

        return ! ($meta instanceof Goal) || $meta->user_id === $this->user()->id;
    }

    protected function failedAuthorization()
    {
        abort(404);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:80'],
            'target_amount' => ['required', 'numeric', 'gt:0', 'max:9999999999.99'],
            'current_amount' => ['nullable', 'numeric', 'min:0', 'max:9999999999.99'],
            'target_date' => ['nullable', 'date'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Escribe el nombre de la meta.',
            'name.max' => 'El nombre no puede pasar de 80 caracteres.',
            'target_amount.required' => 'Escribe el monto objetivo.',
            'target_amount.numeric' => 'El monto objetivo debe ser un número.',
            'target_amount.gt' => 'El monto objetivo debe ser mayor que cero.',
            'current_amount.numeric' => 'Lo ahorrado debe ser un número.',
            'current_amount.min' => 'Lo ahorrado no puede ser negativo.',
            'target_date.date' => 'La fecha límite no es válida.',
        ];
    }
}
