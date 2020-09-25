<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Administrasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'administrasi';
    protected $fillable = ['user_id', 'permohonan', 'proposal', 'pertanggungjawaban', 'kesanggupan', 'rekening', 'npwp', 'ktp', 'kk', 'integritas', 'riwayat', 'politik', 'domisili', 'komunitas', 'kesekretariatan', 'prestasi', 'akta'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
