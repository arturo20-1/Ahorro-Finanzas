<?php

namespace App\Http\Requests;

use App\Models\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valida crear y editar una cuenta (web y API).
 *
 * Al editar, la ruta trae la cuenta ({account}); la usamos para que el
 * nombre "único" ignore a la propia cuenta.
 */
class AccountRequest extends FormRequest
{
    /**
     * Al editar, la cuenta debe ser del usuario. Esto corre ANTES de validar,
     * así nadie puede averiguar qué cuentas existen probando ids ajenos.
     * Al crear no hay cuenta en la ruta, y se permite.
     */
    public function authorize(): bool
    {
        $cuenta = $this->route('account');

        return ! ($cuenta instanceof Account) || $cuenta->user_id === $this->user()->id;
    }

    /**
     * Una cuenta ajena se trata como si no existiera (404 y no 403).
     */
    protected function failedAuthorization()
    {
        abort(404);
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        $cuenta = $this->route('account');

        return [
            'name' => [
                'required', 'string', 'max:80',
                Rule::unique('accounts', 'name')
                    ->where(fn ($q) => $q->where('user_id', $this->user()->id))
                    ->ignore($cuenta instanceof Account ? $cuenta->id : null),
            ],
            'type' => ['required', Rule::in(array_keys(Account::TYPES))],
            'balance' => ['required', 'numeric', 'between:-9999999999.99,9999999999.99'],
            'currency' => ['required', Rule::in(Account::CURRENCIES)],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Escribe el nombre de la cuenta.',
            'name.max' => 'El nombre no puede pasar de 80 caracteres.',
            'name.unique' => 'Ya tienes una cuenta con ese nombre.',
            'type.required' => 'Elige el tipo de cuenta.',
            'type.in' => 'El tipo de cuenta no es válido.',
            'balance.required' => 'Escribe el saldo (puede ser 0).',
            'balance.numeric' => 'El saldo debe ser un número.',
            'balance.between' => 'El saldo es demasiado grande.',
            'currency.required' => 'Elige la moneda.',
            'currency.in' => 'La moneda no es válida.',
        ];
    }
}
