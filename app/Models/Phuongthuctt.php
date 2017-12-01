<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phuongthuctt extends Model
{
   protected $table = 'phuongthuctt';

   public function giohang()
   {
   	return $this->hasMany('App\Models\Giohang');
   }
}
