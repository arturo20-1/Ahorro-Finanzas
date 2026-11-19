<?php

namespace App\Http\Requests;

use App\Models\Goal;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Valida un abono a una meta ("Abonar fondos").
 */
class GoalContributionRequest extends FormRequest
{
    public function authorize(): bool
    {
        $meta = $this->route('goal');

        return $meta instanceof Goal && $meta->user_id === $this->user()->id;
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
            'amount' => ['required', 'numeric', 'gt:0', 'max:9999999999.99'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'amount.required' => 'Escribe el monto a abonar.',
            'amount.numeric' => 'El monto debe ser un número.',
            'amount.gt' => 'El monto debe ser mayor que cero.',
        ];
    }
}
