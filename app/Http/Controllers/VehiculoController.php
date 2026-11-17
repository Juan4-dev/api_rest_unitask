<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VehiculoService;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
    public function __construct(private VehiculoService $vehiculoService)
    {
    }

    public function index()
    {
        $registros = $this->vehiculoService->getAll();

        return response()->json([
            'message' => 'Se listaron los vehículos correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(VehiculoRequest $request)
    {
        $registroVehiculo = $this->vehiculoService->create($request->validated());

        return response()->json([
            'message' => 'El vehículo se registró correctamente',
            'datosRegistrados' => $registroVehiculo
        ], 201);
    }

    public function show(string $placa)
    {
        $registro = $this->vehiculoService->getById($placa);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el vehículo correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(VehiculoRequest $request, string $placa)
    {
        $registroActualizado = $this->vehiculoService->update($placa, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el vehículo correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(string $placa)
    {
        $validar = $this->vehiculoService->delete($placa);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'El vehículo se eliminó correctamente'
        ], 200);
    }

    public function findByPlaca(string $placaVehiculo)
    {
        $registro = $this->vehiculoService->findByPlaca($placaVehiculo);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró un vehículo con esa placa'
            ], 404);
        }

        return response()->json([
            'message' => 'Vehículo encontrado por placa exitosamente',
            'data' => $registro
        ], 200);
    }

    public function findByTipo(Request $request)
    {
        $request->validate([
            'tipo_vehiculo' => 'required|string|max:50'
        ]);

        $registros = $this->vehiculoService->findByTipo($request->input('tipo_vehiculo'));

        return response()->json([
            'message' => 'Vehículos encontrados por tipo exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByCliente(int $cedulaCliente)
    {
        $registros = $this->vehiculoService->findByCliente($cedulaCliente);

        return response()->json([
            'message' => 'Vehículos encontrados por cliente exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByServicio(int $idLabor)
    {
        $registros = $this->vehiculoService->findByServicio($idLabor);

        return response()->json([
            'message' => 'Vehículos encontrados por servicio exitosamente',
            'data' => $registros
        ], 200);
    }
}