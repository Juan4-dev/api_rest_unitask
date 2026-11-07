<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;

Route::prefix('v1')->group(function () {

    //Empleado

    Route::get('empleado/buscar/nombre/{nombre_empleado}', [EmpleadoController::class, 'findByNombreEmpleado']);
    Route::get('empleado/buscar/numero_identificacion/{numero_identificacion}', [EmpleadoController::class, 'findByNumeroIdentificacion']);
    Route::get('empleado/buscar/apellido/{apellido_empleado}', [EmpleadoController::class, 'findByApellidoEmpleado']);
    Route::get('empleado/buscar/telefono/{telefono_empleado}', [EmpleadoController::class, 'findByTelefonoEmpleado']);

    Route::apiResource('empleado', EmpleadoController::class);

    //Rol

    Route::get('rol/buscar/nombre/{nombre_rol}', [RolController::class, 'findByNameRol']);

    Route::apiResource('rol', EmpleadoController::class);

    //Pago

    Route::get('pago/calculo/{total_pago}', [PagoController::class, 'calcularNomina']);

    Route::apiResource('pago', PagoController::class);

    
});