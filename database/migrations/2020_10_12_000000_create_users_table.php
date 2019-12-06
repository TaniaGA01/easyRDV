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
            $table->bigIncrements('id');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('adresse')->nullable();
            $table->string('about')->nullable();
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->string('avatar')->default('default.png');
            $table->timestamps();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('profession_id')->nullable();
            $table->unsignedBigInteger('appointments_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade');
            $table->foreign('profession_id')->references('id')->on('professions')->onUpdate('cascade');
            // $table->foreign('appointments_id')->references('id')->on('appointments')->onUpdate('cascade');
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
