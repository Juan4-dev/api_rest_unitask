<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_views');
    }
};
