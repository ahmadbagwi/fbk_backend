<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';
    protected $fillable = [
      'user_id',
      'tanggal',
      'judul',
      'slug',
      'kategori',
      'meta',
      'kata_kunci',
      'featured',
      'konten',
      'status'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
