<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\PengajuanRequest;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;

class PengajuanController extends Controller
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
      $data = Pengajuan::all();
      return Inertia::render('Admin/Pengajuan', [
        'data' => $data
      ]);
    }

    public function show_admin($id)
    {
      $this->cek_admin();

      $data = Pengajuan::where('id', intval($id))->first();
      return Inertia::render('Admin/PengajuanShow', [
        'data' => $data
      ]);
      // return var_dump(intval($id));
    }

    public function create()
    {
      $data = Pengajuan::where('user_id', Auth::user()->id)->latest('id')->first();
      return Inertia::render('Form/Pengajuan', [
        'data' => $data
      ]);
    }

    public function store(PengajuanRequest $request)
    {
        $validated = $request->validated();

        $pengajuan = Pengajuan::updateOrCreate(
          [
            'user_id' => Auth::user()->id
          ],
          [
            'jenis' => $request->jenis,
            'judul' => $request->judul,
            'konsep' => $request->konsep,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'tahap1' => $request->tahap1,
            'tahap2' => $request->tahap2,
            'biaya' => $request->biaya,
            'rab' => $request->rab,
            'video' => $request->video
          ]);

        if ($pengajuan) {
          return redirect()->route('pengajuan_show')->with('status', 'Sukses menyimpan data pengajuan');
        } else {
          // return redirect()->route('dashboard')->with('status', 'Gagal menyimpan biodata akun FBK');
          Session::flash('status', 'Gagal menyimpan data'); 
          return Session::get('status');
        }
    }

    public function show()
    {
      $status = Pengajuan::where('user_id', Auth::user()->id)->value('status');
      $data = Pengajuan::where('user_id', Auth::user()->id)->latest('id')->first();

      return Inertia::render('Show/Pengajuan', [
          'status' => $status,
          'data' => $data
      ]);
    }

    public function upload(Request $request)
    {
      // upload API url for vue-wysiwyg

      $file = $request->file;
      $file_ori_name = $file->getClientOriginalName();
      $file_path = realpath($file);
      $file_name = explode('.',$file_ori_name)[0];
      $file_extension = $file->getClientOriginalExtension();
      $file_slug = Str::slug($file_name, '_').".".$file_extension;

      $upload_dir = public_path('storage/files/').Auth::user()->id;

      if ($file->move($upload_dir, $file_slug)) {
        $url = URL::to('/storage/files/'.Auth::user()->id.'/'.$file_slug);
        return response()->json($url);
      }
    }  
    public function delete()
    {
      // superadmin
    }
}
