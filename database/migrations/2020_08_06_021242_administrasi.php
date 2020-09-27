<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Administrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('permohonan');
            $table->longText('proposal');
            $table->longText('pertanggungjawaban');
            $table->longText('kesanggupan');
            $table->longText('rekening');
            $table->longText('npwp');
            $table->longText('ktp');
            $table->longText('kk');
            $table->longText('integritas');
            $table->longText('riwayat');
            $table->longText('politik');
            $table->longText('domisili');
            $table->longText('komunitas');
            $table->longText('kesekretariatan');
            $table->longText('prestasi');
            $table->longText('akta');
            $table->string('status', 20)->default('belum diperiksa');
            $table->string('catatan', 100)->nullable();
            $table->string('pemeriksa', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('administrasi', function (Blueprint $table) {
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
        Schema::dropIfExists('administrasi');
    }
}
