<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Chitietdonhang extends Model
{
   protected $table = 'chitietdonhang';

   public function donhang()
   {
   	return $this->belongsTo('App\Models\Donhang');
   }

   public function sanpham()
   {
   	return $this->belongsTo('App\Models\Sanpham');
   }

   public function thanhtien()
   {
   	return number_format($this->giaban * $this->soluong);
   }

   public static function thanhtien_byid($donhang_id, $sanpham_id)
   {
   	$thanhtien = DB::table('chitietdonhang')
         ->select(DB::raw('SUM(soluong * giaban) as thanhtien'))
         ->where('donhang_id', $donhang_id)
         ->where('sanpham_id', $sanpham_id)
         ->first()->thanhtien;

   	return number_format($thanhtien);
   }
}
