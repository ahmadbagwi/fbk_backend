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
      $data = Biodata::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Biodata', [
          'data' => $data
      ]);
    }

    public function store(BiodataRequest $request)
    {
        $validated = $request->validated();

        // $validatedData = $request->validate([
        //     'kategori' => 'required',
        //     'nama_pengusul' => 'required|max:200',
        //     'nama_penananggungjawab' => 'required|max:200',
        //     'ktp' => 'required|max:300',
        //     'kemenkumham' => 'required|max:300',
        //     'akta' => 'required|max:300',
        //     'npwp' => 'required|max:300',
        //     'alamat' => 'required|max:300',
        //     'provinsi' => 'required|max:300',
        //     'kota' => 'required|max:300',
        //     'telp' => 'required|max:15',
        //     'email' => 'required|email|max:100'
        // ]);

        // if ($validatedData) {
        //   return response()->json('validasi');
          // return Session::flash('validasi', 'Sukses Validasi'); 
          // return Session::get('status');
        // } else {
        //   return response()->json('gagal validasi');
          //return Session::flash('validasi', 'Gagal Validasi'); 
          // return Session::get('status');
        // }

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

    public function delete()
    {
      // superadmin
    }
}
