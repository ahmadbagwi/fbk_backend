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
use Image;

class BlogController extends Controller
{
    public function blog()
    {
      $data = Blog::with('user')->where('kategori', 'blog')->orWhere('kategori', 'komite')->orderBy('updated_at', 'desc')->get();
      return response()->json([
        'data' => $data
      ]);
    }

    public function faq()
    {
      $data = Blog::orderBy('updated_at', 'desc')->where('kategori', 'faq')->get();
      return response()->json([
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
        return response()->json([
            'data' => $data
        ]);
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

    public function blog_post(BlogRequest $request)
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
          return response()->json('Sukses menyimpan ' . $request->judul);
        } 
    }

    public function faq_post(Request $request)
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
          return response()->json('Sukses menyimpan ' . $request->judul);
        } 
    }

    public function destroy($id)
    {
      $blog = Blog::find($id);
      $blog->delete();
      return response()->json('Sukses hapus data');
    }

    public function upload(Request $request)
    {
        $name = auth()->user()->name;
        $name_slug = Str::slug($name, '_');
        $role = auth()->user()->role;
        $path = '';
        if($role == "superadmin"){
          $path =  'storage/files/superadmin';
        }else{
          $path =  'storage/files/superadmin/'.$name_slug;
        }
        $file = $request->file;
        $file_ori_name = $file->getClientOriginalName();
        $file_path = realpath($file);
        $file_name = explode('.',$file_ori_name)[0];
        $file_extension = $file->getClientOriginalExtension();
        $file_slug = Str::slug($file_name, '_').".".$file_extension;

        // resize https://www.itsolutionstuff.com/post/laravel-compress-image-before-upload-exampleexample.html
        $img = Image::make($file->getRealPath());
        $img->resize(1000, 476, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path.'/'.$file_slug);

        // if ($file->move($path, $file_slug)) {
        //     $url = URL::to($path.'/'.$file_slug);
        //     return response()->json($url);
        // }

        if ($img) {
            $url = URL::to($path.'/'.$file_slug);
            return response()->json($url);
        }
    }  

}
