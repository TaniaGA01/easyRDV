<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data_tartempion');
            $table->string('content')->nullable();
            $table->unsignedBigInteger('id_pro');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_status_appointments');
            $table->foreign('id_pro')->references('id')->on('users');
            $table->foreign('id_client')->references('id')->on('users');
            $table->foreign('id_status_appointments')->references('id')->on('status_appointments');
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
        Schema::dropIfExists('agendas');
    }
}
