<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }

    public function index()
    {
        $registros = $this->usuarioService->getAll();

        return response()->json([
            'message' => 'Se listaron los usuarios correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(UsuarioRequest $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());

        return response()->json([
            'message' => 'El usuario se registró correctamente',
            'datosRegistrados' => $registroUsuario
        ], 201);
    }

    public function show($id)
    {
        $registro = $this->usuarioService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el usuario correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $registroActualizado = $this->usuarioService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el usuario correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy($id)
    {
        $validar = $this->usuarioService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'El usuario se eliminó correctamente'
        ], 200);
    }

    public function findByNombreEmpleado(string $nombreEmpleado)
    {
        $registros = $this->usuarioService->findByNombreEmpleado($nombreEmpleado);

        if ($registros->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron empleados con ese nombre'
            ], 404);
        }

        return response()->json([
            'message' => 'Empleados encontrados exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByNumeroIdentificacion(int $numeroIdentificacion)
    {
        $registro = $this->usuarioService->findByNumeroIdentificacion($numeroIdentificacion);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró un usuario con ese número de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'Usuario encontrado exitosamente',
            'data' => $registro
        ], 200);
    }

    public function findByUsuario(string $usuario)
    {
        $registro = $this->usuarioService->findByUsuario($usuario);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el nombre de usuario especificado'
            ], 404);
        }

        return response()->json([
            'message' => 'Usuario encontrado exitosamente',
            'data' => $registro
        ], 200);
    }

    public function assignRole(Request $request, int $id)
    {
        $request->validate([
            'id_rol' => 'required|integer|exists:roles,id_rol'
        ]);

        $actualizado = $this->usuarioService->assignRole($id, $request->id_rol);

        if (!$actualizado) {
            return response()->json([
                'message' => 'No se pudo actualizar el rol o el usuario no existe'
            ], 404);
        }

        return response()->json([
            'message' => 'Rol asignado correctamente al usuario'
        ], 200);
    }

    public function verifyCredentials(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contraseña' => 'required|string'
        ]);

        $user = $this->usuarioService->verifyCredentials($request->usuario, $request->contraseña);

        if (!$user) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        return response()->json([
            'message' => 'Credenciales verificadas exitosamente',
            'data' => $user
        ], 200);
    }
}