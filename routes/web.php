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
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataPengajuanController;
use App\Http\Controllers\EmailController;

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
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

// Route::get('cari-data', [ProfilController::class, 'cari'])->name('cari');

// Route::get('profil/{id}', [ProfilController::class, 'show'])->name('profil_show');
// Route::get('arsip/profil/{slug}', [ProfilController::class, 'arsip'])->name('profil_arsip');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Big update, pisahkan frontend (nuxt), Route baru untuk json
Route::get('/landing', function () {
    return response()->json([
        'data' => [
            'slider' => App\Models\Pengaturan::where('nama', 'slider')->where('status', 'terbit')->first(),
            'penerima' => [
                'dokumentasi' => App\Models\Profil::where('kategori', 'like', 'Dokumentasi' . '%')->orderBy('updated_at', 'desc')->get(),
                'penciptaan' => App\Models\Profil::where('kategori', 'like', 'Penciptaan' . '%')->orderBy('updated_at', 'desc')->get(),
                'pendayagunaan' => App\Models\Profil::where('kategori', 'like', 'Pendayagunaan' . '%')->orderBy('updated_at', 'desc')->get(),
            ],
            'intro' => App\Models\Blog::where('kategori', 'intro')->get(),
            'komite' => App\Models\Blog::where('kategori', 'komite')->get(),
            'blog' => App\Models\Blog::where('kategori', 'blog')->limit(3)->orderBy('created_at', 'desc')->get(),
            'faq' => App\Models\Blog::where('kategori', 'faq')->get(),
            'maintenance' => App\Models\Pengaturan::where('nama', 'maintenance')->where('status', 'aktif')->first(),
            'juknis' => App\Models\Pengaturan::where('nama', 'juknis')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
            'section_login' => App\Models\Pengaturan::where('nama', 'section-login')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
            'login' => App\Models\Pengaturan::where('nama', 'login')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
            'registrasi' => App\Models\Pengaturan::where('nama', 'registrasi')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
            'modal' => App\Models\Pengaturan::where('nama', 'like', 'modal-landing' . '%')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
        ]
    ]);
})->name('landing');

Route::get('profil-penerima/{id}', [ProfilController::class, 'show'])->name('profil_penerima');
Route::get('arsip/profil-penerima/{slug}', [ProfilController::class, 'arsip'])->name('arsip_profil_penerima');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog_show');
Route::get('arsip/blog/{slug}', [BlogController::class, 'arsip'])->name('arsip_blog');
Route::get('cari-penerima', [ProfilController::class, 'cari'])->name('cari_penerima');

Route::post('user_login', [UserController::class, 'login'])->name('user_login');
// Route::post('user_logout', [UserController::class, 'logout'])->name('user_logout');
Route::post('user_registrasi', [UserController::class, 'store'])->name('user_registrasi');

Route::group(['middleware' => ['auth:sanctum'/* , 'verified' */]], function () {
    Route::get('dashboard/user', function () {
        return response()->json([
            'data' => [
                'pengajuan' => App\Models\Pengaturan::where('nama', 'pengajuan')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
                'administrasi' => App\Models\Pengaturan::where('nama', 'administrasi')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
                'laporan' => App\Models\Pengaturan::where('nama', 'laporan')->where('status', 'aktif')->orderBy('updated_at', 'desc')->first(),
                'seleksi' => App\Models\BiodataPengajuan::where('user_id', auth()->user()->id)->select('id', 'status')->first()
            ],
        ]);
    });
});

Route::group(['prefix' => '/user/biodata-pengajuan', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [BiodataPengajuanController::class, 'show'])->name('biodata_pengajuan_user');
    Route::post('/store', [BiodataPengajuanController::class, 'store'])->name('biodata_pengajuan_store');
    Route::post('/store/video', [BiodataPengajuanController::class, 'store_video'])->name('biodata_pengajuan_store_video');
    Route::get('/email/kirim-email', [EmailController::class, 'index'])->name('email');
    Route::post('/upload', [BiodataPengajuanController::class, 'upload'])->name('user_upload');
});

Route::group(['prefix' => '/user/administrasi-lengkap', 'middleware' => ['auth:sanctum']], function () {
    Route::get('/', [AdministrasiLengkapController::class, 'show'])->name('administrasi_lengkap_show');
    Route::post('/store', [AdministrasiLengkapController::class, 'store'])->name('administrasi_lengkap_store');
    Route::post('/upload', [AdministrasiLengkapController::class, 'upload'])->name('administrasi_lengkap_upload');
});

Route::group(['prefix' => '/admin/biodata-pengajuan', 'middleware' => ['auth:sanctum', 'cek_admin']], function () {
    Route::get('/', [BiodataPengajuanController::class, 'index'])->name('biodata_pengajuan_index');
    Route::post('/update', [BiodataPengajuanController::class, 'update'])->name('biodata_pengajuan_update');
    Route::post('/bulk-update', [BiodataPengajuanController::class, 'bulk_update'])->name('biodata_pengajuan_bulk_update');
    Route::post('/destroy/{id}', [BiodataPengajuanController::class, 'destroy'])->name('biodata_pengajuan_destroy');
});

