<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pengaturan;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;

class PengaturanController extends Controller
{
    public function index()
    {
      $data = Pengaturan::all();
      return Inertia::render('Admin/Pengaturan', [
        'data' => $data
      ]);
    }

    public function index_slider()
    {
      $data = Pengaturan::where('nama', 'like', '%' . 'slider' . '%' )->get();
      return Inertia::render('Admin/Slider', [
        'data' => $data
      ]);
    }

    public function show ($slug)
    {
        $data = Pengaturan::where('slug', $slug)->first();
        $blogAcak = Pengaturan::where('kategori', 'blog')->get()->random(3);
        return Inertia::render('Show/Pengaturan', [
          'data' => $data,
          'blogAcak' => $blogAcak
      ]);
    }

    public function create_slider($id = null)
    {
      $data = $id ? Pengaturan::where('id', $id)->first() : null;

      return Inertia::render('Form/Slider', [
        'data' => $data
      ]);
    }

    public function store_slider(Request $request)
    {
        $nilai = $request->nilai;
        $slide = implode (", ", $nilai);

        $slider = Pengaturan::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'nama' => $request->nama,
            'output' => $request->output,
            'nilai' => $slide,
            'status' => $request->status
          ]);
      
        
        if ($slider) {
          return redirect()->route('admin_slider')->with('status', 'Sukses menyimpan slider');
        } 
    }

    public function destroy(Request $request)
    {
      $id = $request->id;
      $blog = Pengaturan::find($id);
      $blog->delete();
      return redirect()->route('admin_pengaturan')->with('status', 'Sukses hapus data');
    }

}
