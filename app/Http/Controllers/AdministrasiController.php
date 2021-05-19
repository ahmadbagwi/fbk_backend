<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\AdministrasiRequest;
use App\Models\Administrasi;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;

class AdministrasiController extends Controller
{
    public function cek_admin()
    {
      if (Auth::user()->role !== 'superadmin') {
        return abort(401);
      }
    }

    public function index()
    {
      $data = Administrasi::
          join('users', 'users.id', '=', 'administrasi.user_id')
          ->whereNotNull('administrasi.user_id')
          ->select('users.name', 'administrasi.*')
          ->get();
          
      return response()->json([
        'data' => $data
      ]);
    }

    public function show_admin($id)
    {
      $this->cek_admin();

      $data = Administrasi::leftJoin('users', 'users.id', '=', 'administrasi.user_id')->select('users.name', 'administrasi.*')->where('administrasi.id',intval($id))->first();
      return Inertia::render('Admin/AdministrasiShow', [
        'data' => $data
      ]);
    }

    public function verifikasi(Request $request)
    {
      $this->cek_admin();

      $id = $request->id;
      $status = $request->status;
      $catatan = $request->catatan;
      $pemeriksa = $request->pemeriksa;

      $update = Administrasi::where('id',intval($id))->update(['status' => $status, 'catatan' => $catatan, 'pemeriksa' => $pemeriksa]);
      return redirect('admin/administrasi/show/'.$id)->with('status', 'Sukses memperbarui administrasi ');
      
    }

    public function create()
    {
      $data = Administrasi::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Administrasi', [
        'data' => $data
      ]);
    }

    public function store(AdministrasiRequest $request)
    {
        $validated = $request->validated();

        $administrasi = Administrasi::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'user_id' => Auth::user()->id,
            'permohonan' => $request->permohonan,
            'proposal' => $request->proposal, 
            'pertanggungjawaban' => $request->pertanggungjawaban, 
            'kesanggupan' => $request->kesanggupan, 
            'rekening' => $request->rekening, 
            'npwp' => $request->npwp,
            'ktp' => $request->ktp,  
            'kk' => $request->kk, 
            'integritas' => $request->integritas, 
            'riwayat' => $request->riwayat, 
            'politik' => $request->politik, 
            'domisili' => $request->domisili, 
            'komunitas' => $request->komunitas, 
            'kesekretariatan' => $request->kesekretariatan, 
            'prestasi' => $request->prestasi, 
            'akta' => $request->akta
          ]);

        if ($administrasi) {
          return response()->json('Sukses menyimpan data Administrasi');
        } else {
          return response()->json('Gagal menyimpan data Administrasi');
        }
    }

    public function show()
    {
      $data = Administrasi::leftJoin('users', 'users.id', '=', 'administrasi.user_id')->select('users.name', 'administrasi.*')->where('user_id', Auth::user()->id)->first();

      return response()->json([
          'data' => $data
      ]);
    }

    public function delete($id)
    {
      $administrasi = Administrasi::find($id);
      if ($administrasi->delete()) { 
        return response()->json('Sukses menghapus data');
      } else {
        return response()->json('Gagal menghapus data');
      }
    }
}
