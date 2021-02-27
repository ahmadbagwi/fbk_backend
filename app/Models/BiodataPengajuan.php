<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiodataPengajuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'biodata_pengajuan';
    protected $fillable = [
        'user_id',
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
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
