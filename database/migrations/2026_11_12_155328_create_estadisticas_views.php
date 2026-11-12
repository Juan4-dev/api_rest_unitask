<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Primera vista: Estadísticas de asistencias
        DB::statement("
            CREATE OR REPLACE VIEW vista_estadisticas_asistencias AS
            SELECT 
                fecha,
                COUNT(id_asistencia) AS total_asistencias
            FROM asistencias
            GROUP BY fecha
            ORDER BY fecha DESC;
        ");
        
        // Segunda vista: Estadísticas de servicios
        DB::statement("
            CREATE OR REPLACE VIEW vista_estadisticas_servicios AS
            SELECT
                s.id_labor,
                s.nombre_servicio,
                s.cantidad_servicios,
                p.id_pago,
                p.estado AS estado_pago,
                p.total_pago
            FROM servicios s
            INNER JOIN pagos p ON p.id_pago = s.id_pago;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Es importante borrar ambas vistas en orden inverso o seguro
        DB::statement("DROP VIEW IF EXISTS vista_estadisticas_asistencias;");
        DB::statement("DROP VIEW IF EXISTS vista_estadisticas_servicios;");
    }
};