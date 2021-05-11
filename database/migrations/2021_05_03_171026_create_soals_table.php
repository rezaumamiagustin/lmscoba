<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_ulangan');
            $table->foreign('id_ulangan')->references('id')->on('ulangans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('soal')->nullable();
            $table->string('pilA')->nullable();
            $table->string('pilB')->nullable();
            $table->string('pilC')->nullable();
            $table->string('pilD')->nullable();
            $table->string('pilE')->nullable();
            $table->string('foto')->nullable();
            $table->string('kunci_jawaban')->nullable();
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
        Schema::dropIfExists('soals');
    }
}
