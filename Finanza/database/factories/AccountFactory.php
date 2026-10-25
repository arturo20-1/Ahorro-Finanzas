<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->randomElement(['Cuenta corriente', 'Ahorros', 'Efectivo', 'Tarjeta de crédito']),
            'type' => fake()->randomElement(['checking', 'savings', 'cash', 'credit']),
            'balance' => fake()->randomFloat(2, 100, 20000),
            'currency' => 'USD',
        ];
    }
}
