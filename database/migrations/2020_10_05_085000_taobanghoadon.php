<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobanghoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HoaDon', function (Blueprint $table) {
            $table->increments('Id_HD');
            $table->string('Ten_SP',255);
            $table->dateTime('Ngay_Dang');
            $table->integer('So_Luong');
            $table->double('Tong_Tien',8,2);
            $table->boolean("AnHien");
            $table->integer('ThuTu');
            $table->string('Ten_KH',30)->null();
            $table->string('DienThoai',30)->null();
            $table->string('DiaChi',200)->null();
            $table->string('Quan',200)->null();
            $table->string('Phuong',200)->null();
            $table->boolean("PT_TT");
            $table->unsignedInteger("Id_GH");
            $table->unsignedInteger("Id_KH");
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
        Schema::dropIfExists('HoaDon');
    }
}
