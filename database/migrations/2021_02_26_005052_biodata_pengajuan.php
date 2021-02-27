<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BiodataPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('kategori_pengusul');
            $table->longText('nama_pengusul');
            $table->longText('telp')->nullable();
            $table->string('email', 50)->unique();
            $table->longText('alamat')->nullable();
            $table->longText('kota')->nullable();
            $table->longText('provinsi')->nullable();
            $table->longText('kategori_kegiatan')->nullable();
            $table->longText('judul_kegiatan')->nullable();
            $table->longText('deskripsi_kegiatan')->nullable();
            $table->longText('durasi_pelaksanaan')->nullable();
            $table->longText('hasil_kegiatan')->nullable();
            $table->longText('penerima_manfaat')->nullable();
            $table->longText('biaya_diajukan')->nullable();
            $table->longText('pertanyaan')->nullable();
            $table->longText('rab')->nullable();
            $table->string('status', 20)->default('belum diperiksa');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('biodata_pengajuan', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_pengajuan');
    }
}
