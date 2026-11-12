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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id('id_turno');
            $table->date('dia_turno')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->integer('horas_extras')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->unsignedBigInteger('numero_identificacion')->nullable();
            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('usuarios')->onDelete('cascade');

            $table->unsignedBigInteger('id_horario')->nullable();
            $table->foreign('id_horario')->references('id_horario')->on('horarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};