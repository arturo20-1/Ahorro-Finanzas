<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'amount' => fake()->randomFloat(2, 5, 500),
            'type' => fake()->randomElement([Transaction::TYPE_INCOME, Transaction::TYPE_EXPENSE]),
            'description' => fake()->sentence(3),
            'transaction_date' => fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
        ];
    }
}
