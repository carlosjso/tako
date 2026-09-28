<?php

namespace App\Http\Api\OrderItems\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => [
                'sometimes',
                'uuid',
                Rule::exists('products', 'id')->where('business_id', $this->user()->business_id),
            ],
            'quantity' => 'sometimes|ingeter',
            'modifiers' => 'sometimes|string|max:255',
            'canel_reason' => 'sometimes|string|max:255',
        ];
    }
}
