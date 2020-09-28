<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Akun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('kategori');
            $table->longText('nama_pengusul');
            $table->longText('nama_penanggungjawab');
            $table->longText('ktp');
            $table->longText('kemenkumham');
            $table->longText('akta');
            $table->longText('npwp');
            $table->longText('alamat');
            $table->longText('provinsi');
            $table->longText('kota');
            $table->longText('telp');
            $table->string('email', 50)->unique();
            $table->string('status', 20)->default('belum diperiksa');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('akun', function (Blueprint $table) {
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
        Schema::dropIfExists('akun');
    }
}
