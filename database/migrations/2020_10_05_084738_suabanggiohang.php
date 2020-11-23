<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suabanggiohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('GioHang', function (Blueprint $table) {
            $table->foreign('Id_NV')->references('Id_NV')->on('NhanVien');
            $table->foreign('Id_KH')->references('Id_KH')->on('KhachHang');
            $table->foreign('Id_SP')->references('Id_SP')->on('SanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('GioHang', function (Blueprint $table) {
            //
        });
    }
}
