<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_detMapel');
            $table->foreign('id_detMapel')->references('id')->on('detail_mapels')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_materi')->nullable();
            $table->string('desc_materi')->nullable();
            $table->string('file_materi')->nullable();
            $table->string('link_materi')->nullable();
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
        Schema::dropIfExists('materis');
    }
}
