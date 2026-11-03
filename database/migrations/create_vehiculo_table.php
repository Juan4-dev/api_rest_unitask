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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->string("placa_vehiculo", 10)->primary();
            $table->string("tipo_vehiculo", 30);
            $table->unsignedBigInteger("id_labor");
            $table->string("cedula_cliente", 20);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("id_labor")->references("id_labor")->on("labor")->onDelete("cascade");
            $table->foreign("cedula_cliente")->references("cedula_cliente")->on("cliente")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculo');
    }
};