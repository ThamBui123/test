<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chitietgiohang extends Model
{
   protected $table = 'chitietgiohang';

   public function giohang()
   {
   	return $this->belongsTo('App\Models\Giohang');
   }

   public function sanpham()
   {
   	return $this->belongsTo('App\Models\Sanpham');
   }
}
