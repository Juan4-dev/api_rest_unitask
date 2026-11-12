<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurnoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'dia_turno' => [
                'nullable',
                'date'
            ],

            'hora_inicio' => [
                'nullable',
                'date_format:H:i:s'
            ],

            'hora_fin' => [
                'nullable',
                'date_format:H:i:s'
            ],

            'horas_extras' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:0'
            ],

            'numero_identificacion' => [
                'nullable',
                'integer',
                'exists:usuarios,numero_identificacion'
            ],

            'id_horario' => [
                'nullable',
                'integer',
                'exists:horarios,id_horario'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'dia_turno.date' => 'El día del turno debe ser una fecha válida.',

            'hora_inicio.date_format' => 'La hora de inicio debe tener un formato válido (HH:MM:SS).',

            'hora_fin.date_format' => 'La hora de finalización debe tener un formato válido (HH:MM:SS).',

            'horas_extras.required' => 'La cantidad de horas extras es obligatoria.',
            'horas_extras.integer' => 'Las horas extras deben ser un número entero.',
            'horas_extras.min' => 'Las horas extras no pueden ser negativas.',

            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El usuario seleccionado no se encuentra registrado.',

            'id_horario.integer' => 'El identificador del horario debe ser un número entero.',
            'id_horario.exists' => 'El horario seleccionado no se encuentra registrado.'
        ];
    }
}