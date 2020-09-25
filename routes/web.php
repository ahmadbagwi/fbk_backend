<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\LaporanController;

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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', function() {
      return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');
    
    Route::get('filemanager', function() {
      return Inertia\Inertia::render('FileManager');
    })->name('filemanager');

    Route::get('biodata/create', [BiodataController::class, 'create'])->name('biodata_create');
    Route::post('biodata/store', [BiodataController::class, 'store'])->name('biodata_store');
    Route::get('biodata/show', [BiodataController::class, 'show'])->name('biodata_show');
    // Route::get('biodata/show', function() {
    //   return Inertia\Inertia::render('Show/Biodata');
    // })->name('show.biodata');

    Route::get('pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan_create');
    Route::post('pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan_store');
    Route::get('pengajuan/show', [PengajuanController::class, 'show'])->name('pengajuan_show');
    Route::post('upload', [PengajuanController::class, 'upload'])->name('upload');
    
    Route::get('administrasi/create', [AdministrasiController::class, 'create'])->name('administrasi_create');
    Route::post('administrasi/store', [AdministrasiController::class, 'store'])->name('administrasi_store');
    Route::get('administrasi/show', [AdministrasiController::class, 'show'])->name('administrasi_show');

    Route::get('laporan/create', [LaporanController::class, 'create'])->name('laporan_create');
    Route::get('laporan/edit', [LaporanController::class, 'edit'])->name('laporan_edit');
    Route::post('laporan/store', [LaporanController::class, 'store'])->name('laporan_store');
    Route::get('laporan/show', [LaporanController::class, 'show'])->name('laporan_show');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:sanctum']], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
});