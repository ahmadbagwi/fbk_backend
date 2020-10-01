<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('role', 20)->default('user');
            $table->string('kegiatan', 100)->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
            [
                'id' => 1,
                'name' => 'Ahmad Bagwi Rifai',
                'email' => 'ahmadbagwi.id@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('Bismillah91'),
                'role' => 'superadmin',
                'kegiatan' => 'fbk'
            ]
        );
        DB::table('users')->insert(
            [
                'id' => 2,
                'name' => 'Pandu Wijaya',
                'email' => 'wijayapandu12@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('Bismillah91'),
                'role' => 'superadmin',
                'kegiatan' => 'FBK'
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
