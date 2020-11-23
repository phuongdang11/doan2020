<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taokhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhachHang', function (Blueprint $table) {
            $table->increments('Id_KH');
            $table->string('Ten_KH');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('DienThoai',30);
            $table->string('DiaChi',200);
            $table->string('Phuong',30);
            $table->string('Quan',30);
            $table->boolean("Gioi_Tinh");
            $table->double('Tich_diem',8,2);
            $table->rememberToken();
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
        Schema::dropIfExists('KhachHang');
    }
}
