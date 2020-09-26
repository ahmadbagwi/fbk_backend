<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\LaporanRequest;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;

class LaporanController extends Controller
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
      $data = Laporan::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Laporan', [
          'data' => $data
      ]);
    }

    public function edit()
    {
      $data = Laporan::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Laporan', [
          'data' => $data
      ]);
    }

    public function store(LaporanRequest $request)
    {
        $validated = $request->validated();

        $laporan = Laporan::updateOrCreate(
          [
            'user_id' => Auth::user()->id
          ],
          [
            'terima' => $request->terima,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'laporan80' => $request->laporan80,
            'laporan20' => $request->laporan20,
          ]);

        if ($laporan) {
          return redirect()->route('laporan_show')->with('status', 'Sukses menyimpan laporan FBK');
        } else {
          // return redirect()->route('dashboard')->with('status', 'Gagal menyimpan biodata akun FBK');
          Session::flash('status', 'Gagal menyimpan data'); 
          return Session::get('status');
        }
    }

    public function show()
    {
      $data = Laporan::where('user_id', Auth::user()->id)->get();
      $role = auth()->user()->role;
      return Inertia::render('Show/Laporan', [
          'data' => $data,
          'role' => $role
      ]);
    }

    public function delete()
    {
      // superadmin
    }
}
