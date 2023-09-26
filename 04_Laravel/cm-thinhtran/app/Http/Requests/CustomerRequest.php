<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|min:1',
            'company_name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'city' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|int|max:20',
            'other_info' => 'nullable|string',
        ];
    }
}
