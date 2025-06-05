<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPrestazioneRequest extends FormRequest
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
            'nome' => 'required|string|max:70',
            'descrizione' => 'required|string',
            'prescrizioni' => 'required|string|max:100',
            'idDipartimento' => 'required|integer|exists:dipartimenti,id',
            'medico' => 'required|string|exists:utenti,username',
        ];
    }
}
