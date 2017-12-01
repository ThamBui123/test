<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinhsanpham extends Model
{
   protected $table = 'hinhsanpham';

   public function sanpham()
   {
   	return $this->belongsTo('App\Models\Sanpham');
   }
}
