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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('id_labor');
            
            $table->string('nombre_servicio', 50);
            $table->string('labor_servicio', 50);
            $table->timestamp('horas_labor')->nullable();
            $table->integer('cantidad_servicios')->default(0);
            
            $table->unsignedBigInteger('id_pago')->nullable();
            $table->unsignedBigInteger('id_estadistica')->nullable();

            $table->softDeletes();
            $table->timestamps();

           
            $table->foreign('id_estadistica')->references('id_estadistica')->on('estadisticas')->onDelete('cascade');
            $table->foreign('id_pago')->references('id_pagos')->on('pagos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};