<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'last_name' => 'required|string|max:10',
            'first_name' => 'required|string|max:10',
            'birthday' => 'required|date',
            'start_date' => 'required|date',
            'address' => 'required|string|max:60',
            'phone_number' => 'required|string|max:15',
            'base_salary' => 'required|numeric|between:0,9999999.99',
            'allowance' => 'required|numeric|between:0,9999999.99',
        ];
    }
}
