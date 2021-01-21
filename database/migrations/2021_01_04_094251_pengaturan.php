<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengaturan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->string('nama', 200);
            $table->string('output', 250);
            $table->longText('nilai');
            $table->string('status', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::table('pengaturan', function (Blueprint $table) {
        //     $table->index('user_id');
        //     $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturan');
    }
}
