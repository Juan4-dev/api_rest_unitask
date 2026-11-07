<?php

namespace App\Http\Controllers;

use App\Services\ReporteService;
use App\Http\Requests\ReporteRequest;

class ReporteController extends Controller
{
    public function __construct(private ReporteService $reporteService)
    {
    }

    public function index()
    {
        $registros = $this->reporteService->getAllReportes();

        return response()->json([
            'message' => 'Se listaron los reportes correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(ReporteRequest $request)
    {
        $registroReporte = $this->reporteService->createReporte($request->validated());
             
        return response()->json([
            'message' => 'El reporte se creó correctamente',
            'datosRegistrados' => $registroReporte
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->reporteService->getReporteById((int) $id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el reporte con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el reporte correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(ReporteRequest $request, string $id)
    {
        $registroActualizado = $this->reporteService->updateReporte((int) $id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el reporte con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el reporte correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->reporteService->deleteReporte((int) $id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el reporte con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'El reporte se eliminó correctamente',
        ], 200);
    }

    public function findByType(ReporteRequest $request)
    {
        $data = $this->reporteService->getReportesByType($request->input('tipo_fallas'));

        return response()->json([
            'message' => 'Se listó correctamente por tipo de fallas',
            'data' => $data
        ], 200);
    }

    public function findByCount(ReporteRequest $request)
    {
        $data = $this->reporteService->getReportesByCount((int) $request->input('cantidad_fallas'));

        return response()->json([
            'message' => 'Se listó correctamente por cantidad de fallas',
            'data' => $data
        ], 200);
    }

    public function findByEmployee(string $numeroIdentificacion)
    {
        $data = $this->reporteService->getReportesByEmployee((int) $numeroIdentificacion);

        return response()->json([
            'message' => 'Se listó correctamente por número de identificación del empleado',
            'data' => $data
        ], 200);
    }
}