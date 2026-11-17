<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asistencia;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asistencia::create([
            'numero_identificacion' => 1020304050,
            'fecha' => '2026-11-17',
            'hora_entrada' => '08:00:00',
            'hora_salida' => '17:00:00',
            'estado_validacion' => 'Presente'
        ]);
    }
}