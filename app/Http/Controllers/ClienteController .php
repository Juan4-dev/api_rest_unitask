<?php

namespace App\Http\Controllers;

use App\Services\ClienteService;
use App\Http\Requests\RequestCliente;

class ClienteController extends Controller
{
    public function __construct(private ClienteService $clienteService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->clienteServices->getAll();

        return response()->json([
            'message' => 'Se listaron los clientes correctamente',
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(ClienteRequest $request)
    {
        $registroCliente = $this->clienteService->create($request->validated());

        return response()->json([
            'message' => 'El cliente se creó correctamente',
            'datosRegistrados' => $registroCliente
        ], 201);
    }

    // Traer un registro por cédula
    public function show(int $cedula)
    {
        $registro = $this->clienteService->getById($cedula);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el cliente con esa cédula'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el registro correctamente',
            'data' => $registro
        ], 200);
    }

    // Actualizar un registro
    public function update(ClienteRequest $request, int $cedula)
    {
        $registroActualizado = $this->clienteService->update($cedula, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el cliente con esa cédula'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    // Eliminar un registro
    public function destroy(int $cedula)
    {
        $validar = $this->clienteService->delete($cedula);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el cliente con esa cédula'
            ], 404);
        }

        return response()->json([
            'message' => 'El cliente se eliminó correctamente',
        ], 200);
    }

    // Buscar por cédula
    public function findByCedula(int $cedula)
    {
        $registro = $this->clienteService->findByCedula($cedula);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró un cliente con esa cédula'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó correctamente por cédula',
            'data' => $registro
        ], 200);
    }

    // Buscar por correo
    public function findByEmail(string $correo)
    {
        $registro = $this->clienteService->findByEmail($correo);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró un cliente con ese correo'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó correctamente por correo',
            'data' => $registro
        ], 200);
    }

    // Buscar por nombre
    public function findByName(string $nombre)
    {
        $registros = $this->clienteService->findByName($nombre);

        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }

    // Buscar por vehículo (placa)
    public function findByVehiculo(string $placa)
    {
        $registros = $this->clienteService->findByVehiculo($placa);

        return response()->json([
            'message' => 'Se listó correctamente por vehículo',
            'data' => $registros
        ], 200);
    }
}
