<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Datos del Negocio
            'business_name' => 'required|string|max:255',
            'business_address' => 'required|string|max:255',
            'business_email' => 'required|email|max:255',
            'business_phone' => 'required|string|max:13',
            'business_currency' => 'nullable|string|max:3',

            // Datos del Usuario
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255|unique:users,email',
            'user_phone' => 'required|string|max:13',
            'user_password' => 'required|string|min:8',
        ];
    }
}
