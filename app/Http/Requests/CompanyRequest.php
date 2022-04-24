<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        return [
            'Name' => 'required',//numeric
            'email' => 'nullable',//numeric
            'website' => 'nullable|regex:'.$regex ,
            'logo' => 'nullable|mimes:jpeg,png,jpg|max:2048|dimensions:min_width=100,min_height=100',

        ];
    }

    //edit messages
    //public function messages(){ return []; }
}
