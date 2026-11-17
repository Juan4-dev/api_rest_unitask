<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'cedula_cliente' => 1010203040,
            'nombre_cliente' => 'Carlos',
            'apellido_cliente' => 'Pérez',
            'telefono_cliente' => '3109876543',
            'correo_cliente' => 'carlos.perez@email.com'
        ]);
    }
}