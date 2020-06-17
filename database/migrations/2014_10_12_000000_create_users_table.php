<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        $table->string('name',100);
        $table->string('lastname',100);
        $table->string('email',100)->unique();
        $table->string('mobile',13)->unique();
        $table->string('verify_code',6)->unique()->nullable();
        $table->timestamp('verified_at')->nullable();
        $table->string('password',255);
        $table->string('user_code');
        $table->string('longitude');
        $table->string('latitude');
        $table->string('ip')->nullable();
        $table->string('avatar',255);
        $table->timestamps();
    });
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
