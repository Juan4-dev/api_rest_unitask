<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'nombre_servicio' => 'Lavado General',
            'labor_servicio' => 'Lavado y Aspirado',
            'horas_labor' => '2026-11-17 08:00:00',
            'cantidad_servicios' => 1,
            'numero_identificacion' => 1020304050,
            'placa_vehiculo' => 'ABC123'
        ]);
    }
}