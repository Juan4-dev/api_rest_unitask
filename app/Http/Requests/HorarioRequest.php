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
                'date_format:Y-m-d H:i:s'
            ],
            'nombre_turno' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20'
            ],
            'fecha_turno' => [
                'nullable',
                'date'
            ],
            'jornada' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:30'
            ],
            'id_turno' => [ 
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:turnos,id_turno'
            ],
            'numero_identificacion' => [
                'nullable',
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

            'periodo.date_format' => 'El período debe tener el formato Y-m-d H:i:s.',

            'nombre_turno.required' => 'El nombre del turno es obligatorio.',
            'nombre_turno.string' => 'El nombre del turno debe ser texto.',
            'nombre_turno.max' => 'El nombre del turno no puede exceder los 20 caracteres.',

            'fecha_turno.date' => 'La fecha del turno debe ser una fecha válida.',

            'jornada.required' => 'La jornada es obligatoria.',
            'jornada.string' => 'La jornada debe ser texto.',
            'jornada.max' => 'La jornada no puede exceder los 30 caracteres.',

            'id_turno.required' => 'El identificador del turno es obligatorio.',
            'id_turno.integer' => 'El identificador del turno debe ser un número entero.',
            'id_turno.exists' => 'El turno seleccionado no existe en el sistema.',

            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no existe en el sistema.'
        ];
    }
}