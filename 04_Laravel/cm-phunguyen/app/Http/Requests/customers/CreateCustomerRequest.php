<?php

namespace App\Http\Requests\customers;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'company_name'=>'required|string|max:30',
            'transaction_name'=>'required|string|max:10',
            'address' => 'required|string|max:40',
            'email' => 'required|email|unique:customers|max:30',
            'phone'=>'required|string|max:20',
            'fax'=> 'required|string'
        ];
        dd($this->request);
    }
}
