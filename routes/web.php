<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PengaturanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia\Inertia::render('Landing', [
        'data' => [
          'penerima' => [
              'dokumentasi' => App\Models\Profil::where('kategori', 'like', 'Dokumentasi' . '%')->orderBy('updated_at', 'desc')->get(),
              'penciptaan' => App\Models\Profil::where('kategori', 'like', 'Penciptaan' . '%')->orderBy('updated_at', 'desc')->get(),
              'pendayagunaan' => App\Models\Profil::where('kategori', 'like', 'Pendayagunaan' . '%')->orderBy('updated_at', 'desc')->get(),
          ],
          'slider' => App\Models\Pengaturan::where('nama', 'slider')->where('status', 'terbit')->first(),
          'komite' => App\Models\Blog::where('kategori', 'komite')->get(),
          'blog' => App\Models\Blog::where('kategori', 'blog')->limit(3)->orderBy('created_at', 'desc')->get(),
          'faq' => App\Models\Blog::where('kategori', 'faq')->get()
        ]
    ]);
})->name('landing page');

Route::get('cari-data', [ProfilController::class, 'cari'])->name('cari');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', function() {
      if (auth()->user()->role =='user') {
        return Inertia\Inertia::render('Dashboard');
      } else if (auth()->user()->role == 'konten') {
        return Inertia\Inertia::render('KontenDashboard');
      } else { 
        return redirect('admin/dashboard');
      }
    })->name('dashboard');

    Route::get('admin/dashboard', function() {
      return Inertia\Inertia::render('AdminDashboard');
    })->name('admin_dashboard');
    
    Route::get('filemanager', function() {
      return Inertia\Inertia::render('FileManager');
    })->name('filemanager');

    Route::get('biodata/create', [BiodataController::class, 'create'])->name('biodata_create');
    Route::post('biodata/store', [BiodataController::class, 'store'])->name('biodata_store');
    Route::get('biodata/show', [BiodataController::class, 'show'])->name('biodata_show');

    Route::get('pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan_create');
    Route::post('pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan_store');
    Route::get('pengajuan/show', [PengajuanController::class, 'show'])->name('pengajuan_show');
    Route::post('upload', [PengajuanController::class, 'upload'])->name('upload');
    
    Route::get('administrasi/create', [AdministrasiController::class, 'create'])->name('administrasi_create');
    Route::post('administrasi/store', [AdministrasiController::class, 'store'])->name('administrasi_store');
    Route::get('administrasi/show', [AdministrasiController::class, 'show'])->name('administrasi_show');

    Route::get('laporan/create/{id}', [LaporanController::class, 'create'])->name('laporan_create');
    Route::get('laporan/edit', [LaporanController::class, 'edit'])->name('laporan_edit');
    Route::post('laporan/store', [LaporanController::class, 'store'])->name('laporan_store');
    Route::get('laporan/show', [LaporanController::class, 'show'])->name('laporan_show');

    Route::get('admin/biodata', [BiodataController::class, 'index'])->name('admin_biodata');
    Route::post('admin/biodata/delete', [BiodataController::class, 'delete'])->name('admin_biodata_delete');

    Route::get('admin/pengajuan', [PengajuanController::class, 'index'])->name('admin_pengajuan');
    Route::get('admin/pengajuan/show/{id}', [PengajuanController::class, 'show_admin'])->name('admin_pengajuan_show');
    Route::post('admin/pengajuan/verifikasi', [PengajuanController::class, 'verifikasi'])->name('admin_pengajuan_verifikasi');
    Route::post('admin/pengajuan/delete', [PengajuanController::class, 'delete'])->name('admin_pengajuan_delete');

    Route::get('admin/administrasi', [AdministrasiController::class, 'index'])->name('admin_administrasi');
    Route::get('admin/administrasi/show/{id}', [AdministrasiController::class, 'show_admin'])->name('admin_administrasi_show');
    Route::post('admin/administrasi/verifikasi', [AdministrasiController::class, 'verifikasi'])->name('admin_administrasi_verifikasi');
    Route::post('admin/administrasi/delete', [AdministrasiController::class, 'delete'])->name('admin_administrasi_delete');

    Route::get('admin/laporan', [LaporanController::class, 'index'])->name('admin_laporan');
    Route::post('admin/laporan/delete', [LaporanController::class, 'delete'])->name('admin_laporan_delete');

    Route::get('admin/user', [BiodataController::class, 'user'])->name('admin_user');
    Route::get('admin/user/create', [BiodataController::class, 'create_akun'])->name('admin_user_create_akun');
    Route::get('admin/user/show/{id}', [BiodataController::class, 'user_show'])->name('admin_user_show');
    Route::post('admin/user/update', [BiodataController::class, 'user_update'])->name('admin_user_update');
    Route::post('admin/user/delete', [BiodataController::class, 'user_delete'])->name('admin_user_delete');

    Route::get('admin/profil', [ProfilController::class, 'index'])->name('admin_profil');
    Route::get('admin/profil/create/{id}', [ProfilController::class, 'create'])->name('profil_create');
    Route::post('admin/profil/store', [ProfilController::class, 'store'])->name('profil_store');
    Route::post('admin/profil/import', [ProfilController::class, 'importExcel'])->name('profil_import');
    Route::post('admin/profil/destroy', [ProfilController::class, 'destroy'])->name('profil_destroy');

    Route::get('admin/blog', [BlogController::class, 'index'])->name('admin_blog');
    Route::get('admin/blog/create/{id}', [BlogController::class, 'create'])->name('blog_create');
    Route::post('admin/blog/store', [BlogController::class, 'store'])->name('blog_store');
    Route::post('admin/blog/import', [BlogController::class, 'importExcel'])->name('blog_import');
    Route::post('admin/blog/destroy', [BlogController::class, 'destroy'])->name('blog_destroy');

    Route::get('admin/faq', [BlogController::class, 'faq'])->name('admin_faq');
    Route::get('admin/faq/create/{id}', [BlogController::class, 'create_faq'])->name('faq_create');
    Route::post('admin/faq/store', [BlogController::class, 'store_faq'])->name('faq_store');

    Route::get('admin/slider', [PengaturanController::class, 'index_slider'])->name('admin_slider');
    Route::get('admin/slider/create/{id}', [PengaturanController::class, 'create_slider'])->name('slider_crate');
    Route::post('admin/slider/store', [PengaturanController::class, 'store_slider'])->name('slider_store');
  });

Route::get('profil/{id}', [ProfilController::class, 'show'])->name('profil_show');
Route::get('arsip/profil/{slug}', [ProfilController::class, 'arsip'])->name('profil_arsip');

Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog_show');
Route::get('arsip/blog/{slug}', [BlogController::class, 'arsip'])->name('blog_arsip');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});