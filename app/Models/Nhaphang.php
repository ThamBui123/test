<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class Nhaphang extends Model
{
   protected $table = 'nhaphang';

   public function chitietnhaphang()
   {
   	return $this->hasMany('App\Models\Chitietnhaphang');
   }

   public function nhanvien()
   {
      return $this->belongsTo('App\Models\Nhanvien');
   }

   public function soluongnhap()
   {
   	$soluongnhap = DB::table('chitietnhaphang')
   	->join('nhaphang', 'nhaphang.id', '=', 'chitietnhaphang.nhaphang_id')
   	->where('nhaphang_id', $this->id)
   	->sum('soluongnhap');
   	return $soluongnhap;
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'nhaphang.id';
      $orderBy = 'desc';
      $query = Nhaphang::where('nhaphang.trangthai', 1);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }
}
