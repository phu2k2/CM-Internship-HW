<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employee_id' => 'required|integer|min:1',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'start_date' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'base_salary' => 'required|numeric',
        ];
    }
}
