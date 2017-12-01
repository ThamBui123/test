<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class Tintuc extends Model
{
   protected $table = 'tintuc';

   public function nhanvien()
   {
   	return $this->belongsTo('App\Models\Nhanvien');
   }

   public static function moinhat($limit = 15)
   {
   	return Tintuc::where('trangthai', 1)
         ->orderBy('id', 'desc')
         ->limit($limit)
         ->get();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'tintuc.id';
      $orderBy = 'desc';
      $query = DB::table('tintuc');
      $query->select('tintuc.*', 'nhanvien.hovaten');
      $query->join('nhanvien', 'nhanvien.id', '=', 'tintuc.nhanvien_id');
      $query->where('tintuc.trangthai', 1);
      
      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('tieude'))
      {
         $query->where('tieude', 'like', "%$request->tieude%");
      }

      if($request->has('nguoitao'))
      {
         $query->where('nhanvien.hovaten', 'like', "%$request->nguoitao%");
      }

      if($request->has('ngaytao'))
      {
         $ngaytao = dinh_dang_ngay_mysql($request->ngaytao);
         $query->whereDate('tintuc.created_at',  $ngaytao);
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }
}
