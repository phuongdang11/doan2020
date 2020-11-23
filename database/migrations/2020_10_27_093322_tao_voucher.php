<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaoVoucher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Voucher', function (Blueprint $table) {
            $table->increments('Id_VC');
            $table->string('Ten_VC',255)->unique();
            $table->double('Gia_KM',8,2);
            $table->integer('ThuTu');
            $table->boolean("AnHien");
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
        Schema::dropIfExists('Voucher');
    }
}
