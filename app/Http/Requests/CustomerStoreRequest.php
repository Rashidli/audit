<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'company_name' => 'required|string|max:255',
            'company_voen' => 'required|string|max:255',
            'company_area' => 'required|string|max:255',
            'company_phone' => 'required|string|max:255',
            'main_address' => 'required|string|max:255',

            'bank_branch' => 'required|string|max:255',
            'bank_voen' => 'required|string|max:255',
            'bank_swift' => 'required|string|max:255',
            'bank_iban' => 'required|string|max:255',
            'bank_code' => 'required|string|max:255',

            'company_cat' => 'required|string|max:255',
            'company_count_employee' => 'required|integer',
            'company_address' => 'required|string|max:255',
            'company_return' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',

            'contract_name' => 'required|string|max:255',
            'contract_curator' => 'required|string|max:255',
            'contract_date' => 'required|string|max:255',
            'contract_number' => 'required|string|max:255',
            'contract_end_date' => 'required|string|max:255',
            'contract_file' => 'required',

            'person_name' => 'required|string|max:255',
            'person_phone' => 'required|string|max:255',
            'person_address' => 'required|string|max:255',
            'person_filial' => 'required|string|max:255',
            'person_email' => 'required|string|email|max:255',
        ];
    }
}
