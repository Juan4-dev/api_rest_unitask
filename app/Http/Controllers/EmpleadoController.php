<?php

namespace App\Http\Controllers;

use App\Services\EmpleadoService;
use App\Http\Requests\EmpleadoRequest;

class EmpleadoController extends Controller
{
    public function __construct(private EmpleadoService $empleadoService)
    {
    }
    public function index()
    {
        $registros = $this->empleadoService->getAll();

        return response()->json([
            'message' => 'Se listaron los empleados correctamente',
            'data' => $registros
        ], 200);
    }
    public function store(EmpleadoRequest $request)
    {
        $registroEmpleado = $this->empleadoService->create($request->validated());

        return response()->json([
            'message' => 'El empleado se creó correctamente',
            'datosRegistrados' => $registroEmpleado
        ], 201);
    }
    public function show(int $numeroIdentificacion)
    {
        $registro = $this->empleadoService->getById($numeroIdentificacion);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el empleado con ese numero de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }
    public function update(EmpleadoRequest $request, int $numeroIdentificacion)
    {
        $registroActualizado = $this->empleadoService->update($numeroIdentificacion, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el empleado con ese numero de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }
    public function destroy(int $numeroIdentificacion)
    {
        $validar = $this->empleadoService->delete($numeroIdentificacion);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el empleado con ese numero de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'El empleado se eliminó correctamente',
        ], 200);
    }
    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        $registro = $this->empleadoService->findByNumeroIdentificacion($numeroIdentificacion);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el empleado con ese número de identificación'
            ], 404);
        }
        return response()->json([
            'message' => 'Empleado encontrado exitosamente',
            'data' => $registro
        ], 200);
    }
    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        $registros = $this->empleadoService->findByNombreEmpleado($nombreEmpleado);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron empleados con ese nombre'
            ], 404);
        }

        return response()->json([
            'message' => 'Empleados encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByApellidoEmpleado(string $apellidoEmpleado)
    {
        $registros = $this->empleadoService->findByApellidoEmpleado($apellidoEmpleado);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron empleados con ese apellido'
            ], 404);
        }

        return response()->json([
            'message' => 'Empleados encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByTelefonoEmpleado(string $telefonoEmpleado)
    {
        $registros = $this->empleadoService->findByTelefonoEmpleado($telefonoEmpleado);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontró ningún empleado con ese número telefónico'
            ], 404);
        }
        return response()->json([
            'message' => 'Empleado encontrado exitosamente',
            'data' => $registros
        ], 200);
    }
}
