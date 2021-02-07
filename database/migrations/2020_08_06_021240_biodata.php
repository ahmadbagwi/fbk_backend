<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Biodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('kategori');
            $table->longText('nama_pengusul');
            $table->longText('nama_penanggungjawab')->nullable();
            $table->longText('ktp')->nullable();
            $table->longText('kemenkumham')->nullable();
            $table->longText('akta')->nullable();
            $table->longText('npwp')->nullable();
            $table->longText('alamat')->nullable();
            $table->longText('provinsi')->nullable();
            $table->longText('kota')->nullable();
            $table->longText('telp')->nullable();
            $table->string('email', 50)->unique();
            $table->string('status', 20)->default('belum diperiksa');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('biodata', function (Blueprint $table) {
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
        Schema::dropIfExists('biodata');
    }
}
