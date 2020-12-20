<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->string('judul', 200);
            $table->string('slug', 250);
            $table->string('kategori', 100);
            $table->string('meta', 200);
            $table->string('kata_kunci', 100);
            $table->longText('featured');
            $table->longText('konten');
            $table->string('status', 20)->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('blog', function (Blueprint $table) {
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
        Schema::dropIfExists('blog');
    }
}
