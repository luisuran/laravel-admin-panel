<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'required|email|unique:employees,email,' . $this->id,
            'phone' => 'nullable|string'
        ];

        if ($this->method() === 'PATCH') {
            $rules['email'] = 'required|unique:employees,email,' . $this->employee->id;
        };

        return $rules;
    }
}
