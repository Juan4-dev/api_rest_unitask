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
        // Primera vista
        DB::statement("
            CREATE OR REPLACE VIEW vista_turnos_activos AS
            SELECT * FROM turnos WHERE deleted_at IS NULL
        ");

        // Segunda vista
        DB::statement("
            CREATE OR REPLACE VIEW vista_clientes_frecuentes AS
            SELECT * FROM clientes
        ");
        //Tercera vista
        DB::statement("
        CREATE OR REPLACE VIEW vista_reporte_asistencias_empleados AS
        SELECT 
        a.id_asistencia,
        a.fecha,
        a.hora_entrada,
        a.hora_salida,
        a.estado_validacion,
        u.numero_identificacion,
        u.nombre_empleado,
        u.apellido_empleado,
        u.correo_empleado
        FROM asistencias a
        JOIN usuarios u ON a.numero_identificacion = u.numero_identificacion
        ORDER BY a.fecha DESC;
        ");
        //Cuarta Vista
        DB::statement("
        CREATE OR REPLACE VIEW vista_reportes AS
        SELECT
        u.numero_identificacion,
        u.nombre_empleado,
        u.apellido_empleado,
        r.nombre_rol,
        a.estado_validacion AS tipo_fallas,
        COUNT(a.id_asistencia) AS cantidad_fallas
        FROM asistencias a
        INNER JOIN usuarios u ON u.numero_identificacion = a.numero_identificacion
        INNER JOIN roles r ON r.id_rol = u.id_rol
        WHERE a.estado_validacion IN ('Tarde', 'Ausente')
        GROUP BY
        u.numero_identificacion, u.nombre_empleado, u.apellido_empleado,
        r.nombre_rol, a.estado_validacion;");
        DB::statement(
            "
        CREATE OR REPLACE VIEW vista_resumen_financiero_diario AS
        SELECT 
        CAST(p.created_at AS DATE) AS fecha_pago,
        p.estado AS estado_pago,
        COUNT(p.id_pago) AS total_transacciones,
        SUM(p.total_pago) AS ingreso_total
        FROM pagos p
        GROUP BY CAST(p.created_at AS DATE), p.estado
        ORDER BY fecha_pago DESC;"
         );
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_views');
    }
};
