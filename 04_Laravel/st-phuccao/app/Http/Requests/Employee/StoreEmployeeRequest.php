<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'last_name' => 'required|max:40',
            'first_name' => 'required|max:10',
            'birthday' => 'required|date',
            'start_date' => 'required|date',
            'address' => 'required|max:60',
            'phone' => 'required|max:15||unique:employees|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,15',
            'base_salary' => 'required|numeric|min:0',
            'allowance' => 'required|numeric|min:0',
        ];
    }
}
