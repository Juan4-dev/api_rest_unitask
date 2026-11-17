<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        
        $clienteId = $this->route('cliente') ?? $this->route('cedula_cliente') ?? $this->route('cedula');

        return [
            'cedula_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                Rule::unique('clientes', 'cedula_cliente')->ignore($clienteId, 'cedula_cliente')
            ],
            'nombre_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100'
            ],
            'apellido_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100'
            ],
            'correo_cliente' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:150',
                Rule::unique('clientes', 'correo_cliente')->ignore($clienteId, 'cedula_cliente')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'cedula_cliente.required' => 'La cédula del cliente es obligatoria.',
            'cedula_cliente.integer' => 'La cédula del cliente debe ser un número entero.',
            'cedula_cliente.unique' => 'Esta cédula ya se encuentra registrada en el sistema.',

            'nombre_cliente.required' => 'El nombre del cliente es obligatorio.',
            'nombre_cliente.string' => 'El nombre del cliente debe ser texto.',
            'nombre_cliente.max' => 'El nombre del cliente no puede exceder los 100 caracteres.',

            'apellido_cliente.required' => 'El apellido del cliente es obligatorio.',
            'apellido_cliente.string' => 'El apellido del cliente debe ser texto.',
            'apellido_cliente.max' => 'El apellido del cliente no puede exceder los 100 caracteres.',

            'correo_cliente.required' => 'El correo electrónico es obligatorio.',
            'correo_cliente.email' => 'Debe proporcionar un formato de correo electrónico válido.',
            'correo_cliente.max' => 'El correo electrónico no puede exceder los 150 caracteres.',
            'correo_cliente.unique' => 'Este correo electrónico ya está registrado por otro cliente.'
        ];
    }
}
