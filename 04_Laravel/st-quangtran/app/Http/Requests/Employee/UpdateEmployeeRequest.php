<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'employeeId' => 'required|string|size:4|unique:employee, employeeId',
            'lastName' => 'required|string|max:40',
            'firstName' => 'required|string|max:10',
            'birthday' => 'required|date',
            'startDate' => 'required|date',
            'address' => 'required|string|max:60',
            'phoneNumber' => 'required|string|max:15',
            'baseSalary' => 'required|numeric',
            'allowance' => 'required|numeric',
        ];
    }
}
