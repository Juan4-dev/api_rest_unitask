<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_labor');
            $table->string('nombre_servicio', 50);
            $table->string('labor_servicio', 50);
            $table->timestamp('horas_labor')->nullable();
            $table->integer('cantidad_servicios')->default(0);
            $table->unsignedBigInteger('numero_identificacion');
            $table->string('placa_vehiculo', 10);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('usuarios')->onDelete('cascade');
            $table->foreign('placa_vehiculo')->references('placa_vehiculo')->on('vehiculos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};