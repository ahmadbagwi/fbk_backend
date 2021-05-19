<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdministrasiLengkap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrasi_lengkap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('biodata_pengajuan_id');
            $table->longText('pengajuan')->nullable();
            $table->longText('riwayat')->nullable();
            $table->longText('pertanggungjawaban')->nullable();
            $table->longText('kesanggupan')->nullable();
            $table->longText('integritas')->nullable();
            $table->longText('politik')->nullable();
            $table->longText('domisili')->nullable();
            $table->longText('rekening')->nullable();
            $table->longText('npwp')->nullable();
            $table->longText('ktp')->nullable();
            $table->longText('kk')->nullable();
            $table->longText('rab')->nullable();
            $table->longText('proposal')->nullable();
            $table->longText('sertifikat')->nullable();
            $table->longText('rekomendasi')->nullable();
            $table->longText('perjanjian')->nullable();
            $table->longText('profil')->nullable();
            $table->longText('konflik')->nullable();
            $table->longText('keberadaan')->nullable();
            $table->longText('foto_sekretariat')->nullable();
            $table->longText('foto_kegiatan')->nullable();
            $table->longText('akta')->nullable();
            $table->longText('pengesahan')->nullable();
            $table->longText('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('administrasi_lengkap', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('biodata_pengajuan_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('biodata_pengajuan_id')->references('id')->on('biodata_pengajuan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrasi_lengkap');
    }
}
