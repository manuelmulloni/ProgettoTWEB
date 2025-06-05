<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddPrestazioniToUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Check if the user is logged in and is an admin
        return Auth::check() && Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'staff' => 'required|array',
            'staff.*' => 'exists:utenti,username', // Ensure each staff ID exists in the users table
            'prestazioni' => 'required|array',
            'prestazioni.*' => 'exists:prestazioni,id', // Ensure each prestazione ID exists in the prestazioni table
        ];
    }
}
