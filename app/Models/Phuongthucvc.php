<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phuongthucvc extends Model
{
   protected $table = 'phuongthucvc';

   public function giohang()
   {
   	return $this->hasMany('App\Models\Giohang');
   }
}
