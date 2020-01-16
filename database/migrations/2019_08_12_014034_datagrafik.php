<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Datagrafik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datagrafik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->float('value');
            $table->string('bgcolor')->nullable()->default('rgba(255, 99, 132, 0.2)');
            $table->string('bordercolor')->nullable()->default('rgba(255,99,132,1)');
            $table->UnsignedInteger('grafik_id');
            $table->timestamps();

            $table->foreign('grafik_id')->references('id')->on('grafik')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datagrafik');
    }
}
