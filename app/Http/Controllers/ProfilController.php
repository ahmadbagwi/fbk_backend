<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use App\Models\Profil;
use Inertia\Inertia;
use DB;
use Excel;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;
use App\User;
use Illuminate\Http\UploadedFile;

class ProfilController extends Controller
{
    public function profil_penerima()
    {
        $data = Profil::with('user')->orderBy('updated_at', 'desc')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function show ($id)
    {
        $data = Profil::where('id', $id)->first();
        $penerimaAcak = Profil::all()->random(3);
        return response()->json([
          'data' => $data,
          'penerimaAcak' => $penerimaAcak,
      ]);
    }

    public function profil_penerima_show ($id)
    {
        $data = Profil::where('id', $id)->first();
        return response()->json([
          'data' => $data
      ]);
    }

    public function arsip ($slug)
    {
        $slug_kategori = ucwords($slug);
        $data = Profil::where('kategori', 'like', $slug . '%')->orderBy('updated_at', 'desc')->get();
        return response()->json([
          'data' => $data
      ]);
    }

    public function create($id = null)
    {
      $data = $id ? Profil::where('id', $id)->first() : null;

      return Inertia::render('Form/Profil', [
        'data' => $data
      ]);
    }

    public function profil_penerima_post(Request $request)
    {
        // $validated = $request->validated();
        $media_sosial = $request->akun_facebook.','.$request->url_facebook.','.$request->akun_twitter.','.$request->url_twitter.','.$request->akun_instagram.','.$request->url_instagram.','.$request->url_youtube.','.$request->url_karya;
        $profil = Profil::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'user_id' => auth()->user()->id,
            'kategori' => $request->kategori,
            'foto' => $request->foto,
            'nama_project' => $request->nama_project,
            'waktu' => $request->waktu,
            'nominal_diajukan' => $request->nominal_diajukan,
            'nominal_disetujui' => $request->nominal_disetujui,
            'deskripsi' => $request->deskripsi,
            'kata_kunci' => $request->kata_kunci,
            'foto_penerima' => $request->foto_penerima,
            'nama_penerima' => $request->nama_penerima,
            'profil_penerima' => $request->profil_penerima,
            'kontak' => $request->kontak,
            'media_sosial' => $media_sosial,
          ]);

        if ($profil) {
          return response()->json('Sukses menyimpan data profil');
        }
    }

    public function importExcel (Request $request)
    {
      if ($request->file('importFile')->isValid()) {
        // dd($request->file('importFile'));
        $collection = (new FastExcel)->import($request->file('importFile'));

        $profil = (new FastExcel)->import($request->file('importFile'), function ($row) {
          return Profil::create([
            'user_id' => 1,
            'kategori' => $row['kategori'],
            'foto' => $row['foto'],
            'nama_project' => $row['nama_project'],
            'waktu' => $row['waktu'],
            'nominal_diajukan' => $row['nominal_diajukan'],
            'nominal_disetujui' => $row['nominal_disetujui'],
            'deskripsi' => $row['deskripsi'],
            'kata_kunci' => $row['kata_kunci'],
            'foto_penerima' => $row['foto_penerima'],
            'nama_penerima' => $row['nama_penerima'],
            'profil_penerima' => $row['profil_penerima'],
            'kontak' => $row['kontak'],
            'media_sosial' => $row['media_sosial'],
          ]);
        });
      }
        // $file = $request->file('file');
        // $file_ori_name = $file->getClientOriginalName();
        // $file_path = realpath($file);  // $file->getPath();
        // $file_name = explode('.',$file_ori_name)[0];
        // $file_extension = $file->getClientOriginalExtension();
        // $file_slug = Str::slug($file_name, '_').".".$file_extension;

        
    }

    public function cari(Request $request)
    {
      $kata_kunci = $request->kata_kunci;
      $cari_profil = Profil::where('nama_project', 'like', '%' . $kata_kunci . '%')->orWhere('nama_penerima', 'like', '%' . $kata_kunci . '%')->get();
      return response()->json([
        'data' => $cari_profil,
        'kata_kunci' => $kata_kunci
      ]);
    } 

    public function destroy($id)
    {
        $profil = Profil::find($id);
        $profil->delete();
        return response()->json('Sukses hapus data');
    }

    // function import(Request $request)
    // {
    //  $this->validate($request, [
    //   'file'  => 'required|mimes:xls,xlsx'
    //  ]);

    //  $path = $request->file('file')->getRealPath();

    //  $data = Excel::load($path)->get();

    //  if($data->count() > 0)
    //  {
    //   foreach($data->toArray() as $key => $value)
    //   {
    //    foreach($value as $row)
    //    {
    //     $insert_data[] = array(
    //       'user_id' => 1,
    //       'kategori' => $row['kategori'],
    //       'foto' => $row['foto'],
    //       'nama_project' => $row['nama_project'],
    //       'waktu' => $row['waktu'],
    //       'nominal_diajukan' => $row['nominal_diajukan'],
    //       'nominal_disetujui' => $row['nominal_disetujui'],
    //       'deskripsi' => $row['deskripsi'],
    //       'kata_kunci' => $row['kata_kunci'],
    //       'foto_penerima' => $row['foto_penerima'],
    //       'nama_penerima' => $row['nama_penerima'],
    //       'profil_penerima' => $row['profil_penerima'],
    //       'kontak' => $row['kontak'],
    //       'media_sosial' => $row['media_sosial'],
    //     );
    //    }
    //   }

    //   if(!empty($insert_data))
    //   {
    //    DB::table('profil')->insert($insert_data);
    //   }
    //  }
    //  return redirect()->route('admin_profil')->with('status', 'Sukses import data profil');
    // }
}
