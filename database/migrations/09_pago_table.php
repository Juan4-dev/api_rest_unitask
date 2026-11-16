<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->decimal('total_pago', 10, 2);
            $table->integer('cantidad')->default(1);
            $table->string('estado', 40); 
            $table->string('metodo_pago', 50); 
            $table->dateTime('fecha_pago')->nullable();
            
            $table->unsignedBigInteger('numero_identificacion');
            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('usuarios')->onDelete('cascade');

            $table->string('placa_vehiculo', 20);
            $table->foreign('placa_vehiculo')->references('placa_vehiculo')->on('vehiculos')->onDelete('cascade');

            $table->unsignedBigInteger('id_labor')->nullable();
            $table->foreign('id_labor')->references('id_labor') ->on('servicios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};