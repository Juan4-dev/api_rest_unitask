<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW reporte_vista_fallas AS
            SELECT
                CASE
                    WHEN a.estado_validacion = 'Tarde'   THEN 'Llegada tarde'
                    WHEN a.estado_validacion = 'Ausente' THEN 'Inasistencia'
                    ELSE 'Otra falla'
                END AS tipo_fallas,
                SUM(1) AS cantidad_fallas,
                a.numero_identificacion,
                u.nombre_empleado,
                u.apellido_empleado
            FROM asistencias a
            INNER JOIN usuarios u ON u.numero_identificacion = a.numero_identificacion
            WHERE a.estado_validacion <> 'Puntual'
            GROUP BY
                a.numero_identificacion,
                u.nombre_empleado,
                u.apellido_empleado,
                tipo_fallas
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS reporte_vista_fallas");
    }
};