<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW reporte_vista_asistencias AS
            SELECT
                a.id_asistencia,
                a.numero_identificacion,
                u.nombre_empleado,
                u.apellido_empleado,
                a.fecha,
                a.hora_entrada,
                a.hora_salida,
                a.estado_validacion
            FROM asistencias a
            INNER JOIN usuarios u ON u.numero_identificacion = a.numero_identificacion
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS reporte_vista_asistencias");
    }
};