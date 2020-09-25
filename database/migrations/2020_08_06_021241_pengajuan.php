<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->longText('jenis');
            $table->longText('judul');
            $table->longText('konsep');
            $table->longText('mulai');
            $table->longText('selesai');
            $table->longText('tahap1');
            $table->longText('tahap2');
            $table->longText('biaya');
            $table->longText('rab');
            $table->longText('video');
            $table->string('status', 20)->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pengajuan', function (Blueprint $table) {
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
