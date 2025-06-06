<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPrenotazioneRequest extends FormRequest
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
            'usernamePaziente' => 'required|string|max:20|exists:utenti,username',
            'dataEsclusa' => 'nullable|date|after_or_equal:today',
            'idPrestazione' => 'required|integer|exists:prestazioni,id',
        ];
    }

}
