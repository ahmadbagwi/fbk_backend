<?php

namespace App\Exports;

use App\Models\AdministrasiLengkap;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdministrasiLengkapExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AdministrasiLengkap::
            join('users', 'users.id', '=', 'administrasi_lengkap.user_id')
            ->join('biodata_pengajuan', 'biodata_pengajuan.id', '=', 'administrasi_lengkap.biodata_pengajuan_id')
            ->whereNotNull('administrasi_lengkap.user_id')
            ->select('users.name as nama_akun', 'biodata_pengajuan.nama_pengusul', 'biodata_pengajuan.id as proposal_id', 'biodata_pengajuan.kategori_kegiatan', 'biodata_pengajuan.kategori_pengusul', 'administrasi_lengkap.*')
            ->get();
    }
}
