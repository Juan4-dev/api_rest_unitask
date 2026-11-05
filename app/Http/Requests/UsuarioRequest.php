<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $usuarioId = $this->route('usuario') ?? $this->route('id');

        return [
            'usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10',
                Rule::unique('usuarios', 'usuario')->ignore($usuarioId, 'id_usuario')
            ],
            'contraseña' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:6',
                'max:20'
            ],
            'id_rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id_rol'
            ],
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:empleados,numero_identificacion'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.string' => 'El usuario debe ser texto.',
            'usuario.max' => 'El usuario no puede exceder los 10 caracteres.',
            'usuario.unique' => 'Este nombre de usuario ya está registrado.',

            'contraseña.required' => 'La contraseña es obligatoria.',
            'contraseña.string' => 'La contraseña debe ser texto.',
            'contraseña.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'contraseña.max' => 'La contraseña no puede exceder los 20 caracteres.',

            'id_rol.required' => 'El rol es obligatorio.',
            'id_rol.integer' => 'El identificador del rol debe ser un número entero.',
            'id_rol.exists' => 'El rol seleccionado no existe en el sistema.',

            'numero_identificacion.required' => 'El número de identificación es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado con este número de identificación no existe.'
        ];
    }
}