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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_identificacion')->primary();
            $table->string('nombre_empleado', 40);
            $table->string('apellido_empleado', 40);
            $table->string('telefono_empleado', 20);
            $table->string('correo_empleado', 80);
            $table->string('usuario', 10); 
            $table->string('contraseña', 255); 

            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
