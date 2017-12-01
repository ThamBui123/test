<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
   protected $table = 'giohang';

   public function chitietgiohang()
   {
   	return $this->hasMany('App\Models\Chitietgiohang');
   }

   public function khachhang()
   {
   	return $this->belongsTo('App\Models\Khachhang');
   }
}
