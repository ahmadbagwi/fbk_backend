<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdministrasiLengkap extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'administrasi_lengkap';
    protected $fillable = [
    	'user_id',
    	'biodata_pengajuan_id',
    	'pengajuan',
    	'riwayat',
    	'pertanggungjawaban',
    	'kesanggupan',
    	'integritas',
    	'politik',
    	'domisili',
    	'rekening',
    	'npwp',
    	'ktp',
    	'kk',
    	'rab',
    	'proposal',
    	'sertifikat',
    	'rekomendasi',
    	'perjanjian',
    	'profil',
    	'konflik',
    	'keberadaan',
    	'foto_sekretariat',
    	'foto_kegiatan',
    	'akta',
    	'pengesahan',
        'status'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function biodata_pengajuan()
    {
      return $this->belongsTo('App\Models\BiodataPengajuan');
    }
}
