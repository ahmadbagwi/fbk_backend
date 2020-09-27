<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\BiodataRequest;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class BiodataController extends Controller
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
      $data = Biodata::all();
      return Inertia::render('Admin/Biodata', [
        'data' => $data
      ]);
    }

    public function detail()
    {
      // superadmin
    }

    public function create()
    {
      $data = Biodata::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Biodata', [
          'data' => $data
      ]);
    }

    public function store(BiodataRequest $request)
    {
        $validated = $request->validated();

        $biodata = Biodata::updateOrCreate(
          [
            'user_id' => Auth::user()->id
          ],
          [
            'kategori' => $request->kategori,
            'nama_pengusul' => $request->nama_pengusul,
            'nama_penananggungjawab' => $request->nama_penananggungjawab,
            'ktp' => $request->ktp,
            'kemenkumham' => $request->kemenkumham,
            'akta' => $request->akta,
            'npwp' => $request->npwp,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'email' => $request->email
          ]);

        if ($biodata) {
          return redirect()->route('biodata_show')->with('status', 'Sukses menyimpan biodata akun FBK');
        } else {
          // return redirect()->route('dashboard')->with('status', 'Gagal menyimpan biodata akun FBK');
          Session::flash('status', 'Gagal menyimpan data'); 
          return Session::get('status');
        }
    }

    public function show()
    {
      $status = Biodata::where('user_id', Auth::user()->id)->value('status');
      $data = Biodata::where('user_id', Auth::user()->id)->latest('id')->first();

      return Inertia::render('Show/Biodata', [
          'status' => $status,
          'data' => $data
      ]);
    }

    public function delete(Request $request)
    {
      $this->cek_admin();

      $id = $request->deleteId;
      if ($id) {
        $biodata = Biodata::find($id);
        $biodata->delete();
        return redirect()->route('admin_biodata')->with('status', 'Sukses hapus data');
      } else {
        return abort(404);
      }

    }
}
