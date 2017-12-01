<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitietnhaphang extends Model
{
   protected $table = 'chitietnhaphang';

   public function nhaphang()
   {
   	return $this->belongsTo('App\Models\Nhaphang');
   }

   public function sanpham()
   {
   	return $this->belongsTo('App\Models\Sanpham');
   }
}
