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
        $pagoId = $this->route('pago') ?? $this->route('id_pago') ?? $this->route('id');

        return [
            'total_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'numeric',
                'min:0'
            ],
            'estado' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:40'
            ],
            'cantidad' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'min:1'
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
            'total_pago.required' => 'El total del pago es obligatorio.',
            'total_pago.numeric' => 'El total del pago debe ser un valor numérico.',
            'total_pago.min' => 'El total del pago no puede ser negativo.',

            'estado.required' => 'El estado del pago es obligatorio.',
            'estado.string' => 'El estado debe ser texto.',
            'estado.max' => 'El estado no puede exceder los 40 caracteres.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser al menos 1.',

            'numero_identificacion.required' => 'El número de identificación del empleado es obligatorio.',
            'numero_identificacion.integer' => 'El número de identificación debe ser un número entero.',
            'numero_identificacion.exists' => 'El empleado seleccionado no se encuentra registrado en el sistema.'
        ];
    }
}