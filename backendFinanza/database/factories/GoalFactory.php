<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Goal>
 */
class GoalFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $meta = fake()->randomFloat(2, 1000, 20000);

        return [
            'user_id' => User::factory(),
            'name' => fake()->words(3, true),
            'target_amount' => $meta,
            'current_amount' => fake()->randomFloat(2, 0, $meta),
            'target_date' => now()->addMonths(fake()->numberBetween(3, 18))->toDateString(),
        ];
    }
}
