<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'method' => ['required', Rule::in(['cash', 'card', 'transfer'])],
            'amount' => 'required|integer|min:1',
            'tip_amount' => 'sometimes|integer|min:0',
        ];
    }
}
