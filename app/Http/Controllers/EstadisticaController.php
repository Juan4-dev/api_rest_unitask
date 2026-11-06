<?php

namespace App\Http\Controllers;
use App\Services\EstadisticaService;
use App\Http\Requests\EstadisticaRequest;

class EstadisticaController extends Controller
{
    public function __construct(private EstadisticaService $estadisticaService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->estadisticaService->getAll();

        return response()->json([
            'message' => "Se listaron las estadisticas correctamente",
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(EstadisticaRequest $request)
    {
        $registroEstadistica = $this->estadisticaService->create($request->validated());
               
        return response()->json([
            'message' => 'La estadística se creó correctamente',
            'datosRegistrados' => $registroEstadistica
        ], 201);
    }

    // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->estadisticaService->getById($id);

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

    // Actualizar un registro
    public function update(EstadisticaRequest $request, string $id)
    {
        $registroActualizado = $this->estadisticaService->update($id, $request->validated());

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

    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->estadisticaService->delete($id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La estadisitica se eliminó correctamente',
        ], 200);
    }

public function findByChartType(string $tipoGrafico)
    {
        $listado = $this->estadisticaService->findByChartType($tipoGrafico);
        return response()->json([
            'message' => 'Se listo correctamente por tipo de grafico',
            'data' => $listado
        ], 200);
    }

    public function getByDateRange(EstadisticaRequest $fecha)
    {
        $fecha = $this->estadisticaService->getByDateRange(
            $fecha->input('fecha_inicio'), 
            $request->input('fecha_fin')
        );
        return response()->json([
            'message' => 'Se listo correctamente por rango de fechas',
            'fecha' => $fecha
        ], 200);
    }

    public function findByChartAndPeriod(EstadisticaRequest $request)
    {
        $registros = $this->estadisticaService->findByChartAndPeriod(
            $request->input('tipo_grafico'), 
            $request->input('fecha_inicio'), 
            $request->input('fecha_fin')
        );
        return response()->json([
            'message' => 'Se listo correctamente por tipo de grafico y periodo',
            'data' => $registros
        ], 200);
    }

    public function findByReport($reporte)
    {
        $resultado = $this->estadisticaService->findByReport($reporte);
        return response()->json([
            'message' => 'Se listo correctamente por reporte',
            'data' => $resultado
        ], 200);
    }
}