<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chitietdonhang;
use DB;
use Config;

class Donhang extends Model
{
   protected $table = 'donhang';

   public function khachhang()
   {
      return $this->belongsTo('App\Models\Khachhang');
   }

   public function nhanvien()
   {
      return $this->belongsTo('App\Models\Nhanvien');
   }

   public function phuongthuctt()
   {
   	return $this->belongsTo('App\Models\Phuongthuctt');
   }

   public function phuongthucvc()
   {
   	return $this->belongsTo('App\Models\Phuongthucvc');
   }

   public function chitietdonhang()
   {
   	return $this->hasMany('App\Models\Chitietdonhang');
   }

   public function sosanpham()
   {
      return Chitietdonhang::where('donhang_id', $this->id)->count();  
   }

   public function check_hoanthanh()
   {
      $check = $this->chitietdonhang()
         ->whereColumn('soluong', '<>', 'dagiao')
         ->count();
      return $check === 0;
   }

   public function tongtien()
   {
      $tiendonhang = DB::table('chitietdonhang')
         ->select(DB::raw('SUM(soluong * giaban) as tiendonhang'))
         ->where('donhang_id', $this->id)
         ->first()->tiendonhang;
      $option = json_decode($this->options);
      $tienphaitra =  $tiendonhang * (1 - ($option->phantramgiamgia/100));
      $sotiengiamgia = $tiendonhang - $tienphaitra;
      $tongtien = $tienphaitra  + $option->phivanchuyen;

      return number_format($tongtien);
   }

   public static function tongso_donhang_chuathanhtoan()
   {
      $count = Donhang::whereNull('ngaydat')
      ->where('trangthai', 1)
      ->count();
      return $count > 0 ? $count : 1;
   }

   public static function tongso_donhang()
   {
      $count = Donhang::where('trangthai', 1)->count();
      return $count > 0 ? $count : 1;
   }

   public static function tongso_donhang_moi()
   {
      return Donhang::where('tinhtrangdonhang', 0)
         ->where('trangthai', 1)
         ->count();
   }
   
   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'donhang.id';
      $orderBy = 'desc';

      $query = DB::table('donhang');
      $query->select('donhang.*', 'khachhang.sodienthoaikh', 'khachhang.hovaten', 'khachhang.diachi');
      $query->join('khachhang', 'khachhang.id', '=', 'donhang.khachhang_id');
      $query->where('donhang.trangthai', 1);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('tinhtrangdonhang'))
      {
         $tinhtrangdonhang = $request->tinhtrangdonhang;
         switch ($tinhtrangdonhang) {
            case '0':
               $query->where('donhang.tinhtrangdonhang', 0);
               break;
            case '1':
               $query->where('donhang.tinhtrangdonhang', 1);
               break;
            case '2':
               $query->where('donhang.tinhtrangdonhang', 2);
               break;
            default:
               break;
         }
      }

      if($request->has('madonhang'))
      {
         $query->where('donhang.madonhang', 'like', "%$request->madonhang%");
      }

      if($request->has('tenkhachhang'))
      {
         $query->where('khachhang.hovaten', 'like', "%$request->tenkhachhang%");
      }

      $typeof = $request->typeof;

      if($request->has('data'))
      {
         $input_date = $request->data;
         $arr_date = explode('-', $input_date);
         $ngay = $arr_date[0];
         $thang = $arr_date[1];
         $nam = $arr_date[2];
         $ngaythangnam = $nam.'-'.$thang.'-'.$ngay; 

         switch ($typeof) {
            case '1':
               $query->whereDate('donhang.ngaydat', $ngaythangnam);
               $query->whereMonth('donhang.ngaydat', $thang);
               $query->whereYear('donhang.ngaydat', $nam);
               break;
            case '2':
               $query->whereMonth('donhang.ngaydat', $thang);
               $query->whereYear('donhang.ngaydat', $nam);
               break;
            case '3':
               $query->whereYear('donhang.ngaydat', $nam);
               break;
            default:
               break;
         }
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }
}
