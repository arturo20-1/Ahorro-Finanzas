<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valida el registro de una transacción (web y API).
 */
class StoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in([Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE])],
            'amount' => ['required', 'numeric', 'gt:0', 'max:9999999999.99'],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            // La cuenta debe ser del mismo usuario
            'account_id' => ['required', Rule::exists('accounts', 'id')->where('user_id', $this->user()->id)],
            'transaction_date' => ['required', 'date', 'before_or_equal:today'],
            // Código único del formulario web (anti doble envío); la API no lo necesita
            'submission_token' => [$this->is('api/*') ? 'nullable' : 'required', 'string', 'max:64'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Elige si es un gasto o un ingreso.',
            'type.in' => 'El tipo de transacción no es válido.',
            'amount.required' => 'Escribe el importe.',
            'amount.numeric' => 'El importe debe ser un número.',
            'amount.gt' => 'El importe debe ser mayor que cero.',
            'amount.max' => 'El importe es demasiado grande.',
            'description.required' => 'Escribe el concepto o establecimiento.',
            'description.max' => 'El concepto no puede pasar de 255 caracteres.',
            'category_id.required' => 'Elige una categoría.',
            'category_id.exists' => 'Esa categoría no es válida.',
            'account_id.required' => 'Elige una cuenta.',
            'account_id.exists' => 'Esa cuenta no es válida.',
            'transaction_date.required' => 'Elige la fecha.',
            'transaction_date.date' => 'La fecha no es válida.',
            'transaction_date.before_or_equal' => 'La fecha no puede ser futura.',
        ];
    }

    /**
     * Validación extra que corre después de las reglas normales:
     * el tipo de la categoría debe coincidir con el de la transacción.
     *
     * @return array<int, \Closure>
     */
    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->isNotEmpty()) {
                    return;
                }

                $categoria = Category::find($this->input('category_id'));

                if ($categoria && $categoria->type !== $this->input('type')) {
                    $validator->errors()->add(
                        'category_id',
                        'La categoría elegida no corresponde a este tipo de transacción.'
                    );
                }
            },
        ];
    }
}
