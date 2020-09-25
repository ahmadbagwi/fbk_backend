<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdministrasiRequest extends FormRequest
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
          'permohonan' => 'required', 
          'proposal' => 'required', 
          'pertanggungjawaban' => 'required', 
          'kesanggupan' => 'required', 
          'rekening' => 'required', 
          'npwp' => 'required', 
          'ktp' => 'required',
          'kk' => 'required', 
          'integritas' => 'required', 
          'riwayat' => 'required', 
          'politik' => 'required', 
          'domisili' => 'required', 
          'komunitas' => 'required', 
          'kesekretariatan' => 'required', 
          'prestasi' => 'required', 
          'akta' => 'required'
        ];
    }
}
