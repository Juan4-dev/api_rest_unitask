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

        $usuarioId = $this->route('usuario')
            ?? $this->route('numero_identificacion')
            ?? $this->route('id');

        return [
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1',
                Rule::unique('usuarios', 'numero_identificacion')
                    ->ignore($usuarioId, 'numero_identificacion')
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
                'string',
                'max:20'
            ],

            'correo_empleado' => [
                $isUpdate ? 'sometimes' : 'required',
                'email',
                'max:80'
            ],

            'usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10',
                Rule::unique('usuarios', 'usuario')
                    ->ignore($usuarioId, 'numero_identificacion')
            ],

            'contraseña' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'min:8',
                'max:255'
            ],

            'id_rol' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:roles,id_rol'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'numero_identificacion.required' => 'El número de identificación es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.min' => 'El número de identificación debe ser mayor que cero.',
            'numero_identificacion.unique' => 'Este número de identificación ya se encuentra registrado.',

            'nombre_empleado.required' => 'El nombre del empleado es obligatorio.',
            'nombre_empleado.string' => 'El nombre debe ser texto.',
            'nombre_empleado.max' => 'El nombre no puede exceder los 40 caracteres.',

            'apellido_empleado.required' => 'El apellido del empleado es obligatorio.',
            'apellido_empleado.string' => 'El apellido debe ser texto.',
            'apellido_empleado.max' => 'El apellido no puede exceder los 40 caracteres.',

            'telefono_empleado.required' => 'El teléfono del empleado es obligatorio.',
            'telefono_empleado.string' => 'El teléfono debe ser texto.',
            'telefono_empleado.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo_empleado.required' => 'El correo electrónico es obligatorio.',
            'correo_empleado.email' => 'Debe ingresar un correo electrónico válido.',
            'correo_empleado.max' => 'El correo no puede exceder los 80 caracteres.',

            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.string' => 'El nombre de usuario debe ser texto.',
            'usuario.max' => 'El nombre de usuario no puede exceder los 10 caracteres.',
            'usuario.unique' => 'Este nombre de usuario ya se encuentra registrado.',

            'contraseña.required' => 'La contraseña es obligatoria.',
            'contraseña.string' => 'La contraseña debe ser texto.',
            'contraseña.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contraseña.max' => 'La contraseña no puede exceder los 255 caracteres.',

            'id_rol.required' => 'El rol del usuario es obligatorio.',
            'id_rol.integer' => 'El identificador del rol debe ser un número entero.',
            'id_rol.exists' => 'El rol seleccionado no se encuentra registrado.'
        ];
    }
}
