<?php

namespace App\Http\Controllers;

use App\Services\VehiculoService;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
    public function __construct(private VehiculoService $vehiculoService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->vehiculoService->getAll();

        return response()->json([
            'message' => 'Se listaron los vehículos correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(VehiculoRequest $request)
    {
        $registroVehiculo = $this->vehiculoService->create($request->validated());

        return response()->json([
            'message' => 'El vehículo se creó correctamente',
            'datosRegistrados' => $registroVehiculo
        ], 201);
    }

    // Traer un registro por placa
    public function show(string $placa)
    {
        $registro = $this->vehiculoService->findByPlaca($placa);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(VehiculoRequest $request, string $placa)
    {
        $registroActualizado = $this->vehiculoService->update($placa, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(string $placa)
    {
        $validar = $this->vehiculoService->delete($placa);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'El vehículo se eliminó correctamente',
        ], 200);
    }

    // Buscar por tipo de vehículo
    public function findByTipo(string $tipo)
    {
        $registros = $this->vehiculoService->findByTipo($tipo);

        return response()->json([
            'message' => 'Se listó correctamente por tipo',
            'data' => $registros
        ], 200);
    }

    // Buscar por servicio (id_labor)
    public function findByServicio(int $idLabor)
    {
        $registros = $this->vehiculoService->findByServicio($idLabor);

        return response()->json([
            'message' => 'Se listó correctamente por servicio',
            'data' => $registros
        ], 200);
    }
}