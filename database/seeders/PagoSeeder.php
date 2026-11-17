<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pago;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pago::create([
            'total_pago' => 150000.00,
            'cantidad' => 1,
            'estado' => 'Completado',
            'metodo_pago' => 'Efectivo',
            'fecha_pago' => '2026-11-17 10:00:00',
            'numero_identificacion' => 1020304050,
            'id_labor' => 1
        ]);
    }
}