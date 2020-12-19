<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
            'kategori' => 'required',
            'foto' => 'required',
            'nama_project' => 'required',
            'waktu' => 'required',
            'nominal_diajukan' => 'required',
            'nominal_disetujui' => 'required',
            'deskripsi' => 'required',
            'kata_kunci' => 'required',
            'foto_penerima' => 'required',
            'nama_penerima' => 'required',
            'profil_penerima' => 'required',
            'kontak' => 'required',
            'media_sosial' => 'required',
        ];
    }

    public function messages()
    {
        
    }
}
