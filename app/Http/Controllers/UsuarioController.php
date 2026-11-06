<?php
 
namespace App\Http\Controllers;
use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;
 
class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioService)
    {
    }
 
    // Traer todos los registros
    public function index()
    {
        $registros = $this->usuarioService->getAll();
 
        return response()->json([
            'message'  => "Se listaron los usuarios correctamente",
            'data' => $registros
        ], 200);
    }
 
    // Crear un registro
    public function store(UsuarioRequest $request)
    {
        $registroUsuario = $this->usuarioService->create($request->validated());
               
        return response()->json([
            'message' => 'El usuario se creó correctamente',
            'datosRegistrados' => $registroAmbiente
        ], 201);
    }
 
   // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->usuarioService->getById($id);
 
        if (!$registro) {
            return response()->json([
                'message' => 'no se encontró el usuario con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'se listó el usuario correctamente',
            'data' => $registro
        ], 200);
    }
 
    // Actualizar un registro
    public function update(UsuarioRequest $request, string $id)
    {
        
        $registroActualizado = $this->usuarioService->update($id, $request->validated());
 
        if (!$registroActualizado) {
            return response()->json([
                'message' => 'no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'se actualizó el registro correctamente',
            'data' => $registroActualizado
        ], 200);
    }
 
    // Eliminar un registro
    public function destroy(string $id)
    {
        $validar = $this->usuarioService->delete($id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'no se encontró el registro con ese id'
            ], 404);
        }
 
        return response()->json([
            'message' => 'El ambiente se eliminó correctamente',
        ], 200);
    }
 
    public function findByUsuario(string $usuario)
    {
        $registros = $this->usuarioService->findByName($usuario);
 
        return response()->json([
            'message' => 'Se listó correctamente por nombre',
            'data' => $registros
        ], 200);
    }

    public function findByIdentification(string $numeroIdentificacion)
    {
        
        $registros = $this->usuarioService->findByIdentification($numeroIdentificacion);
 
        return response()->json([
            'message' => 'Se listó correctamente por el numero de identificacion',
            'data' => $registros
        ], 200);
    }

    public function findByRol(string $rol)
    {
        $registros = $this->ambienteService->findByRol($rol);
 
        return response()->json([
            'message' => 'Se listó correctamente por el rol',
            'data' => $registros
        ], 200);
    }

    public function assignRole(UsuarioRequest $request)
    {
        $request = $this->usuarioService->assignRole(
            $request->input('usuario'),
            $request->input('id')
        ); 
      return response()->json([ 
        'message'=> 'Se asigno correctamente por el rol',
        'rol' => $request
      ],200);
    }

    public function verifyCredentials(UsuarioRequest $verify)
    {
        $verify = $this->usuarioService->verifyCredentials(
            $verify->input('usuario'),
            $verify->input('contraseña')
        );
          return response()->json([ 
        'message'=> 'Se verifico correctamente el usuario',
        'verifity' => $request
      ],200);
    }

}