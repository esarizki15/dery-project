<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPerpanjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_perpanjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilai_id');
            $table->unsignedBigInteger('penilaian_id');
            $table->boolean('status')->default(false)->nullable()->comment("0 => Di Perpanjang, 1 => Di Berhentikan");
            $table->timestamps();
            $table->foreign('penilaian_id')->references('id')->on('penilaians')->onUpdate('cascade');
            $table->foreign('penilai_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_perpanjangs');
    }
}
