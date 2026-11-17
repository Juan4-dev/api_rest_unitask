<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Turno::create([
            'nombre_turno' => 'Matutino',
            'jornada' => 'Diurna',
            'dia_turno' => '2026-11-17',
            'inicio_turno' => '06:00:00',
            'fin_turno' => '14:00:00',
            'horas_extras' => 2,
            'id_horario' => 1
        ]);
    }
}