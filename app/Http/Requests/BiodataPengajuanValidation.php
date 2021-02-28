<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiodataPengajuanValidation extends FormRequest
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
            // 'user_id' => 'required',
            'kategori_pengusul' => 'required',
            'nama_pengusul' => 'required|max:250',
            'telp' => 'required',
            'email' => 'required|email',
            'alamat' => 'required|max:250',
            'kota' => 'required|max:250',
            'provinsi' => 'required|max:250',
            'kategori_kegiatan' => 'required',
            'judul_kegiatan' => 'required|max:250',
            'deskripsi_kegiatan' => 'required',
            'durasi_pelaksanaan' => 'required',
            'hasil_kegiatan' => 'required',
            'penerima_manfaat' => 'required',
            'biaya_diajukan' => 'required',
            'pertanyaan' => 'required',
            'rab' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kategori_pengusul.required' => 'Kategori pengusul harus dipilih',
            'nama_pengusul.required' => 'Nama pengusul harus diisi',
            'telp.required' => 'Telp harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email harus benar',
            'alamat.required' => 'Alamat harus diisi',
            'kota.required' => 'Kota/Kabupaten harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'kategori_kegiatan.required' => 'Kategori kegiatan harus dipilih',
            'judul_kegiatan.required' => 'Judul kegiatan harus diisi',
            'deskripsi_kegiatan.required' => 'Deskripsi kegiatan harus diisi',
            'durasi_pelaksanaan.required' => 'Durasi pelaksanaan harus diisi',
            'hasil_kegiatan.required' => 'Hasil kegiatan harus diisi',
            'penerima_manfaat.required' => 'Penerima manfaat harus diisi',
            'biaya_diajukan.required' => 'Biaya yang diajukan harus diisi',
            'pertanyaan.required' => 'Pertanyaan ini harus dijawab',
            'rab.required' => 'RAB harus diunggah',
            'judul_kegiatan.max' => 'Judul kegiatan maksimal 10 karakter'
        ];
    }
}
