<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facebookkhachhang extends Model
{
   protected $table = 'facebookkhachhang';

   public function khachhang()
   {
   	return $this->belongsTo('App\Models\Khachhang');
   }
}
