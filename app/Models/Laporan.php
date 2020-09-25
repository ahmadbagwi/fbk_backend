<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laporan';
    protected $fillable = ['user_id', 'terima', 'mulai', 'selesai', 'laporan80', 'laporan20'];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
