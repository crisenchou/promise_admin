<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('name', 60);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->smallInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('user_infos', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->date('birthday')->nullable();
            $table->unsignedInteger('age')->default(0)->nullable();
            $table->unsignedTinyInteger('gender')->default(0)->nullable();
            $table->string('avatar', 100)->default('')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('user_infos');
    }
}
