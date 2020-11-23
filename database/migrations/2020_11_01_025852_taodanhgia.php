<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taodanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DanhGia', function (Blueprint $table) {
            $table->increments('Id_DG');
            $table->boolean('Danh_Gia');
            $table->unsignedInteger('Id_KH');
            $table->unsignedInteger('Id_SP');
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
        Schema::dropIfExists('DanhGia');
    }
}
