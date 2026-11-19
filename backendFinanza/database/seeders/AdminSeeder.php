<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Crea el usuario administrador de prueba (se puede ejecutar varias veces).
     * Cambia la contraseña antes de publicar el proyecto.
     */
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Administrador', 'password' => 'password'],
        );

        // is_admin no es rellenable en masa a propósito: nadie puede darse permisos desde un formulario
        $admin->forceFill(['is_admin' => true])->save();
    }
}
