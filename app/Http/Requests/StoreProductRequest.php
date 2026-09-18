<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where('business_id', Auth::user()->business_id),
            ],
            'name' => 'required|string|max:255',
            'image_url' => 'nullable|string',
            'sale_price' => 'required|integer',
            'production_cost' => 'required|integer',
            'current_stock' => 'required|integer',
            'is_available' => 'required|boolean',
            'track_inventory' => 'required|boolean',
        ];
    }
}
