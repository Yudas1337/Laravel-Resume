<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'      => 'required',
            'linkedin'  => 'required',
            'gmail'     => 'required',
            'telegram'  => 'required',
            'github'    => 'required',
            'whatsapp'  => 'required',
            'instagram' => 'required',
            'facebook'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Nama tidak boleh kosong',
            'linkedin.required' => 'Linkedin tidak boleh kosong',
            'gmail.required'    => 'Gmail tidak boleh kosong',
            'telegram.required' => 'Telegram tidak boleh kosong',
            'github.required'   => 'Github tidak boleh kosong',
            'whatsapp.required' => 'Whatsapp tidak boleh kosong',
            'instagram.required' => 'Instagram tidak boleh kosong',
            'facebook.required' => 'Facebook tidak boleh kosong'
        ];
    }
}
