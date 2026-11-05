<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'hora_entrada' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ],
            'hora_salida' => [
                'nullable',
                'date',
                'after_or_equal:hora_entrada'
            ],
            'estado_validacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'fecha' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
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
            'hora_entrada.required' => 'La hora de entrada es obligatoria.',
            'hora_entrada.date' => 'La hora de entrada debe ser una fecha y hora válida.',

            'hora_salida.date' => 'La hora de salida debe ser una fecha y hora válida.',
            'hora_salida.after_or_equal' => 'La hora de salida debe ser posterior o igual a la hora de entrada.',

            'estado_validacion.required' => 'El estado de validación es obligatorio.',
            'estado_validacion.string' => 'El estado de validación debe ser texto.',
            'estado_validacion.max' => 'El estado de validación no puede exceder los 50 caracteres.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe tener un formato válido.',

            'numero_identificacion.required' => 'El número de identificación es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado con este número de identificación no existe.'
        ];
    }
}