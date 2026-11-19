<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valida la creación de una categoría global (solo administrador).
 */
class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        // El middleware "admin" de la ruta ya comprobó que es administrador
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', Rule::in([Category::TYPE_INCOME, Category::TYPE_EXPENSE])],
            'name' => [
                'required', 'string', 'max:60',
                Rule::unique('categories', 'name')->where('type', $this->input('type')),
            ],
            'color' => ['nullable', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'icon' => ['nullable', 'string', 'max:40', 'regex:/^[a-z0-9_]+$/'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Elige si es de gasto o de ingreso.',
            'type.in' => 'El tipo no es válido.',
            'name.required' => 'Escribe el nombre de la categoría.',
            'name.max' => 'El nombre no puede pasar de 60 caracteres.',
            'name.unique' => 'Ya existe una categoría con ese nombre y tipo.',
            'color.regex' => 'El color debe tener el formato #RRGGBB.',
            'icon.regex' => 'El icono solo puede tener letras minúsculas, números y guion bajo.',
        ];
    }
}
