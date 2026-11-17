<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'min:0',
                'max:99999999.99'
            ],
            'cantidad' => [
                'nullable',
                'integer',
                'min:1'
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'metodo_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50'
            ],
            'fecha_pago' => [
                'nullable',
                'date_format:Y-m-d H:i:s'
            ],
            'numero_identificacion' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:usuarios,numero_identificacion'
            ],
            'id_labor' => [
                'nullable',
                'integer',
                'exists:servicios,id_labor'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'total_pago.required' => 'El total del pago es obligatorio.',
            'total_pago.numeric' => 'El total del pago debe ser un valor numérico.',
            'total_pago.min' => 'El total del pago no puede ser negativo.',
            'total_pago.max' => 'El total del pago excede el límite permitido.',

            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'estado.required' => 'El estado del pago es obligatorio.',
            'estado.string' => 'El estado del pago debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 50 caracteres.',

            'metodo_pago.required' => 'El método de pago es obligatorio.',
            'metodo_pago.string' => 'El método de pago debe ser texto.',
            'metodo_pago.max' => 'El método de pago no puede exceder los 50 caracteres.',

            'fecha_pago.date_format' => 'La fecha de pago debe tener el formato válido YYYY-MM-DD HH:MM:SS.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado especificado no existe en el sistema.',

            'id_labor.integer' => 'El identificador de la labor debe ser un número entero.',
            'id_labor.exists' => 'El servicio o labor especificado no existe en el sistema.'
        ];
    }
}