Route::group(['prefix' => '/admin/administrasi-lengkap', 'middleware' => ['auth:sanctum', 'cek_admin']], function () {
    Route::get('/', [AdministrasiLengkapController::class, 'index'])->name('administrasi_lengkap_index');
    Route::post('/destroy/{id}', [AdministrasiLengkapController::class, 'destroy'])->name('administrasi_lengkap_destroy');
});

Route::group(['prefix' => '/admin/email', 'middleware' => ['auth:sanctum', 'cek_admin']], function () {
    Route::get('/view-email', [EmailController::class, 'view'])->name('view_email');
    Route::get('/bulk/{awal}/{akhir}', [EmailController::class, 'bulk'])->name('bulk');
    Route::get('/administrasi/lulus/view', [EmailController::class, 'administrasi_lulus_view'])->name('email_administrasi_lulus_view');
    Route::get('/administrasi/lulus', [EmailController::class, 'administrasi_lulus'])->name('email_administrasi_lulus');
    Route::get('/administrasi/tidak-lulus/view', [EmailController::class, 'administrasi_tidak_lulus_view'])->name('email_administrasi_tidak_lulus_view');
    Route::get('/administrasi/tidak-lulus', [EmailController::class, 'administrasi_tidak_lulus'])->name('email_administrasi_tidak_lulus');
});

// Auth::routes();

// route untuk semua fitur admin untuk role superadmin & user
Route::group(['middleware' => ['auth:sanctum', 'cek_admin']], function () {
    // Route::get('biodata-pengajuan/admin', [BiodataPengajuanController::class, 'admin'])->name('biodata_pengajuan_admin');
    // Route::post('biodata-pengajuan/admin/update', [BiodataPengajuanController::class, 'update'])->name('biodata_update_admin');
    // Route::post('biodata-pengajuan/admin/bulk-update', [BiodataPengajuanController::class, 'bulk_update'])->name('biodata_bulk_update_admin');
    Route::get('dashboard/admin/administrasi', [AdministrasiController::class, 'index'])->name('admin_administrasi');
    Route::get('/dashboard/admin/user', [UserController::class, 'user_admin'])->name('admin_user');
    Route::get('/dashboard/admin/user/{id}', [UserController::class, 'user_admin_show'])->name('admin_user_show');
    Route::post('/dashboard/admin/user/post', [UserController::class, 'store'])->name('admin_user_store');
    Route::post('/dashboard/admin/user/update', [UserController::class, 'update'])->name('admin_user_update');
    Route::get('/dashboard/admin/biodata', [BiodataController::class, 'biodata'])->name('admin_biodata');
    Route::get('/dashboard/admin/pengajuan', [PengajuanController::class, 'pengajuan'])->name('admin_pengajuan');
    Route::get('/dashboard/admin/blog', [BlogController::class, 'blog'])->name('admin_blog');
    Route::post('/dashboard/admin/blog/post', [BlogController::class, 'blog_post'])->name('admin_blog_post');
    Route::get('/dashboard/admin/faq', [BlogController::class, 'faq'])->name('admin_faq');
    Route::post('/dashboard/admin/faq/post', [BlogController::class, 'faq_post'])->name('admin_faq_post');
    Route::post('/dashboard/admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin_blog_destroy');
    Route::get('/dashboard/admin/profil-penerima', [ProfilController::class, 'profil_penerima'])->name('admin_profil_penerima');
    Route::get('/dashboard/admin/profil-penerima/{id}', [ProfilController::class, 'profil_penerima_show'])->name('admin_profil_penerima_show');
    Route::post('/dashboard/admin/profil-penerima/post', [ProfilController::class, 'profil_penerima_post'])->name('admin_profil_penerima_post');
    Route::post('/dashboard/admin/profil-penerima/destroy/{id}', [ProfilController::class, 'destroy'])->name('admin_profil_penerima_destroy');
    Route::post('/dashboard/admin/upload', [BlogController::class, 'upload'])->name('admin_upload');
    Route::get('/dashboard/admin/slider', [PengaturanController::class, 'slider_show'])->name('admin_slider_show');
    Route::post('/dashboard/admin/slider/post', [PengaturanController::class, 'slider_post'])->name('admin_slider_post');
    Route::get('/dashboard/admin/periode', [PengaturanController::class, 'periode'])->name('admin_periode');
    Route::post('/dashboard/admin/periode/post', [PengaturanController::class, 'periode_post'])->name('admin_periode_post');
    Route::get('/dashboard/admin/pengaturan/web', [PengaturanController::class, 'web'])->name('admin_pengaturan_web');
    Route::get('/dashboard/admin/pengaturan/web/{id}', [PengaturanController::class, 'web_show'])->name('admin_pengaturan_web_show');
    Route::post('/dashboard/admin/pengaturan/web/post', [PengaturanController::class, 'web_post'])->name('admin_web_post');

    

    Route::get('biodata-pengajuan/export', [BiodataPengajuanController::class, 'export'])->name('biodata_pengajuan_export');
});
