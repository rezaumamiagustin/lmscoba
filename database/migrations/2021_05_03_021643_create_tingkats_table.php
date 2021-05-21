<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTingkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('id');
            // $table->unsignedBigInteger('id_jurusan');
            // $table->foreign('id_jurusan')->references('id')->on('jurusans')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsignedBigInteger('id_tingkat');
            // $table->foreign('id_tingkat')->references('id')->on('tingkat')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_kelas');
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
        Schema::dropIfExists('tingkats');
    }
}
