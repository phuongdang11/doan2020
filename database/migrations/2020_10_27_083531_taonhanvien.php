<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taonhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NhanVien', function (Blueprint $table) {
            $table->increments('Id_NV');
            $table->string('Ten_NV');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('DienThoai',30);
            $table->boolean("Gioi_Tinh");
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
        Schema::dropIfExists('NhanVien');
    }
}
