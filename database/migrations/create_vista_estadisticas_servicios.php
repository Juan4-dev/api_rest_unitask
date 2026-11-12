<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("DROP VIEW IF EXISTS vista_estadisticas_servicios");
        DB::statement("
            CREATE VIEW vista_estadisticas_servicios AS
            SELECT
                s.id_labor,
                s.nombre_servicio,
                s.cantidad_servicios,
                p.id_pago,
                p.estado AS estado_pago,
                p.total_pago
            FROM servicios s
            INNER JOIN pagos p ON p.id_pago = s.id_pago
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vista_estadisticas_servicios");
    }
};