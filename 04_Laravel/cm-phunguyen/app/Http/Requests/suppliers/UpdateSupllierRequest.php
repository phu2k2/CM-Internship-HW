<?php

namespace App\Http\Requests\suppliers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupllierRequest extends FormRequest
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
            'company_id' => 'required',
            'company_name' => 'required|string|max:20',
            'transaction_name' => 'required|string|max:10',
            'address' => ['required','unique:suppliers,address,'.$this->supplier . ',id','max:40'],
            'phone' => 'required|string|max:20',
            'fax' => 'required|string|max:20',
            'email' => ['required','unique:suppliers,email,'.$this->supplier . ',id','max:30'],
        ];
    }
}
