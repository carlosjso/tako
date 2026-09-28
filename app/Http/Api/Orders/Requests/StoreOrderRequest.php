<?php

namespace App\Http\Api\Orders\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'table_id' => [
                'nullable',
                'uuid',
                Rule::exists('restaurant_tables', 'id')->where('business_id', $this->user()->business_id),
            ]
        ];
    }
}
