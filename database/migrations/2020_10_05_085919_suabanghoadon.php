<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabanghoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HoaDon', function (Blueprint $table) {
            $table->foreign('Id_GH')->references('Id_GH')->on('GioHang');
            $table->foreign('Id_KH')->references('Id_KH')->on('KhachHang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('HoaDon', function (Blueprint $table) {
            //
        });
    }
}
