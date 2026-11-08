<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadisticaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');

        return [
            'tipo_grafico' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:20'
            ],
            'id_reporte' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:reportes,id_reporte'
            ],
            'id_pago' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:pagos,id_pago'
            ],
            'id_labor' => [
                $isUpdate ? 'sometimes' : 'required',
                'integer',
                'exists:servicios,id_labor'
            ],
            'periodo_evaluado' => [
                $isUpdate ? 'sometimes' : 'required',
                'date'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'tipo_grafico.required' => 'El tipo de gráfico es obligatorio.',
            'tipo_grafico.string' => 'El tipo de gráfico debe ser texto.',
            'tipo_grafico.max' => 'El tipo de gráfico no puede exceder los 20 caracteres.',

            'id_reporte.required' => 'El reporte es obligatorio.',
            'id_reporte.integer' => 'El identificador del reporte debe ser un número entero.',
            'id_reporte.exists' => 'El reporte seleccionado no existe en el sistema.',

            'id_pago.required' => 'El pago es obligatorio.',
            'id_pago.integer' => 'El identificador del pago debe ser un número entero.',
            'id_pago.exists' => 'El pago seleccionado no existe en el sistema.',

            'id_labor.required' => 'La labor es obligatoria.',
            'id_labor.integer' => 'El identificador de la labor debe ser un número entero.',
            'id_labor.exists' => 'La labor seleccionada no existe en el sistema.',

            'periodo_evualado.required' => 'El período evaluado es obligatorio.',
            'periodo_evualado.date' => 'El período evaluado debe ser una fecha válida.'
        ];
    }
}