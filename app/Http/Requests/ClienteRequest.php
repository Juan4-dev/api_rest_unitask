<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestCliente extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $clienteId = $this->route('cliente') ?? $this->route('cedula') ?? $this->route('id');

        return [
            'cedula_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                Rule::unique('clientes', 'cedula_cliente')->ignore($clienteId, 'cedula_cliente')
            ],
            'nombre_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'apellido_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'correo_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:30'
            ],
            'placa_vehiculo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10',
                'exists:vehiculos,placa_vehiculo'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'cedula_cliente.required' => 'La cédula del cliente es obligatoria.',
            'cedula_cliente.integer' => 'La cédula del cliente debe ser numérica.',
            'cedula_cliente.unique' => 'Esta cédula ya está registrada.',

            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'nombre_cliente.string' => 'El nombre del cliente debe ser texto.',
            'nombre_cliente.max' => 'El nombre del cliente no puede exceder los 30 caracteres.',

            'apellido_cliente.required' => 'El apellido del cliente es obligatorio.',
            'apellido_cliente.string' => 'El apellido del cliente debe ser texto.',
            'apellido_cliente.max' => 'El apellido del cliente no puede exceder los 30 caracteres.',

            'correo_cliente.required' => 'El correo electrónico es obligatorio.',
            'correo_cliente.email' => 'Debe proporcionar un correo electrónico válido.',
            'correo_cliente.max' => 'El correo electrónico no puede exceder los 30 caracteres.',

            'placa_vehiculo.required' => 'La placa del vehículo es obligatoria.',
            'placa_vehiculo.string' => 'La placa del vehículo debe ser texto.',
            'placa_vehiculo.max' => 'La placa del vehículo no puede exceder los 10 caracteres.',
            'placa_vehiculo.exists' => 'El vehículo seleccionado no existe en el sistema.'
        ];
    }
}
