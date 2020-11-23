<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Booking', function (Blueprint $table) {
            $table->increments('Id_BK');
            $table->string('Ten_KH');
            $table->string('Noi_Dung',255)->unique();
            $table->date('Ngay_Toi');
            $table->time('Gio_Toi');
            $table->string('DienThoai',30);
            $table->string('SoNguoi',30);
            $table->string('email')->unique();
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
        Schema::dropIfExists('Booking');
    }
}
