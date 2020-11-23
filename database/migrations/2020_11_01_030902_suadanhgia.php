<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suadanhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('DanhGia', function (Blueprint $table) {
            $table->foreign('Id_SP')->references('Id_SP')->on('Sanpham');
            $table->foreign('Id_KH')->references('Id_KH')->on('Khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('DanhGia', function (Blueprint $table) {
            //
        });
    }
}
