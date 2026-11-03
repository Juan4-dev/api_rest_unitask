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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->string("placa_vehiculo", 10)->primary();
            $table->string("tipo_vehiculo", 30);
            $table->integer("id_labor");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("id_labor")->references("id_labor")->on("servicios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};