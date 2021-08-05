<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationsRequest extends FormRequest
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
            'title' => 'required',
            'graduate' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title tidak boleh kosong',
            'graduate.required' => 'graduate tidak boleh kosong',
        ];
    }
}
