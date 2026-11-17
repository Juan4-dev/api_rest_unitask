<?php

namespace App\Http\Controllers;

use App\Services\TurnoService;
use App\Http\Requests\TurnoRequest;

class TurnoController extends Controller
{
    public function __construct(private TurnoService $turnoService)
    {
    }

    public function index()
    {
        $registros = $this->turnoService->getAll();

        return response()->json([
            'message' => 'Se listaron los turnos correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(TurnoRequest $request)
    {
        $registroTurno = $this->turnoService->create($request->validated());

        return response()->json([
            'message' => 'El turno se registró correctamente',
            'datosRegistrados' => $registroTurno
        ], 201);
    }

    public function show(int $id)
    {
        $registro = $this->turnoService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el turno con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el turno correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(TurnoRequest $request, int $id)
    {
        $registroActualizado = $this->turnoService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el turno con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el turno correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(int $id)
    {
        $validar = $this->turnoService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el turno con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'El turno se eliminó correctamente'
        ], 200);
    }

    public function findByFecha(string $diaTurno)
    {
        $registros = $this->turnoService->findByFecha($diaTurno);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos para esa fecha'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByRangoFechas(string $fechaInicio, string $fechaFin)
    {
        $registros = $this->turnoService->findByRangoFechas($fechaInicio, $fechaFin);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos en ese rango de fechas'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findConHorasExtras()
    {
        $registros = $this->turnoService->findConHorasExtras();

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos con horas extras registradas'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos con horas extras encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByHorario(int $idHorario)
    {
        $registros = $this->turnoService->findByHorario($idHorario);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos para ese horario'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados por horario exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByNombre(string $nombreTurno)
    {
        $registros = $this->turnoService->findByNombre($nombreTurno);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos con ese nombre'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados por nombre exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByJornada(string $jornada)
    {
        $registros = $this->turnoService->findByJornada($jornada);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos para esa jornada'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados por jornada exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByEmpleado(int $numeroIdentificacion)
    {
        $registros = $this->turnoService->findByEmpleado($numeroIdentificacion);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron turnos para ese empleado'
            ], 404);
        }

        return response()->json([
            'message' => 'Turnos encontrados por empleado exitosamente',
            'data' => $registros
        ], 200);
    }
}