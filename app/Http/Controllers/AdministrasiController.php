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
    public function index()
    {
      // superadmin
    }

    public function detail()
    {
      // superadmin
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
      $status = Administrasi::where('user_id', Auth::user()->id)->value('status');
      $data = Administrasi::where('user_id', Auth::user()->id)->latest('id')->first();

      return Inertia::render('Show/Administrasi', [
          'status' => $status,
          'data' => $data
      ]);
    }

    public function delete()
    {
      // superadmin
    }
}
