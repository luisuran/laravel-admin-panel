<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|unique:companies,email,' . $this->id,
            'logo' => 'image|dimensions:min_width=100,min_height=100|mimes:jpg,png,jpeg',
            'website' => 'nullable|url',
        ];

        if ($this->method() === 'PATCH') {
            $rules['email'] = 'required|unique:companies,email,' . $this->company->id;
        }

        return $rules;
    }
}
