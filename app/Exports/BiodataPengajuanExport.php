<?php

namespace App\Exports;

use App\Models\BiodataPengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiodataPengajuanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BiodataPengajuan::select(
        'user_id',
        'id',
        'kategori_pengusul',
        'nama_pengusul',
        'telp',
        'email',
        'alamat',
        'kota',
        'provinsi',
        'kategori_kegiatan',
        'judul_kegiatan',
        'deskripsi_kegiatan',
        'durasi_pelaksanaan',
        'hasil_kegiatan',
        'penerima_manfaat',
        'biaya_diajukan',
        'pertanyaan',
        'rab',
        'status'
        )->get();
    }
}
