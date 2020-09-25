<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodata extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'akun';
    protected $fillable = ['kategori', 'user_id', 'nama_pengusul', 'nama_penananggungjawab', 'ktp', 'kemenkumham', 'akta', 'npwp', 'alamat', 'provinsi', 'kota', 'telp', 'email' ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
