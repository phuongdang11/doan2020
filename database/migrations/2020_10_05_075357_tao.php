<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('Id_SP');
            $table->string('Ten_SP',255)->unique();
            $table->string('MoTa',500);
            $table->double('Gia',8,2);
            $table->double('Gia_KM',8,2)->null();
            $table->string('urlHinh1', 200);
            $table->string('urlHinh2', 200);
            $table->string('urlHinh3', 200);
            $table->integer('So_Luong')->default(0);
            $table->boolean("AnHien");
            $table->integer('ThuTu');
            $table->unsignedInteger("Id_LoaiSP");
            $table->string('Tags',500);
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
        Schema::dropIfExists('sanpham');
    }
}
