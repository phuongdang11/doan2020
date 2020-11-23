<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaoTableChiTietHoaDon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietHoaDon', function (Blueprint $table) {
            $table->increments('Id_CT');
            $table->string('Ten_SP',30);
            $table->double('Gia',8,2);
            $table->double('TongTien',8,2);
            $table->double('So_Luong',8,2);
            $table->unsignedInteger('Id_HD');
            $table->unsignedInteger('Id_SP');
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
        Schema::dropIfExists('ChiTietHoaDon');
    }
}
