<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
            'sometimes',
            'string',
            'max:255',
            Rule::unique('categories', 'name')
                ->where('business_id', Auth::user()->business_id)
                ->ignore($this->route('category'))
        ],
            'display_order' => 'sometimes|integer',
        ];
    }
}
