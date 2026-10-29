<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Catálogo de categorías compartido por todos los usuarios (se puede ejecutar varias veces).
     */
    public function run(): void
    {
        $categorias = [
            ['Alimentación', Category::TYPE_EXPENSE, '#f97316', 'restaurant'],
            ['Transporte', Category::TYPE_EXPENSE, '#3b82f6', 'directions_car'],
            ['Vivienda', Category::TYPE_EXPENSE, '#8b5cf6', 'home'],
            ['Servicios', Category::TYPE_EXPENSE, '#eab308', 'bolt'],
            ['Salud', Category::TYPE_EXPENSE, '#ef4444', 'health_and_safety'],
            ['Entretenimiento', Category::TYPE_EXPENSE, '#ec4899', 'movie'],
            ['Educación', Category::TYPE_EXPENSE, '#06b6d4', 'school'],
            ['Compras', Category::TYPE_EXPENSE, '#14b8a6', 'shopping_bag'],
            ['Nómina', Category::TYPE_INCOME, '#16a34a', 'payments'],
            ['Freelance', Category::TYPE_INCOME, '#22c55e', 'work'],
            ['Inversiones', Category::TYPE_INCOME, '#0ea5e9', 'trending_up'],
            ['Otros ingresos', Category::TYPE_INCOME, '#84cc16', 'add_card'],
        ];

        foreach ($categorias as [$nombre, $tipo, $color, $icono]) {
            Category::updateOrCreate(
                ['name' => $nombre, 'type' => $tipo],
                ['color' => $color, 'icon' => $icono],
            );
        }
    }
}
