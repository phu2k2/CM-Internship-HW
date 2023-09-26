<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'companyId' => 'required|string|size:6|unique:category, companyId',
            'companyName' => 'required|string|max:50',
            'transactionName' => 'required|string|max:20',
            'address' => 'required|string|max:50',
            'email' => 'required|email|max:30',
            'phoneNumber' => 'required|string|max:15',
            'fax' => 'required|string|max:15',
        ];
    }
}
