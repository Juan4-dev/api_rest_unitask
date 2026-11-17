<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolSeeder::class,        // 01_rol_table
            UsuarioSeeder::class,    // 02_usuario_table
            ClienteSeeder::class,    // 03_cliente_table
            VehiculoSeeder::class,   // 04_vehiculo_table
            ServicioSeeder::class,   // 05_servicio_table
            PagoSeeder::class,       // 06_pago_table
            AsistenciaSeeder::class, // 07_asistencia_table
            HorarioSeeder::class,    // 08_horario_table
            TurnoSeeder::class,      // 09_turnos_table
        ]);
    }
}
