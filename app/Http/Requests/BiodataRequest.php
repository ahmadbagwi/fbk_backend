<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
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
            'nama_pengusul' => 'required|max:200',
            'nama_penananggungjawab' => 'required|max:200',
            'ktp' => 'required|max:300',
            'kemenkumham' => 'required|max:300',
            'akta' => 'required|max:300',
            'npwp' => 'required|max:300',
            'alamat' => 'required|max:300',
            'provinsi' => 'required|max:300',
            'kota' => 'required|max:300',
            'telp' => 'required|max:15',
            'email' => 'required|email|max:100'
        ];
    }

    public function messages()
    {
        return [
            'kategori.required' => 'Kategori harus dipilih',
            'nama_pengusul.required' => 'Nama pengusul harus diisi maksimal 200 karakter',
            'nama_penananggungjawab.required' => 'Nama penananggungjawab harus diisi maksimal 200 karakter',
            'ktp.required' => 'File KTP harus dipilih/diunggah',
            'kemenkumham.required' => 'File SK Kemenkumham harus dipilih/diunggah',
            'akta.required' => 'File Akta harus dipilih/diunggah',
            'npwp.required' => 'NPWP',
            'alamat.required' => 'Alamat harus diisi maksimal 300 karakter',
            'provinsi.required' => 'Provinsi harus diisi maksimal 300 karakter',
            'kota.required' => 'Kota harus diisi maksimal 300 karakter',
            'telp.required' => 'Telp harus diisi maksimal 15 karakter',
            'email.required' => 'Email harus diisi maksimal 100 karakter'
        ];
    }
}
