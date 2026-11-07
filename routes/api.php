<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReporteController;

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

    //Servicio

    Route::post('servicio/buscar/nombre', [ServicioController::class, 'findByName']);
    Route::post('servicio/buscar/labor', [ServicioController::class, 'findByTask']);
    Route::get('servicio/buscar/pago/{idPago}', [ServicioController::class, 'findByPay']);
    Route::post('servicio/buscar/horas', [ServicioController::class, 'findByHours']);
    Route::post('servicio/buscar/cantidad', [ServicioController::class, 'findByQuantity']);

    Route::apiResource('servicio', ServicioController::class);

    //Horario
    Route::post('horario/buscar/tipo', [HorarioController::class, 'findByType']);
    Route::get('horario/buscar/empleado/{numero_identificacion}',[HorarioController::class, 'findByEmployee']);

    Route::apiResource('horario', HorarioController::class);

    //Reporte   

    Route::post('reporte/buscar/tipo', [ReporteController::class, 'findByType']);
    Route::post('reporte/buscar/cantidad', [ReporteController::class, 'findByCount']);
    Route::get('reporte/buscar/empleado/{numeroIdentificacion}', [ReporteController::class, 'findByEmployee']);

    Route::apiResource('reporte', ReporteController::class);

   

    
});