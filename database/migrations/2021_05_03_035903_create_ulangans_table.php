<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_tingkat');
            $table->foreign('id_tingkat')->references('id')->on('tingkats')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_mapel');
            $table->foreign('id_mapel')->references('id')->on('mapels')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_jurusan');
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul_ulangan');
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');
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
        Schema::dropIfExists('ulangans');
    }
}
