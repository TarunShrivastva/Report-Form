<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'email' => 'string|required',
            'company' => 'string|required',
            'phone' => 'string|required|size:10',
            'country' => 'string|required',
            'details' => 'string|required'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required field',
            'email.required' => 'Email is required field',
            'company.required' => 'Company is required field',
            'phone.required' => 'Phone is required field',
            'country.required' => 'Country is required field',
            'details.required' => 'Details is required field',
        ];
    }
}
