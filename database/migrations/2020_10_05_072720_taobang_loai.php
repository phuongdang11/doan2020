<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaobangLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoaiSP', function (Blueprint $table) {
            $table->increments('Id_LoaiSP');
            $table->string('Ten_LoaiSP');
            $table->integer('ThuTu');
            $table->boolean('AnHien');
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
        Schema::dropIfExists('LoaiSP');
    }
}
