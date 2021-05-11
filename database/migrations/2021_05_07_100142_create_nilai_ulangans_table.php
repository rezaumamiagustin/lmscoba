<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiUlangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_ulangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_ulangan');
            $table->foreign('id_ulangan')->references('id')->on('ulangans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jawaban')->nullable();
            $table->string('benar')->nullable();
            $table->string('salah')->nullable();
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('nilai_ulangans');
    }
}
