<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanRequest extends FormRequest
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
            'jenis' => 'required',
            'judul' => 'required|max:200',
            'konsep' => 'required|max:3000',
            'mulai' => 'required|max:50',
            'selesai' => 'required|max:50',
            'tahap1' => 'required|max:3000',
            'tahap2' => 'required|max:3000',
            'biaya' => 'required|max:20',
            'rab' => 'required|max:200'
        ];
    }
}
