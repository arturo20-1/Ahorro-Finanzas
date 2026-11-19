<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'type' => fake()->randomElement([Category::TYPE_INCOME, Category::TYPE_EXPENSE]),
            'color' => fake()->hexColor(),
            'icon' => 'category',
        ];
    }
}
