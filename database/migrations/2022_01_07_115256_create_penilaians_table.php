<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('user_id');
            $table->integer('kehadiran');
            $table->integer('disiplin');
            $table->integer('dedikasi');
            $table->integer('komunikasi');
            $table->integer('kerjasama');
            $table->integer('kepatuhan');
            $table->integer('kepuasan_pelanggan');
            $table->integer('pemahaman_tupoksi');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
        Schema::dropIfExists('penilaians');
    }
}
