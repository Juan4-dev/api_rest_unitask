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
        
        $usuarioId = $this->route('usuario') ?? $this->route('numero_identificacion') ?? $this->route('id');

        return [
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                Rule::unique('usuarios', 'numero_identificacion')->ignore($usuarioId, 'numero_identificacion')
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
                'max:80',
                Rule::unique('usuarios', 'correo_empleado')->ignore($usuarioId, 'numero_identificacion')
            ],
            'usuario' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20',
                Rule::unique('usuarios', 'usuario')->ignore($usuarioId, 'numero_identificacion')
            ],
            'contraseña' => [
                $isUpdate ? 'nullable' : 'required',
                'string',
                'min:6',
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
            'numero_identificacion.unique' => 'Este número de identificación ya se encuentra registrado.',

            'nombre_empleado.required' => 'El nombre del empleado es obligatorio.',
            'nombre_empleado.string' => 'El nombre del empleado debe ser texto.',
            'nombre_empleado.max' => 'El nombre del empleado no puede exceder los 40 caracteres.',

            'apellido_empleado.required' => 'El apellido del empleado es obligatorio.',
            'apellido_empleado.string' => 'El apellido del empleado debe ser texto.',
            'apellido_empleado.max' => 'El apellido del empleado no puede exceder los 40 caracteres.',

            'telefono_empleado.required' => 'El teléfono del empleado es obligatorio.',
            'telefono_empleado.string' => 'El teléfono del empleado debe ser texto o número válido.',
            'telefono_empleado.max' => 'El teléfono no puede exceder los 20 caracteres.',

            'correo_empleado.required' => 'El correo electrónico es obligatorio.',
            'correo_empleado.email' => 'Debe proporcionar un formato de correo electrónico válido.',
            'correo_empleado.max' => 'El correo electrónico no puede exceder los 80 caracteres.',
            'correo_empleado.unique' => 'Este correo electrónico ya está registrado por otro usuario.',

            'usuario.required' => 'El nombre de usuario es obligatorio.',
            'usuario.string' => 'El nombre de usuario debe ser texto.',
            'usuario.max' => 'El nombre de usuario no puede exceder los 20 caracteres.',
            'usuario.unique' => 'Este nombre de usuario ya está en uso.',

            'contraseña.required' => 'La contraseña es obligatoria.',
            'contraseña.string' => 'La contraseña debe ser texto.',
            'contraseña.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'contraseña.max' => 'La contraseña no puede exceder los 255 caracteres.',

            'id_rol.required' => 'El rol del usuario es obligatorio.',
            'id_rol.integer' => 'El identificador del rol debe ser un número entero.',
            'id_rol.exists' => 'El rol seleccionado no existe en el sistema.'
        ];
    }
}