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

    public function show($id)
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

    public function update(TurnoRequest $request, $id)
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

    public function destroy($id)
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
}