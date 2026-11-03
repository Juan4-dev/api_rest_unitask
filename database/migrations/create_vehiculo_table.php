<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            // PK
            $table->string('placa_vehiculo', 10)->primary();

            $table->string('tipo_vehiculo', 30);

            // FK -> labor
            $table->unsignedBigInteger('id_labor');
            // FK -> cliente
            $table->string('cedula_cliente', 20);

            $table->foreign('id_labor')
                ->references('id_labor')
                ->on('labor')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('cedula_cliente')
                ->references('cedula_cliente')
                ->on('cliente')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};
