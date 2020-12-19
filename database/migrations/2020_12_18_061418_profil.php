<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('kategori', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('nama_project', 200);
            $table->string('waktu', 100)->nullable();
            $table->integer('nominal_diajukan')->unsigned()->nullable();
            $table->integer('nominal_disetujui')->unsigned()->nullable();
            $table->longText('deskripsi')->nullable()->default('text');
            $table->string('kata_kunci', 100)->nullable()->default('fbk');
            $table->string('foto_penerima', 100)->nullable();
            $table->string('nama_penerima', 100);
            $table->longText('profil_penerima')->nullable()->default('text');
            $table->string('kontak', 100)->nullable()->default('text');
            $table->string('media_sosial', 100)->nullable()->default('text'); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('profil', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil');
    }
}
