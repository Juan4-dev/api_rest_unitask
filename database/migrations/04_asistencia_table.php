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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('id_asistencia'); 
            $table->timestamp('hora_entrada');
            $table->time('hora_salida')->nullable();
            $table->string('estado_validacion', 50);
            $table->date('fecha');
            $table->unsignedBigInteger('numero_identificacion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('usuarios')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
