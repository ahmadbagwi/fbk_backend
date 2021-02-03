<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'hp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email  harus diisi',
            'password.required' => 'Password  harus diisi dan dikonfirmasi',
            'hp.required' => 'Hp harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'kota.required' => 'Kota harus diisi',
            'alamat.required' => 'Alamat harus diisi'
        ];
    }
}
