<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profil';
    protected $fillable = [
        'user_id',
        'kategori',
        'foto',
        'nama_project',
        'waktu',
        'nominal_diajukan',
        'nominal_disetujui',
        'deskripsi',
        'kata_kunci',
        'foto_penerima',
        'nama_penerima',
        'profil_penerima',
        'kontak',
        'media_sosial'
        ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
