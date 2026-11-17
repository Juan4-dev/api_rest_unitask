<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Horario::create([
            'tipo_horario' => 'Completo',
            'periodo' => '2026-11-17',
            'numero_identificacion' => 1020304050
        ]);
    }
}