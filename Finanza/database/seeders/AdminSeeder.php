<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Crea el administrador de prueba (se puede ejecutar varias veces).
     * Cambia la contraseña antes de publicar el proyecto.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Administrador', 'password' => 'password'],
        );
    }
}
