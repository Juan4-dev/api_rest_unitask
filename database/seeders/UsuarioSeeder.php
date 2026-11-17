<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'numero_identificacion' => 1020304050,
            'nombre_empleado' => 'Juan',
            'apellido_empleado' => 'David',
            'telefono_empleado' => '3001234567',
            'correo_empleado' => 'juan@unitask.com',
            'usuario' => 'juandev',
            'contraseña' => Hash::make('Password123'),
            'id_rol' => 1
        ]);
    }
}