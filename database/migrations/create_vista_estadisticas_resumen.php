<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW vista_estadisticas_resumen AS
            SELECT
                SUM(s.cantidad_servicios) AS total_servicios,
                SUM(p.total_pago) AS dinero_recaudado
            FROM servicios s
            INNER JOIN pagos p ON p.id_pago = s.id_pago
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS vista_estadisticas_resumen");
    }
};