<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'tipo_fallas' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'cantidad_fallas' => [
                'nullable',
                'integer',
                'min:0'
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
            'tipo_fallas.required' => 'El tipo de fallas es obligatorio.',
            'tipo_fallas.string' => 'El tipo de fallas debe ser texto.',
            'tipo_fallas.max' => 'El tipo de fallas no puede exceder los 50 caracteres.',

            'cantidad_fallas.integer' => 'La cantidad de fallas debe ser un número entero.',
            'cantidad_fallas.min' => 'La cantidad de fallas no puede ser menor a 0.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no existe en el sistema.'
        ];
    }
}