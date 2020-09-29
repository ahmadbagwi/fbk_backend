<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\PengajuanRequest;
use App\Models\Pengajuan;
use App\Models\Biodata;
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
      $data = Pengajuan::leftJoin('users', 'users.id', '=', 'pengajuan.user_id')->select('users.name', 'pengajuan.*')->get();
      return Inertia::render('Admin/Pengajuan', [
        'data' => $data
      ]);
    }

    public function show_admin($id)
    {
      $this->cek_admin();

      $data = Pengajuan::leftJoin('users', 'users.id', '=', 'pengajuan.user_id')->where('pengajuan.id', $id)->select('users.name', 'pengajuan.*')->first();
      return Inertia::render('Admin/PengajuanShow', [
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
      $update = Pengajuan::where('id',intval($id))->update(['status' => $status, 'catatan' => $catatan, 'pemeriksa' => $pemeriksa]);
      return redirect('admin/pengajuan/show/'.$id)->with('status', 'Sukses memperbarui pengajuan ');
      
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
          // return redirect()->route('dashboard')->with('status', 'Gagal menyimpan akun akun FBK');
          Session::flash('status', 'Gagal menyimpan data'); 
          return Session::get('status');
        }
    }

    public function show()
    {
      $data = Pengajuan::leftJoin('users', 'users.id', '=', 'pengajuan.user_id')->where('user_id', Auth::user()->id)->select('users.name', 'pengajuan.*')->first();

      return Inertia::render('Show/Pengajuan', [
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
    public function delete(Request $request)
    {
      $this->cek_admin();

      $id = $request->deleteId;
      if ($id) {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        return redirect()->route('admin_pengajuan')->with('status', 'Sukses hapus data');
      } else {
        return abort(404);
      }

    }
}
