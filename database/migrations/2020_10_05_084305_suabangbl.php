<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabangbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('BinhLuan', function (Blueprint $table) {
            $table->foreign('Id_KH')->references('Id_KH')->on('KhachHang');
            $table->foreign('Id_TT')->references('Id_TT')->on('TinTuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('BinhLuan', function (Blueprint $table) {
            //
        });
    }
}
