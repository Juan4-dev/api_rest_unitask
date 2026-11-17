<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_identificacion')->primary();
            $table->string('nombre_empleado', 40);
            $table->string('apellido_empleado', 40);
            $table->string('telefono_empleado', 20);
            $table->string('correo_empleado', 80)->unique();
            $table->string('usuario', 20)->unique();
            $table->string('contraseña', 255);

            $table->unsignedBigInteger('id_rol');
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('restrict');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

