<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAgendaElementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data' => 'required|date_format:Y-m-d',
            'orario_inizio' => 'required|date_format:H:i',
            'idPrestazione' => 'required|integer|exists:prestazioni,id',
        ];
    }
}
