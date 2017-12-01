<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('masanpham');
            $table->integer('theloai_id');
            $table->integer('hangsanxuat_id');
            $table->string('tensanpham');
            $table->string('slugsp');
            $table->bigInteger('giasanpham');
            $table->bigInteger('giamgiasanpham')->default('0');
            $table->string('anhsanpham');
            $table->integer('soluongsanpham')->default('0');
            $table->text('gioithieungan')->nullable();
            $table->longText('gioithieusanpham')->nullable();
            $table->integer('luotxem')->default('0');
            $table->float('diemdanhgia')->default('0');
            $table->integer('soluotdanhgia')->default('0');
            $table->char('sanphamdacbiet', 1)->default('0');
            $table->text('sanphamlienquan')->nullable();
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
        Schema::dropIfExists('sanpham');
    }
}
