<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehiculoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        
        $vehiculoId = $this->route('vehiculo') ?? $this->route('placa_vehiculo') ?? $this->route('id');

        return [
            'placa_vehiculo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10',
                Rule::unique('vehiculos', 'placa_vehiculo')->ignore($vehiculoId, 'placa_vehiculo')
            ],
            'tipo_vehiculo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40'
            ],
            'cedula_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:clientes,cedula_cliente'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'placa_vehiculo.required' => 'La placa del vehículo es obligatoria.',
            'placa_vehiculo.string' => 'La placa del vehículo debe ser texto.',
            'placa_vehiculo.max' => 'La placa del vehículo no puede exceder los 10 caracteres.',
            'placa_vehiculo.unique' => 'Esta placa de vehículo ya se encuentra registrada en el sistema.',

            'tipo_vehiculo.required' => 'El tipo de vehículo es obligatorio.',
            'tipo_vehiculo.string' => 'El tipo de vehículo debe ser texto.',
            'tipo_vehiculo.max' => 'El tipo de vehículo no puede exceder los 40 caracteres.',

            'cedula_cliente.required' => 'La cédula del cliente es obligatoria.',
            'cedula_cliente.integer' => 'La cédula del cliente debe ser un número entero.',
            'cedula_cliente.exists' => 'El cliente seleccionado no existe en el sistema.'
        ];
    }
}
