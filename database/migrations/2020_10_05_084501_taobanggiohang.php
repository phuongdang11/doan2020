<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobanggiohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GioHang', function (Blueprint $table) {
            $table->increments('Id_GH');
            $table->string('Ten_SP',255);
            $table->integer('So_Luong');
            $table->boolean("AnHien");
            $table->integer('ThuTu');
            $table->unsignedInteger("Id_SP");
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
        Schema::dropIfExists('GioHang');
    }
}
