<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;

class Binhluan extends Model
{
   protected $table = 'binhluan';

   public function sanpham()
   {
   	return $this->belongsTo('App\Models\Sanpham');
   }

   public function khachhang()
   {
   	return $this->belongsTo('App\Models\Khachhang');
   }

   public static function tongso_binhluan_moi()
   {
   	return Binhluan::where('daxem', 0)->where('trangthai', 1)->count();
   }

   public static function tongso_binhluan()
   {
      return Binhluan::where('trangthai', 1)
         ->count();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortBy = 'binhluan.id';
      $orderBy = 'desc';

      $query = DB::table('binhluan');
      $query->select('binhluan.*', 'sanpham.tensanpham', 'khachhang.hovaten');
      $query->join('sanpham', 'sanpham.id', '=', 'binhluan.sanpham_id');
      $query->join('khachhang', 'khachhang.id', '=', 'binhluan.khachhang_id');
      $query->where('binhluan.trangthai', 1);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('tenkhachhang'))
      {
         $query->where('khachhang.hovaten', $request->tenkhachhang);
      }

      if($request->has('tensanpham'))
      {
         $query->where('sanpham.tensanpham', $request->tensanpham);
      }

      if($request->has('daxem'))
      {
         switch ($request->daxem) {
            case '1':
               $query->where('binhluan.daxem', 1);
               break;
            case '0':
               $query->where('binhluan.daxem', 0);
               break;
            default:
               break;
         }
      }

      $query->orderBy($sortBy, $orderBy);

      return $query->paginate($pagination);
   }

}
