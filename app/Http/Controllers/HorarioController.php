<?php

namespace App\Http\Controllers;

use App\Services\HorarioService;
use Illuminate\Http\Request; // O usa el FormRequest correspondiente si lo tienes creado para Horarios

class HorarioController extends Controller
{
    public function __construct(private HorarioService $horarioService)
    {
    }

    public function index()
    {
        $registros = $this->horarioService->getAllHorarios();

        return response()->json([
            'message' => 'Se listaron los horarios correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_horario' => 'required|string|max:30',
            'periodo' => 'nullable|date',
            'numero_identificacion' => 'required|exists:usuarios,numero_identificacion'
        ]);

        $registroHorario = $this->horarioService->createHorario($validatedData);

        return response()->json([
            'message' => 'El horario se registró correctamente',
            'datosRegistrados' => $registroHorario
        ], 201);
    }

    public function show(int $id)
    {
        $registro = $this->horarioService->getHorarioById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el horario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el horario correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'tipo_horario' => 'sometimes|string|max:30',
            'periodo' => 'nullable|date',
            'numero_identificacion' => 'sometimes|exists:usuarios,numero_identificacion'
        ]);

        $registroActualizado = $this->horarioService->updateHorario($id, $validatedData);

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el horario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el horario correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(int $id)
    {
        $validar = $this->horarioService->deleteHorario($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el horario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'El horario se eliminó correctamente'
        ], 200);
    }

    // Métodos personalizados de búsqueda basados exactamente en tu HorarioService

    public function getByType(string $tipoHorario)
    {
        $registros = $this->horarioService->getHorariosByType($tipoHorario);

        return response()->json([
            'message' => 'Se listaron los horarios por tipo correctamente',
            'data' => $registros
        ], 200);
    }

    public function getByPeriod(string $periodo)
    {
        $registros = $this->horarioService->getHorariosByPeriod($periodo);

        return response()->json([
            'message' => 'Se listaron los horarios por periodo correctamente',
            'data' => $registros
        ], 200);
    }

    public function getByIdentity(int $numeroIdentificacion)
    {
        $registros = $this->horarioService->getHorariosByIdentity($numeroIdentificacion);

        return response()->json([
            'message' => 'Se listaron los horarios por número de identificación correctamente',
            'data' => $registros
        ], 200);
    }
}