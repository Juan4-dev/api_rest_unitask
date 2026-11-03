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
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer("cedula_cliente")->primary();
            $table->string("nombre_cliente", 50);
            $table->string("apellido_cliente", 50);
            $table->string("correo_cliente", 50);
            $table->unsignedBigInteger("id_encuesta");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign("id_encuesta")->references("id_encuesta")->on("encuesta")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
