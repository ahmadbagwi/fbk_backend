<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'email';
    protected $fillable = [
      'user_id',
      'tanggal',
      'keterangan',
      'status'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }
}
