<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('anhdaidien')->nullable();
            $table->string('sodienthoaikh', 20);
            $table->string('hovaten', 100);
            $table->char('gioitinh', 1)->default('1');
            $table->date('ngaysinh')->nullable();
            $table->string('diachi');
            $table->char('loaikh', 1)->default('0');
            $table->char('trangthai', 1)->default('1');
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
        Schema::dropIfExists('khachhang');
    }
}
