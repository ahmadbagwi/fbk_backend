<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use File;

class BlogController extends Controller
{
    public function index()
    {
      $data = Blog::where('kategori', 'blog')->orWhere('kategori', 'komite')->orderBy('updated_at', 'desc')->get();
      return Inertia::render('Admin/Blog', [
        'data' => $data
      ]);
    }

    public function faq()
    {
      $data = Blog::orderBy('updated_at', 'desc')->where('kategori', 'faq')->get();
      return Inertia::render('Admin/FAQ', [
        'data' => $data
      ]);
    }

    public function show ($slug)
    {
        $data = Blog::where('slug', $slug)->first();
        $blogAcak = Blog::where('kategori', 'blog')->get()->random(3);
        return response()->json([
          'data' => $data,
          'blogAcak' => $blogAcak
      ]);
    }

    public function arsip ($slug)
    {
        // $slug_kategori = ucwords($slug);
        $data = Blog::where('kategori', 'like', $slug . '%')->orderBy('updated_at', 'desc')->get();
        if ($slug == 'komite') {
          return response()->json([
            'data' => $data
          ]);
        } else {
          return response()->json([
            'data' => $data
          ]);
        }
        
    }

    public function create($id = null)
    {
      $data = $id ? Blog::where('id', $id)->first() : null;

      return Inertia::render('Form/Blog', [
        'data' => $data
      ]);
    }

    public function create_faq($id = null)
    {
      $data = $id ? Blog::where('id', $id)->first() : null;
      return Inertia::render('Form/FAQ', [
        'data' => $data
      ]);
    }

    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $slug = $request->slug ?? Str::slug($request->judul, '-').'_'.rand();
        // $slug = Str::slug($request->judul, '-').'_'.rand();
        $blog = Blog::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'user_id' => auth()->user()->id,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'slug' => $slug,
            'kategori' => $request->kategori,
            'meta' => $request->meta,
            'kata_kunci' => $request->kata_kunci,
            'featured' => $request->featured,
            'konten' => $request->konten,
            'status' => $request->status
          ]);

        if ($blog) {
          return redirect()->route('admin_blog')->with('status', 'Sukses menyimpan ' . $request->judul);
        } 
    }

    public function store_faq(Request $request)
    {
        $slug = $request->slug ?? Str::slug($request->judul, '-').'_'.rand();
        $faq = Blog::updateOrCreate(
          [
            'id' => $request->id
          ],
          [
            'user_id' => auth()->user()->id,
            'tanggal' => date('Y-m-d'),
            'judul' => $request->judul,
            'slug' => $slug,
            'kategori' => 'faq',
            'meta' => $request->judul,
            'kata_kunci' => $request->judul,
            'featured' => '',
            'konten' => $request->konten,
            'status' => 'aktif'
          ]);

        if ($faq) {
          return redirect()->route('admin_faq')->with('status', 'Sukses menyimpan ' . $request->judul);
        } 
    }

    public function destroy(Request $request)
    {
      $id = $request->id;
      $blog = Blog::find($id);
      $blog->delete();
      return redirect()->route('admin_blog')->with('status', 'Sukses hapus data');
    }

    public function upload(Request $request)
    {

      $file = $request->file;
      $file_ori_name = $file->getClientOriginalName();
      $file_path = realpath($file);
      $file_name = explode('.',$file_ori_name)[0];
      $file_extension = $file->getClientOriginalExtension();
      $file_slug = Str::slug($file_name, '_').".".$file_extension;

      $upload_dir = public_path('storage/files/').Auth::user()->id;

      if ($file->move($upload_dir, $file_slug)) {
        $url = URL::to('/storage/files/superadmin/'.$file_slug);
        return response()->json($url);
      }
    }  

}
