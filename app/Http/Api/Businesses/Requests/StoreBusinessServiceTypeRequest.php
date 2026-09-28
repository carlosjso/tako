<?php

namespace App\Http\Api\Businesses\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessServiceTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_type_ids' => 'required|array',
            'service_type_ids.*' => 'exists:service_types,id',
        ];
    }
}
