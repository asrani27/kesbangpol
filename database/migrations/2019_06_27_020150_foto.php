<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Foto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('filename');
            $table->UnsignedInteger('ormas_id');
            $table->timestamps();

            $table->foreign('ormas_id')->references('id')->on('ormas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galery');
    }
}
