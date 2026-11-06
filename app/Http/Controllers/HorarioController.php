<?php

namespace App\Http\Controllers;

use App\Services\HorarioService;
use App\Http\Requests\HorarioRequest;

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

    public function store(HorarioRequest $request)
    {
        $registroHorario = $this->horarioService->createHorario($request->validated());
             
        return response()->json([
            'message' => 'El horario se creó correctamente',
            'datosRegistrados' => $registroHorario
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->horarioService->getHorarioById((int) $id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el horario con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el horario correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(HorarioRequest $request, string $id)
    {
        $registroActualizado = $this->horarioService->updateHorario((int) $id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el horario con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el horario correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->horarioService->deleteHorario((int) $id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el horario con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se eliminó el horario correctamente',
        ], 200);
    }
}