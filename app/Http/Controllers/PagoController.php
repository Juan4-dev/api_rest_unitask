<?php

namespace App\Http\Controllers;

use App\Services\PagoService;
use App\Http\Requests\PagoRequest;

class PagoController extends Controller
{
    public function __construct(private PagoService $pagoService)
    {
    }
    public function index()
    {
        $registros = $this->pagoService->getAll();

        return response()->json([
            'message' => 'Se listaron los pagos correctamente',
            'data' => $registros
        ], 200);
    }

    public function store(PagoRequest $request)
    {
        $registroPago = $this->pagoService->create($request->validated());

        return response()->json([
            'message' => 'El pago se registró correctamente',
            'datosRegistrados' => $registroPago
        ], 201);
    }

    public function show($id)
    {
        $registro = $this->pagoService->getById($id);

        if (!$registro) {
            return response()->json([
                'message' => 'No se encontró el pago con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se listó el pago correctamente',
            'data' => $registro
        ], 200);
    }

    public function update(PagoRequest $request, $id)
    {
        $registroActualizado = $this->pagoService->update($id, $request->validated());

        if (!$registroActualizado) {
            return response()->json([
                'message' => 'No se encontró el pago con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'Se actualizó el pago correctamente',
            'data' => $registroActualizado
        ], 200);
    }

    public function destroy($id)
    {
        $validar = $this->pagoService->delete($id);

        if (!$validar) {
            return response()->json([
                'message' => 'No se encontró el pago con ese identificador'
            ], 404);
        }

        return response()->json([
            'message' => 'El pago se eliminó correctamente'
        ], 200);
    }

    public function calcularNomina(int $numeroIdentificacion)
    {
        $resultadoNomina = $this->pagoService->calcularNominaEmpleado($numeroIdentificacion);

        return response()->json([
            'message' => 'Cálculo de nómina generado exitosamente',
            'data' => $resultadoNomina
        ], 200);
    }
}