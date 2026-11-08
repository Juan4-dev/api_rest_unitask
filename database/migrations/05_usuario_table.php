<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario'); 
            $table->string('usuario', 10); 
            $table->string('contraseña', 255); 
            $table->unsignedBigInteger('id_rol');
            $table->unsignedBigInteger('numero_identificacion'); 
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('empleados')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};