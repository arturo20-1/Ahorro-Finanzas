<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Usuario de prueba con datos de ejemplo.
     * Si ya tiene cuentas, no vuelve a crear nada.
     */
    public function run(): void
    {
        $usuario = User::firstOrCreate(
            ['email' => 'demo@example.com'],
            ['name' => 'Usuario Demo', 'password' => 'password'],
        );

        if ($usuario->accounts()->exists()) {
            return;
        }

        $corriente = Account::create([
            'user_id' => $usuario->id,
            'name' => 'Cuenta corriente',
            'type' => 'checking',
            'balance' => 4200.50,
            'currency' => 'USD',
        ]);

        Account::create([
            'user_id' => $usuario->id,
            'name' => 'Ahorros',
            'type' => 'savings',
            'balance' => 12500.00,
            'currency' => 'USD',
        ]);

        $nomina = Category::where('name', 'Nómina')->first();
        $gastos = Category::where('type', Category::TYPE_EXPENSE)->get();

        // Nómina del mes actual y del anterior
        foreach ([now()->startOfMonth(), now()->startOfMonth()->subMonth()] as $fecha) {
            Transaction::create([
                'user_id' => $usuario->id,
                'account_id' => $corriente->id,
                'category_id' => $nomina->id,
                'amount' => 2500.00,
                'type' => Transaction::TYPE_INCOME,
                'description' => 'Pago de nómina',
                'transaction_date' => $fecha->toDateString(),
            ]);
        }

        // Gastos de los últimos 30 días
        for ($i = 0; $i < 18; $i++) {
            $categoria = $gastos->random();

            Transaction::create([
                'user_id' => $usuario->id,
                'account_id' => $corriente->id,
                'category_id' => $categoria->id,
                'amount' => fake()->randomFloat(2, 5, 180),
                'type' => Transaction::TYPE_EXPENSE,
                'description' => $categoria->name,
                'transaction_date' => now()->subDays(random_int(0, 29))->toDateString(),
            ]);
        }

        // Presupuestos del mes actual
        $presupuestos = ['Alimentación' => 400.00, 'Transporte' => 150.00];

        foreach ($presupuestos as $nombre => $limite) {
            Budget::create([
                'user_id' => $usuario->id,
                'category_id' => Category::where('name', $nombre)->value('id'),
                'amount_limit' => $limite,
                'start_date' => now()->startOfMonth()->toDateString(),
                'end_date' => now()->endOfMonth()->toDateString(),
            ]);
        }

        // Metas de ahorro
        Goal::create([
            'user_id' => $usuario->id,
            'name' => 'Fondo de emergencia',
            'target_amount' => 10000.00,
            'current_amount' => 7800.00,
            'target_date' => now()->addMonths(8)->toDateString(),
        ]);

        Goal::create([
            'user_id' => $usuario->id,
            'name' => 'Viaje',
            'target_amount' => 3000.00,
            'current_amount' => 900.00,
            'target_date' => now()->addMonths(12)->toDateString(),
        ]);
    }
}
