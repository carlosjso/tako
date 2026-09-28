<?php

namespace App\Http\Api\Products\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => [
                'sometimes',
                Rule::exists('categories', 'id')->where('business_id', Auth::user()->business_id),
            ],
            'name' => 'sometimes|string|max:255',
            'image_url' => 'sometimes|string',
            'sale_price' => 'sometimes|integer',
            'production_cost' => 'sometimes|integer',
            'is_available' => 'sometimes|boolean',
            'track_inventory' => 'sometimes|boolean',
        ];
    }
}
