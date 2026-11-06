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
                'date'
            ],
            'cantidad_servicios' => [
                'nullable',
                'integer',
                'min:0'
            ],
            'id_pago' => [
                'nullable',
                'integer',
                'exists:pagos,id_pago'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_servicio.required' => 'El nombre del servicio es obligatorio.',
            'nombre_servicio.string' => 'El nombre del servicio debe ser texto.',
            'nombre_servicio.max' => 'El nombre del servicio no puede exceder los 50 caracteres.',

            'labor_servicio.required' => 'La labor del servicio es obligatoria.',
            'labor_servicio.string' => 'La labor del servicio debe ser texto.',
            'labor_servicio.max' => 'La labor del servicio no puede exceder los 50 caracteres.',

            'horas_labor.date' => 'Las horas de labor deben tener un formato de fecha válido.',

            'cantidad_servicios.integer' => 'La cantidad de servicios debe ser un número entero.',
            'cantidad_servicios.min' => 'La cantidad de servicios no puede ser menor a 0.',

            'id_pago.integer' => 'El identificador del pago debe ser un número entero.',
            'id_pago.exists' => 'El pago seleccionado no existe en el sistema.'
        ];
    }
}