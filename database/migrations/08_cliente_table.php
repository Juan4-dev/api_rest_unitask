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
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer("cedula_cliente")->primary();
            $table->string("nombre_cliente", 30);
            $table->string("apellido_cliente", 30);
            $table->string("correo_cliente", 30);
            $table->string("placa_vehiculo", 10);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("placa_vehiculo")->references("placa_vehiculo")->on("vehiculos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
