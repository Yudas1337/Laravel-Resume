<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'header'        => 'required',
            'subheader'     => 'required',
            'sidebardesc'   => 'required',
            'headerdesc'    => 'required',
            'skilldesc'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'header.required'       => 'Header tidak boleh kosong',
            'subheader.required'    => 'Sub Header tidak boleh kosong',
            'sidebardesc.required'  => 'Sidebar Description tidak boleh kosong',
            'headerdesc.required'   => 'Header Description tidak boleh kosong',
            'skilldesc.required'    => 'Skill Description tidak boleh kosong'
        ];
    }
}
