<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AsistenciaService;
use App\Http\Requests\AsistenciaRequest;

class AsistenciaController extends Controller
{
    public function __construct(private AsistenciaService $asistenciaService)
    {
    }

    public function index()
    {
        $registros = $this->asistenciaService->getAll();

        return response()->json([
            'message' => 'Se listaron las asistencias correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(AsistenciaRequest $request)
    {
        $registroAsistencia = $this->asistenciaService->create($request->validated());
        return response()->json([
            'message' => 'La asistencia se creó correctamente',
            'datosRegistrados' => $registroAsistencia
        ], 201);
    }


    public function show(string $id)
    {
        $registro = $this->asistenciaService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(AsistenciaRequest $request, string $id)
    {
        $registroActualizado = $this->asistenciaService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->asistenciaService->delete($id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La asistencia se eliminó correctamente',
        ], 200);
    }

    public function findByDate(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date_format:Y-m-d'
        ]);

        $data = $this->asistenciaService->findByDate($request->input('fecha'));

        return response()->json([
            'message' => 'Se listó correctamente por fecha',
            'data' => $data
        ], 200);
    }

    public function findByDateRange(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date_format:Y-m-d',
            'fecha_fin' => 'required|date_format:Y-m-d|after_or_equal:fecha_inicio'
        ]);

        $data = $this->asistenciaService->findByDateRange(
            $request->input('fecha_inicio'), 
            $request->input('fecha_fin')
        );

        return response()->json([
            'message' => 'Se listó correctamente por rango de fechas',
            'data' => $data
        ], 200);
    }

    public function findByIdentity(string $numeroIdentificacion)
    {
        $data = $this->asistenciaService->findByIdentity($numeroIdentificacion);

        return response()->json([
            'message' => 'Se listó correctamente por número de identificación',
            'data' => $data
        ], 200);
    }

    public function findByStatus(string $estadoValidacion)
    {
        $data = $this->asistenciaService->findByStatus($estadoValidacion);

        return response()->json([
            'message' => 'Se listó correctamente por estado de validación',
            'data' => $data
        ], 200);
    }

    public function registerEntry(AsistenciaRequest $request)
    {
        $registerEntry = $this->asistenciaService->registerEntry($request->validated());

        return response()->json([
            'message' => 'Entrada registrada correctamente',
            'registerEntry' => $registerEntry
        ], 201);
    }

    public function registerExit(int $id)
    {
        $data = $this->asistenciaService->registerExit($id);

        if (!$data) {
            return response()->json([
                'message' => 'No se encontró el registro de asistencia para registrar la salida'
            ], 404);
        }

        return response()->json([
            'message' => 'Salida registrada correctamente',
            'data' => $data
        ], 200);
    }
}