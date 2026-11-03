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
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id('id_estadistica');
            $table->string('tipo_grafico', 30);
            
            $table->unsignedBigInteger('id_reporte');
            $table->unsignedBigInteger('id_pago');
            $table->unsignedBigInteger('id_labor');
            $table->timestamp('periodo_evualado');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_reporte')->references('id_reporte')->on('reportes')->onDelete('cascade');
            $table->foreign('id_pago')->references('id_pagos')->on('pagos')->onDelete('cascade');
            $table->foreign('id_labor')->references('id_labor')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas');
    }
};
