<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengajuan';
    protected $fillable = ['user_id', 'jenis', 'judul', 'konsep', 'mulai', 'selesai', 'tahap1', 'tahap2', 'biaya', 'rab', 'video'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
