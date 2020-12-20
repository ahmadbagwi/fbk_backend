<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'tanggal' => 'required',
            'judul' => 'required|max:200',
            'kategori' => 'required|max:100',
            'meta' => 'required|max:200',
            'kata_kunci' => 'required|max:100',
            'featured' => 'required|max:200',
            'konten' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi',
            'judul.required' => 'Judul harus diisi maksimal 200 karakter',
            'kategori.required' => 'Kategori diisi maksimal 100 karakter',
            'meta.required' => 'Meta harus diisi maksimal 200 karakter',
            'kata_kunci.required' => 'Kata kunci harus diisi maksimal 100 karakter',
            'featured.required' => 'Foto utama haris diupload',
            'konten.required' => 'Konten harus diisi',
            'status.required' => 'Status harus dipilih',
        ];
    }
}
