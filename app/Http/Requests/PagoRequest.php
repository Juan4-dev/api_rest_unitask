<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PagoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'total_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40',
                Rule::in(['Pendiente', 'Completado', 'Anulado', 'Pagado', 'Rechazado']) 
            ],
            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
            ],
            'metodo_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'fecha_pago' => [
                'nullable',
                'date'
            ],
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,numero_identificacion'
            ],
            'placa_vehiculo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'exists:vehiculos,placa_vehiculo' 
            ],
            'id_servicio' => [
                'nullable',
                'integer',
                'exists:servicios,id_servicio' 
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'total_pago.required' => 'El total del pago es obligatorio.',
            'total_pago.numeric' => 'El total del pago debe ser un valor numérico.',
            'total_pago.min' => 'El total del pago no puede ser negativo.',

            'estado.required' => 'El estado del pago es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 40 caracteres.',
            'estado.in' => 'El estado seleccionado no es válido.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'metodo_pago.required' => 'El método de pago es obligatorio.',
            'metodo_pago.string' => 'El método de pago debe ser texto.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no se encuentra registrado en el sistema.',

            'placa_vehiculo.required' => 'La placa del vehículo es obligatoria.',
            'placa_vehiculo.string' => 'La placa debe ser una cadena de texto válida.',
            'placa_vehiculo.exists' => 'El vehículo con esa placa no se encuentra registrado en el sistema.',

            'id_servicio.exists' => 'El servicio seleccionado no existe en el sistema.'
        ];
    }
}