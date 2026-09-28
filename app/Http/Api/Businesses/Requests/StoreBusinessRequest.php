<?php

namespace App\Http\Api\Businesses\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:businesses,email',
            'phone' => 'required|string|max:13',
            'currency' => 'required|string|max:3',
            'business_hours' => 'nullable|array',
        ];
    }
}
