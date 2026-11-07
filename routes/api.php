<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClienteController;

Route::prefix('v1')->group(function () {

    //Vehiculo

    Route::get('vehiculo/buscar/tipo/{tipo_vehiculo}', [VehiculoController::class, 'findByTipo']);
    Route::get('vehiculo/buscar/servicio/{id_labor}', [VehiculoController::class, 'findByServicio']);

    Route::apiResource('vehiculo', VehiculoController::class);

    //Cliente

    Route::get('cliente/buscar/cedula/{cedula_cliente}', [ClienteController::class, 'findByCedula']);
    Route::get('cliente/buscar/correo/{correo_cliente}', [ClienteController::class, 'findByEmail']);
    Route::get('cliente/buscar/nombre/{nombre_cliente}', [ClienteController::class, 'findByName']);
    Route::get('cliente/buscar/vehiculo/{placa_vehiculo}', [ClienteController::class, 'findByVehiculo']);

    Route::apiResource('cliente', ClienteController::class);

});