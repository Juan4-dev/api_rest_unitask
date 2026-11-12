<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\UsuarioController;
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

    Route::apiResource('rol', RolController::class);

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

    // Asistencia

    Route::get('asistencia/fecha/{fecha}', [AsistenciaController::class, 'findByDate']);
    Route::get('asistencia/rango/{rango}', [AsistenciaController::class, 'findByDateRange']);
    Route::get('asistencia/identidad/{numero_identificacion}', [AsistenciaController::class, 'findByIdentity']);
    Route::get('asistencia/estado/{estado_validacion}', [AsistenciaController::class, 'findByStatus']);
    Route::post('asistencia/entrada/{id}', [AsistenciaController::class, 'registerEntry']);
    Route::post('asistencia/salida/{id}', [AsistenciaController::class, 'registerExit']);
    Route::apiResource('asistencia', AsistenciaController::class);

    // Usuario

    Route::get('usuario/buscar/{usuario}', [UsuarioController::class, 'findByUsuario']);
    Route::get('usuario/identificacion/{numero_identificacion}', [UsuarioController::class, 'findByIdentification']);
    Route::get('usuario/rol/{rol}', [UsuarioController::class, 'findByRol']);
    Route::post('usuario/asignar_rol/{asignar_rol}', [UsuarioController::class, 'assignRole']);
    Route::post('usuario/verificar/{verificar}', [UsuarioController::class, 'verifyCredentials']);
    Route::apiResource('usuario', UsuarioController::class);

    //Horario

    Route::post('horario/buscar/tipo', [HorarioController::class, 'findByType']);
    Route::get('horario/buscar/empleado/{numero_identificacion}',[HorarioController::class, 'findByEmployee']);

    Route::apiResource('horario', HorarioController::class);

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