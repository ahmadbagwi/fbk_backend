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
      $this->cek_admin();
      $data = Administrasi::leftJoin('users', 'users.id', '=', 'administrasi.user_id')->select('users.name', 'administrasi.*')->get();
      return Inertia::render('Admin/Administrasi', [
        'data' => $data
      ]);
    }

    public function show_admin($id)
    {
      $this->cek_admin();

      $data = leftJoin('users', 'users.id', '=', 'administrasi.user_id')->select('users.name', 'administrasi.*')->where('id',intval($id))->first();
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
            'user_id' => Auth::user()->id
          ],
          [
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
          return redirect()->route('administrasi_show')->with('status', 'Sukses menyimpan data Administrasi');
        } else {
          // return redirect()->route('dashboard')->with('status', 'Gagal menyimpan biodata akun FBK');
          Session::flash('status', 'Gagal menyimpan data'); 
          return Session::get('status');
        }
    }

    public function show()
    {
      $data = Administrasi::leftJoin('users', 'users.id', '=', 'administrasi.user_id')->select('users.name', 'administrasi.*')->where('user_id', Auth::user()->id)->first();

      return Inertia::render('Show/Administrasi', [
          'data' => $data
      ]);
    }

    public function delete(Request $request)
    {
      $this->cek_admin();

      $id = $request->deleteId;
      if ($id) {
        $administrasi = Administrasi::find($id);
        $administrasi->delete();
        return redirect()->route('admin_administrasi')->with('status', 'Sukses hapus data');
      } else {
        return abort(404);
      }

    }
}
