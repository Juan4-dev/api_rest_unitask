<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'tipo_horario' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'periodo' => [  
                'nullable',
                'date'
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
            'tipo_horario.required' => 'El tipo de horario es obligatorio.',
            'tipo_horario.string' => 'El tipo de horario debe ser texto.',
            'tipo_horario.max' => 'El tipo de horario no puede exceder los 30 caracteres.',

            'periodo.date' => 'El período debe ser una fecha y hora válida.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no existe en el sistema.'
        ];
    }
}