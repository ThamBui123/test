<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madonhang', 25);
            $table->integer('khachhang_id')->default('0');
            $table->integer('phuongthucvc_id');
            $table->integer('phuongthuctt_id');
            $table->dateTime('ngaydat');
            $table->dateTime('ngaynhan')->nullable();
            $table->string('ghichudonhang')->nullable();
            $table->string('ghichukhachhang')->nullable();
            $table->char('tinhtrangdonhang', 1)->default('0');
            $table->char('trangthai', 1)->default('1');
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
        Schema::dropIfExists('giohang');
    }
}
