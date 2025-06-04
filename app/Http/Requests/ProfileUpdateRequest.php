<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'telefono' => ['required', 'string', 'max:10'],
            'indirizzo' => ['required', 'string', 'max:255'],
            'profile_picture' => ['image', 'max:4000'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
