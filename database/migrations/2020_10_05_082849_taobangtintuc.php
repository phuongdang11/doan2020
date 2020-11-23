<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Taobangtintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinTuc', function (Blueprint $table) {
            $table->increments('Id_TT');
            $table->string('Tieu_De',255)->unique();
            $table->date('Ngay_Dang');
            $table->string('urlHinh',200);
            $table->string('ND_dai',255);
            $table->string('ND_ngan',120);
            $table->integer('ThuTu');
            $table->boolean("AnHien");
            $table->string('Tags',500);
            $table->unsignedInteger("Id_NV");
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
        Schema::dropIfExists('TinTuc');
    }
}
