<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrasiLengkap;
use App\Models\BiodataPengajuan;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;
use App\Exports\AdministrasiLengkapExport;
use Maatwebsite\Excel\Facades\Excel;

class AdministrasiLengkapController extends Controller
{
    public function index()
    {
      $data = AdministrasiLengkap::
	        join('users', 'users.id', '=', 'administrasi_lengkap.user_id')
	        ->join('biodata_pengajuan', 'biodata_pengajuan.id', '=', 'administrasi_lengkap.biodata_pengajuan_id')
	        ->whereNotNull('administrasi_lengkap.user_id')
	        ->select('users.name', 'biodata_pengajuan.id as pengajuan_id', 'administrasi_lengkap.*')
	        ->get();
          
      return response()->json([
        'data' => $data
      ]);
    }

    public function show()
    {
      $data = AdministrasiLengkap::
	        join('users', 'users.id', '=', 'administrasi_lengkap.user_id')
	        ->join('biodata_pengajuan', 'biodata_pengajuan.id', '=', 'administrasi_lengkap.biodata_pengajuan_id')
	        ->where('administrasi_lengkap.user_id', auth()->user()->id)
	        ->select('users.name', 'biodata_pengajuan.id as pengajuan_id', 'biodata_pengajuan.kategori_kegiatan', 'biodata_pengajuan.kategori_pengusul', 'administrasi_lengkap.*')
	        ->first();
          
      return response()->json([
        'data' => $data
      ]);
    }

    public function store(Request $request)
    {
    	$pengajuan_id = BiodataPengajuan::where('user_id', auth()->user()->id)->first()->id;
        $administrasi_lengkap = AdministrasiLengkap::updateOrCreate(
		    [
		    	'id' => $request->id
		    ],
		    [
		        'user_id' => auth()->user()->id,
		        'biodata_pengajuan_id' => $pengajuan_id,
		        'pengajuan' => $request->pengajuan,
		        'riwayat' => $request->riwayat,
		        'pertanggungjawaban' => $request->pertanggungjawaban,
		        'kesanggupan' => $request->kesanggupan,
		        'integritas' => $request->integritas,
		        'politik' => $request->politik,
		        'domisili' => $request->domisili,
		        'rekening' => $request->rekening,
		        'npwp' => $request->npwp,
		        'ktp' => $request->ktp,
		        'kk' => $request->kk,
		        'rab' => $request->rab,
		        'proposal' => $request->proposal,
		        'sertifikat' => $request->sertifikat, 
		        'rekomendasi' => $request->rekomendasi, 
		        'perjanjian' => $request->perjanjian, 
		        'profil' => $request->profil,
		        'konflik' => $request->konflik,
		        'keberadaan' => $request->keberadaan,
		        'foto_sekretariat' => $request->foto_sekretariat,
		    	'foto_kegiatan' => $request->foto_kegiatan,
		    	'akta' => $request->akta,
		    	'pengesahan' => $request->pengesahan,
		    	'status' => $request->status
		    ]);

        if ($administrasi_lengkap) {
          	return response()->json('Sukses menyimpan data Administrasi');
        } else {
          	return response()->json('Gagal menyimpan data Administrasi');
        }
    }

    public function upload(Request $request)
    {
        $file = $request->file;
        $file_ori_name = $file->getClientOriginalName();
        $file_path = realpath($file);
        $file_name = explode('.',$file_ori_name)[0];
        $file_extension = $file->getClientOriginalExtension();
        $file_slug = Str::slug($file_name, '_').".".$file_extension;

        if ($file_extension == 'xls' || $file_extension == 'xlsx' || $file_extension == 'doc' || $file_extension == 'docx' || $file_extension == 'pdf' || $file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'zip' || $file_extension == 'rar') {
            $name = auth()->user()->name;
            $name_slug = Str::slug($name, '_');
            $role = auth()->user()->role;
            $path = '';
            if($role == "superadmin"){
              $path =  'storage/files/superadmin';
            }else{
              $path =  'storage/files/superadmin/'.$name_slug;
            }
            if ($file->move($path, $file_slug)) {
                $url = $path.'/'.$file_slug;
                return response()->json($url);
            }
        } else {
            return response()->json('Jenis file tidak diizinkan, pastikan file anda xls, xlsx, doc, docx, pdf, jpg, jpeg, png, zip, rar');
        }

    }

    public function status_formulir()
    {
    	$data = Pengaturan::where('nama', 'status formulir')->where('status', 'aktif')->select('nama', 'status', 'nilai')->first();
    	return response()->json([
    		'data' => $data
    	]);
    }

    public function export_excel ()
    {
        return Excel::download(new AdministrasiLengkapExport, 'data_administrasi_fbk.xlsx');
    }

    public function destroy($id)
    {
    	$administrasi_lengkap = AdministrasiLengkap::find($id);
    	if ($administrasi_lengkap->delete()) {
    		return response()->json('Sukses menghapus data Administrasi');
    	} else {
    		return response()->json('Gagal menghapus data Administrasi');
    	}
    }
}
