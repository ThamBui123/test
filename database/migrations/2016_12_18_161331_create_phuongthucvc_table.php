<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhuongthucvcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongthucvc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tenvanchuyen');
            $table->string('thoigianvanchuyen');
            $table->bigInteger('phivanchuyen');
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
        Schema::dropIfExists('phuongthucvc');
    }
}
