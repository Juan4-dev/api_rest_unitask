<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServicioService;
use App\Http\Requests\ServicioRequest;

class ServicioController extends Controller
{
    public function __construct(private ServicioService $servicioService)
    {
    }

    public function index()
    {
        $registros = $this->servicioService->getAllServicios();

        return response()->json([
            'message' => 'Se listaron los servicios correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(ServicioRequest $request)
    {
        $registroServicio = $this->servicioService->createServicio($request->validated());
        return response()->json([
            'message' => 'El servicio se creó correctamente',
            'datosRegistrados' => $registroServicio
        ], 201);
    }

    public function show(string $id)
    {
        $registro = $this->servicioService->getServicioById((int) $id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el servicio con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el servicio correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(ServicioRequest $request, string $id)
    {
        $registroActualizado = $this->servicioService->updateServicio((int) $id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el servicio con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el servicio correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(string $id)
    {
        $validar = $this->servicioService->deleteServicio((int) $id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el servicio con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'Se eliminó el servicio correctamente',
        ], 200);
    }

    public function findByName(Request $request)
    {
        $request->validate([
            'nombre_servicio' => 'required|string|max:50'
        ]);

        $data = $this->servicioService->getServiciosByName($request->input('nombre_servicio'));

        return response()->json([
            'message' => 'Se listó correctamente por nombre de servicio',
            'data' => $data
        ], 200);
    }

    public function findByTask(Request $request)
    {
        $request->validate([
            'labor_servicio' => 'required|string|max:50'
        ]);

        $data = $this->servicioService->getServiciosByTask($request->input('labor_servicio'));

        return response()->json([
            'message' => 'Se listó correctamente por labor de servicio',
            'data' => $data
        ], 200);
    }

    public function findByPay(string $idPago)
    {
        $data = $this->servicioService->getServiciosByPay((int) $idPago);

        return response()->json([
            'message' => 'Se listó correctamente por ID de pago',
            'data' => $data
        ], 200);
    }

    public function findByHours(Request $request)
    {
        $request->validate([
            'horas_labor' => 'required|date_format:Y-m-d H:i:s'
        ]);

        $data = $this->servicioService->getServiciosByHours($request->input('horas_labor'));

        return response()->json([
            'message' => 'Se listó correctamente por horas de labor',
            'data' => $data
        ], 200);
    }

    public function findByQuantity(Request $request)
    {
        $request->validate([
            'cantidad_servicios' => 'required|integer|min:0'
        ]);

        $data = $this->servicioService->getServiciosByQuantity((int) $request->input('cantidad_servicios'));

        return response()->json([
            'message' => 'Se listó correctamente por cantidad de servicios',
            'data' => $data
        ], 200);
    }

    public function findByIdentity(int $numeroIdentificacion)
    {
        $data = $this->servicioService->getServiciosByIdentity($numeroIdentificacion);

        return response()->json([
            'message' => 'Se listó correctamente por número de identificación',
            'data' => $data
        ], 200);
    }

    public function findByVehiculo(string $placaVehiculo)
    {
        $data = $this->servicioService->getServiciosByVehiculo($placaVehiculo);

        return response()->json([
            'message' => 'Se listó correctamente por placa de vehículo',
            'data' => $data
        ], 200);
    }
}