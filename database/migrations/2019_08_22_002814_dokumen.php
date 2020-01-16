<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dokumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->increments('id');
            $table->text('judul');
            $table->text('filename');
            $table->string('jenis');
            $table->string('size');
            $table->UnsignedInteger('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onUpdate('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}
