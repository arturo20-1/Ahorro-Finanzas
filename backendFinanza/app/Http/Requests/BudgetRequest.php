<?php

namespace App\Http\Requests;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valida crear y editar un presupuesto (límite de gasto por categoría).
 */
class BudgetRequest extends FormRequest
{
    /**
     * Al editar, el presupuesto debe ser del usuario (si no, 404). Al crear no hay presupuesto en la ruta.
     */
    public function authorize(): bool
    {
        $presupuesto = $this->route('budget');

        return ! ($presupuesto instanceof Budget) || $presupuesto->user_id === $this->user()->id;
    }

    protected function failedAuthorization()
    {
        abort(404);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $presupuesto = $this->route('budget');

        return [
            // Solo categorías de gasto
            'category_id' => ['required', Rule::exists('categories', 'id')->where('type', Category::TYPE_EXPENSE)],
            'amount_limit' => ['required', 'numeric', 'gt:0', 'max:9999999999.99'],
            'start_date' => [
                'required', 'date',
                // La base de datos no permite dos presupuestos de la misma categoría con la misma fecha de inicio
                Rule::unique('budgets', 'start_date')
                    ->where(fn ($q) => $q->where('user_id', $this->user()->id)->where('category_id', $this->input('category_id')))
                    ->ignore($presupuesto instanceof Budget ? $presupuesto->id : null),
            ],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.required' => 'Elige una categoría.',
            'category_id.exists' => 'Elige una categoría de gasto válida.',
            'amount_limit.required' => 'Escribe el límite del presupuesto.',
            'amount_limit.numeric' => 'El límite debe ser un número.',
            'amount_limit.gt' => 'El límite debe ser mayor que cero.',
            'start_date.required' => 'Elige la fecha de inicio.',
            'start_date.date' => 'La fecha de inicio no es válida.',
            'start_date.unique' => 'Ya tienes un presupuesto de esa categoría que empieza ese día.',
            'end_date.required' => 'Elige la fecha de fin.',
            'end_date.date' => 'La fecha de fin no es válida.',
            'end_date.after_or_equal' => 'La fecha de fin no puede ser anterior a la de inicio.',
        ];
    }
}
