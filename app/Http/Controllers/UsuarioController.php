<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;

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

    public function show(int $numeroIdentificacion)
    {
        $registro = $this->usuarioService->getById($numeroIdentificacion);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese número de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el usuario correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(UsuarioRequest $request, int $numeroIdentificacion)
    {
        $registroActualizado = $this->usuarioService->update($numeroIdentificacion, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese número de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el usuario correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy(int $numeroIdentificacion)
    {
        $validar = $this->usuarioService->delete($numeroIdentificacion);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el usuario con ese número de identificación'
            ], 404);
        }

        return response()->json([
            'message' => 'El usuario se eliminó correctamente'
        ], 200);
    }

    public function findByNombreEmpleado(Request $request)
    {
        $request->validate([
            'nombre_empleado' => 'required|string|max:50'
        ]);

        $registros = $this->usuarioService->findByNombreEmpleado($request->input('nombre_empleado'));

        return response()->json([
            'message' => 'Usuarios encontrados por nombre exitosamente',
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
            'message' => 'Usuario encontrado por número de identificación exitosamente',
            'data' => $registro
        ], 200);
    }

    public function findByApellidoEmpleado(Request $request)
    {
        $request->validate([
            'apellido_empleado' => 'required|string|max:50'
        ]);

        $registros = $this->usuarioService->findByApellidoEmpleado($request->input('apellido_empleado'));

        return response()->json([
            'message' => 'Usuarios encontrados por apellido exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByTelefonoEmpleado(Request $request)
    {
        $request->validate([
            'telefono_empleado' => 'required|string|max:20'
        ]);

        $registros = $this->usuarioService->findByTelefonoEmpleado($request->input('telefono_empleado'));

        return response()->json([
            'message' => 'Usuarios encontrados por teléfono exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByCorreoEmpleado(Request $request)
    {
        $request->validate([
            'correo_empleado' => 'required|email|max:100'
        ]);

        $registros = $this->usuarioService->findByCorreoEmpleado($request->input('correo_empleado'));

        return response()->json([
            'message' => 'Usuarios encontrados por correo exitosamente',
            'data' => $registros
        ], 200);
    }

    public function findByUsuario(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|max:50'
        ]);

        $registros = $this->usuarioService->findByUsuario($request->input('usuario'));

        return response()->json([
            'message' => 'Usuarios encontrados por nombre de usuario exitosamente',
            'data' => $registros
        ], 200);
    }

    public function assignRole(Request $request, int $numeroIdentificacion)
    {
        $request->validate([
            'id_rol' => 'required|integer|exists:roles,id_rol'
        ]);

        $resultado = $this->usuarioService->assignRole($numeroIdentificacion, $request->input('id_rol'));

        return response()->json([
            'message' => 'Rol asignado correctamente al usuario',
            'data' => $resultado
        ], 200);
    }

    public function verifyCredentials(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
            'contraseña' => 'required|string'
        ]);

        $resultado = $this->usuarioService->verifyCredentials(
            $request->input('usuario'),
            $request->input('contraseña')
        );

        if (!$resultado) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        return response()->json([
            'message' => 'Credenciales verificadas exitosamente',
            'data' => $resultado
        ], 200);
    }
}