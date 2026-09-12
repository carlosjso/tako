<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantTableRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'label' => [
                'sometimes',
                'string',
                'max:255', 
                Rule::unique('restaurant_tables', 'label')
                    ->where('business_id', auth()->user()->business_id)
                    ->ignore($this->route('restaurant_table')),
            ],
        ];
    }
}
