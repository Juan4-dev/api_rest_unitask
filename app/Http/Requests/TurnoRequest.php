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
            'nombre_turno' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'jornada' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'dia_turno' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:Y-m-d'
            ],
            'inicio_turno' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i:s'
            ],
            'fin_turno' => [
                $isUpdate ? 'sometimes' : 'required',
                'date_format:H:i:s',
                'after:inicio_turno'
            ],
            'horas_extras' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'id_horario' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:horarios,id_horario'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_turno.required' => 'El nombre del turno es obligatorio.',
            'nombre_turno.string' => 'El nombre del turno debe ser texto.',
            'nombre_turno.max' => 'El nombre del turno no puede exceder los 30 caracteres.',

            'jornada.required' => 'La jornada es obligatoria.',
            'jornada.string' => 'La jornada debe ser texto.',
            'jornada.max' => 'La jornada no puede exceder los 30 caracteres.',

            'dia_turno.required' => 'El día del turno es obligatorio.',
            'dia_turno.date_format' => 'El día del turno debe tener el formato válido YYYY-MM-DD.',

            'inicio_turno.required' => 'La hora de inicio del turno es obligatoria.',
            'inicio_turno.date_format' => 'La hora de inicio debe tener el formato válido HH:MM:SS.',

            'fin_turno.required' => 'La hora de fin del turno es obligatoria.',
            'fin_turno.date_format' => 'La hora de fin debe tener el formato válido HH:MM:SS.',
            'fin_turno.after' => 'La hora de fin debe ser posterior a la hora de inicio.',

            'horas_extras.integer' => 'Las horas extras deben ser un número entero.',
            'horas_extras.min' => 'Las horas extras no pueden ser negativas.',

            'id_horario.required' => 'El identificador del horario es obligatorio.',
            'id_horario.integer' => 'El identificador del horario debe ser un número entero.',
            'id_horario.exists' => 'El horario seleccionado no existe en el sistema.'
        ];
    }
}