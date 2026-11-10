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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->decimal('total_pago', 10, 2);
            $table->string('estado', 40);
            $table->integer('cantidad');
            $table->unsignedBigInteger('numero_identificacion');

            $table->foreign('numero_identificacion')->references('numero_identificacion')->on('empleados')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
return new class extends Migration{

};