<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhomquyen extends Model
{
   protected $table = 'nhomquyen';

   public function nhanvien()
   {
      return $this->hasMany('App\Models\Nhanvien');
   }

}
