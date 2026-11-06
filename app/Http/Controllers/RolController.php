<?php

namespace App\Http\Controllers;

use App\Services\RolService;
use App\Http\Requests\RolRequest;

class RolController extends Controller
{
    public function __construct(private RolService $rolService)
    {
    }
    public function index()
    {
        $registros = $this->rolService->getAll();

        return response()->json([
            'message' => 'Se listaron los roles correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(RolRequest $request)
    {
        $registroRol = $this->rolService->create($request->validated());

        return response()->json([
            'message' => 'El rol se registró correctamente',
            'datosRegistrados' => $registroRol
        ], 201);
    }

    public function show($id)
    {
        $registro = $this->rolService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el rol con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el rol correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(RolRequest $request, $id)
    {
        $registroActualizado = $this->rolService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el rol con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el rol correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy($id)
    {
        $validar = $this->rolService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el rol con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'El rol se eliminó correctamente'
        ], 200);
    }

    public function findByNameRol(string $nombreRol)
    {
        $registros = $this->rolService->findByNameRol($nombreRol);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron roles con ese nombre'
            ], 404);
        }

        return response()->json([
            'message' => 'Roles encontrados exitosamente',
            'data' => $registros
        ], 200);
    }
}