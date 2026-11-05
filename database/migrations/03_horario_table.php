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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
            $table->string('tipo_horario', 30);
            $table->timestamp('periodo_labor')->nullable();
            $table->string('nombre_turno', 20);
            $table->timestamp('fecha_turno')->nullable();
            $table->string('jornada', 30);

            $table->softDeletes();
            $table->timestamps();

             $table->unsignedBigInteger('numero_identificacion')->nullable();
            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('empleados')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};