<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehiculo::create([
            'placa_vehiculo' => 'ABC123',
            'tipo_vehiculo' => 'Automóvil',
            'cedula_cliente' => 1010203040
        ]);
    }
}