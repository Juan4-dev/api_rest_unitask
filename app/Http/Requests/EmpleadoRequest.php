<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpleadoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $empleadoId = $this->route('empleado') ?? $this->route('numero_identificacion') ?? $this->route('id');

        return [
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                Rule::unique('empleados', 'numero_identificacion')->ignore($empleadoId, 'numero_identificacion')
            ],
            'nombre_empleado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40'
            ],
            'apellido_empleado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40'
            ],
            'telefono_empleado' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer'
            ],
            'correo_empleado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'email',
                'max:80',
                Rule::unique('empleados', 'correo_empleado')->ignore($empleadoId, 'numero_identificacion')
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'numero_identificacion.required' => 'El número de identificación es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.unique' => 'Este número de identificación ya se encuentra registrado.',

            'nombre_empleado.required' => 'El nombre del empleado es obligatorio.',
            'nombre_empleado.string' => 'El nombre debe ser texto.',
            'nombre_empleado.max' => 'El nombre no puede exceder los 40 caracteres.',

            'apellido_empleado.required' => 'El apellido del empleado es obligatorio.',
            'apellido_empleado.string' => 'El apellido debe ser texto.',
            'apellido_empleado.max' => 'El apellido no puede exceder los 40 caracteres.',

            'telefono_empleado.required' => 'El teléfono es obligatorio.',
            'telefono_empleado.integer' => 'El teléfono debe ser un número entero.',

            'correo_empleado.required' => 'El correo electrónico es obligatorio.',
            'correo_empleado.string' => 'El correo debe ser texto.',
            'correo_empleado.email' => 'Debe ingresar un formato de correo electrónico válido.',
            'correo_empleado.max' => 'El correo no puede exceder los 80 caracteres.',
            'correo_empleado.unique' => 'Este correo electrónico ya está registrado.'
        ];
    }
}