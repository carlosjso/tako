<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreInventoryMovementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->role ==='owner';
    }

    public function rules(): array
    {
        return [
            'product_id' => [
                'required',
                Rule::exists('products', 'id')
                    ->where('business_id', Auth::user()->business_id)
                    ->whereNull('deleted_at'),
            ],
            'quantity_change' => [
                'required',
                'integer',
                'not_in:0',
                Rule::when(fn () => $this->input('reason') === 'purchase', ['gt:0']),
                Rule::when(fn () => $this->input('reason') === 'waste', ['lt:0']),
            ],
            'reason' => [
                'required',
                Rule::in(['manual', 'purchase', 'waste'])
            ],
            'note' => 'nullable|string|max:255',
        ];
    }
}
