<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'nombre_servicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'labor_servicio' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'horas_labor' => [
                'nullable',
                'date_format:Y-m-d H:i:s'
            ],
            'cantidad_servicios' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,numero_identificacion'
            ],
            'placa_vehiculo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:10',
                'exists:vehiculos,placa_vehiculo'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_servicio.required' => 'El nombre del servicio es obligatorio.',
            'nombre_servicio.string' => 'El nombre del servicio debe ser texto.',
            'nombre_servicio.max' => 'El nombre del servicio no puede exceder los 50 caracteres.',

            'labor_servicio.required' => 'La descripción de la labor es obligatoria.',
            'labor_servicio.string' => 'La descripción de la labor debe ser texto.',
            'labor_servicio.max' => 'La descripción de la labor no puede exceder los 50 caracteres.',

            'horas_labor.date_format' => 'Las horas de labor deben tener el formato válido YYYY-MM-DD HH:MM:SS.',

            'cantidad_servicios.integer' => 'La cantidad de servicios debe ser un número entero.',
            'cantidad_servicios.min' => 'La cantidad de servicios no puede ser negativa.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado especificado no existe en el sistema.',

            'placa_vehiculo.required' => 'La placa del vehículo es obligatoria.',
            'placa_vehiculo.string' => 'La placa del vehículo debe ser texto.',
            'placa_vehiculo.max' => 'La placa del vehículo no puede exceder los 10 caracteres.',
            'placa_vehiculo.exists' => 'El vehículo con esta placa no se encuentra registrado en el sistema.'
        ];
    }
}