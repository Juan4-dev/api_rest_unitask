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
                'date_format:H:i:s'
            ],
            'hora_salida' => [
                'nullable',
                'date_format:H:i:s',
                'after_or_equal:hora_entrada'
            ],
            'estado_validacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'fecha' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:Y-m-d'
            ],
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,numero_identificacion'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'hora_entrada.required' => 'La hora de entrada es obligatoria.',
            'hora_entrada.date_format' => 'La hora de entrada debe tener el formato válido HH:MM:SS.',

            'hora_salida.date_format' => 'La hora de salida debe tener el formato válido HH:MM:SS.',
            'hora_salida.after_or_equal' => 'La hora de salida debe ser posterior o igual a la hora de entrada.',

            'estado_validacion.required' => 'El estado de validación es obligatorio.',
            'estado_validacion.string' => 'El estado de validación debe ser texto.',
            'estado_validacion.max' => 'El estado de validación no puede exceder los 50 caracteres.',

            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date_format' => 'La fecha debe tener el formato válido YYYY-MM-DD.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no existe en el sistema.'
        ];
    }
}