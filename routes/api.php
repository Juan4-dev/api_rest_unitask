<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\TurnoController;

Route::prefix('v1')->group(function () {

    // Usuario
    Route::get('usuario/buscar/nombre/{nombre_empleado}', [UsuarioController::class, 'findByNombreEmpleado']);
    Route::get('usuario/buscar/numero_identificacion/{numero_identificacion}', [UsuarioController::class, 'findByNumeroIdentificacion']);
    Route::get('usuario/buscar/apellido/{apellido_empleado}', [UsuarioController::class, 'findByApellidoEmpleado']);
    Route::get('usuario/buscar/telefono/{telefono_empleado}', [UsuarioController::class, 'findByTelefonoEmpleado']);
    Route::get('usuario/buscar/username/{usuario}', [UsuarioController::class, 'findByUsuario']); // Ajustado para evitar cruces con la ruta show del resource
    Route::post('usuario/asignar_rol/{id}', [UsuarioController::class, 'assignRole']);
    Route::post('usuario/verificar', [UsuarioController::class, 'verifyCredentials']);

    Route::apiResource('usuario', UsuarioController::class);

    // Rol
    Route::get('rol/buscar/nombre/{nombre_rol}', [RolController::class, 'findByNameRol']);
    Route::get('rol/buscar/rol/{rol}', [RolController::class, 'findByRol']); // Corregido a RolController y ruta más especifica

    Route::apiResource('rol', RolController::class);

    // Pago
    Route::get('pago/calculo/{total_pago}', [PagoController::class, 'calcularNomina']);

    Route::apiResource('pago', PagoController::class);

    // Servicio
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

    // Horario
    Route::post('horario/buscar/tipo', [HorarioController::class, 'findByType']);
    Route::get('horario/buscar/empleado/{numero_identificacion}', [HorarioController::class, 'findByEmployee']);

    Route::apiResource('horario', HorarioController::class);

    // Vehiculo
    Route::get('vehiculo/buscar/tipo/{tipo_vehiculo}', [VehiculoController::class, 'findByTipo']);
    Route::get('vehiculo/buscar/servicio/{id_labor}', [VehiculoController::class, 'findByServicio']);

    Route::apiResource('vehiculo', VehiculoController::class);

    // Cliente
    Route::get('cliente/buscar/cedula/{cedula_cliente}', [ClienteController::class, 'findByCedula']);
    Route::get('cliente/buscar/correo/{correo_cliente}', [ClienteController::class, 'findByEmail']);
    Route::get('cliente/buscar/nombre/{nombre_cliente}', [ClienteController::class, 'findByName']);
    Route::get('cliente/buscar/vehiculo/{placa_vehiculo}', [ClienteController::class, 'findByVehiculo']);

    Route::apiResource('cliente', ClienteController::class);

    // Turno
    Route::get('turno/buscar/fecha/{diaTurno}', [TurnoController::class, 'findByFecha']);
    Route::get('turno/buscar/rango', [TurnoController::class, 'findByRangoFechas']);
    Route::get('turno/buscar/horas_extras', [TurnoController::class, 'findConHorasExtras']);

    Route::apiResource('turno', TurnoController::class);

});