<?php

namespace App\Http\Controllers;
use App\Services\AsistenciaService;
use App\Http\Requests\AsistenciaRequest;

class AsistenciaController extends Controller
{
    public function __construct(private AsistenciaService $asistenciaService)
    {
    }

    // Traer todos los registros
    public function index()
    {
        $registros = $this->asistenciaService->getAll();

        return response()->json([
            'message' => "Se listaron las asistencias correctamente",
            'data' => $registros
        ], 200);
    }

    // Crear un registro
    public function store(AsistenciaRequest $request)
    {
        $registroAsistencia = $this->asistenciaService->create($request->validated());
               
        return response()->json([
            'message' => 'La asistencia se creó correctamente',
            'datosRegistrados' => $registroAsistencia
        ], 201);
    }

    // Traer un registro por id
    public function show(string $id)
    {
        $registro = $this->asistenciaService->getById($id);

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
    public function update(AsistenciaRequest $request, string $id)
    {
        $registroActualizado = $this->asistenciaService->update($id, $request->validated());

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
        $validar = $this->asistenciaService->delete($id);
        
        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el registro con ese id'
            ], 404);
        }

        return response()->json([
            'message' => 'La asistencia se eliminó correctamente',
        ], 200);
    }

    public function findByDate(AsistenciaRequest $rango)
    {
        $data = $this->asistenciaService->findByDate($request->input('fecha'));

        return response()->json([
            'message' => 'Se listo correctamente por fecha',
            'data' => $data
        ], 200);
    }

    public function findByDateRange(AsistenciaRequest $fechas)
    {
        $data = $this->asistenciaService->findByDateRange(
            $request->fechas('fecha_inicio'), 
            $request->fechas('fecha_fin')
        );

        return response()->json([
            'message' => 'Se listo correctamente por rango de fechas',
            'data' => $data
        ], 200);
    }

    // Buscar por identidad
    public function findByIdentity(string $numeroIdentificacion)
    {
        $data = $this->asistenciaService->findByIdentity($numeroIdentificacion);

        return response()->json([
            'message' => 'Se listo correctamente por numero de identificacion',
            'data' => $data
        ], 200);
    }

    // Buscar por estado de validacion
    public function findByStatus(string $estadoValidacion)
    {
        $data = $this->asistenciaService->findByStatus($estadoValidacion);

        return response()->json([
            'message' => 'Se listo correctamente por estado de validacion',
            'data' => $data
        ], 200);
    }

    
    public function registerEntry(AsistenciaRequest $register)
    {
        $registerEntry = $this->asistenciaService->registerEntry($register->validated());

        return response()->json([
            'message' => 'Entrada registrada correctamente',
            'registerEntry' => $registerEntry
        ], 201);
    }

    public function registerExit(AsistenciaRequest $register, int $id)
    {
        $data = $this->asistenciaService->registerExit($id);

        return response()->json([
            'message' => 'Salida registrada correctamente',
            'data' => $data
        ], 200);
    }
}