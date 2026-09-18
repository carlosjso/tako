<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'table_id' => [
                'sometimes',
                'uuid',
                Rule::exists('restaurant_tables', 'id')->where('business_id', $this->user()->business_id),
            ]
        ];
    }
}
