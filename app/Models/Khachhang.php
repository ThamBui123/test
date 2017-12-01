<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;
use DB;
use App\Notifications\KhoiPhucMatKhauKhachHang;

class Khachhang extends Authenticatable
{
   use Notifiable;

   protected $table = 'khachhang';
   protected $fillable = [
      'hovaten', 'email', 'sodienthoaikh', 'diachi',
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   public function sendPasswordResetNotification($token)
   {
      $this->notify(new KhoiPhucMatKhauKhachHang($token));
   }

   public function donhang()
   {
      $pagination = Config::get('settings.site_pages');
      $query = DB::table('donhang');
      $query->where('khachhang_id', $this->id);
      $query->orderBy('id', 'desc');
      return $query->paginate($pagination);
   }

   public function binhluan()
   {
   	return $this->hasMany('App\Models\Binhluan');
   }

   public function uathich()
   {
   	return $this->hasOne('App\Models\Uathich');
   }

   public function facebook()
   {
      return $this->hasOne('App\Models\Facebookkhachhang');
   }

   public function yeuthich()
   {
      $pagination = Config::get('settings.site_pages');
      $query = DB::table('chitietuathich');
      $query->join('uathich', 'uathich.id', '=', 'chitietuathich.uathich_id');
      $query->join('sanpham', 'sanpham.id', '=', 'chitietuathich.sanpham_id');
      $query->where('uathich.khachhang_id', $this->id);
      $query->orderBy('chitietuathich.sanpham_id', 'desc');
      return $query->paginate($pagination);
   }

   public function sosanh()
   {
   	return $this->hasOne('App\Models\Sosanh');
   }

   public function getHoTenAttribute()
   {
      return $this->holot . ' ' . $this->ten;
   }

   public static function tongso_khachhang()
   {
      return Khachhang::where('trangthai', 1)->count();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'id';
      $orderBy = 'desc';
      $query = DB::table('khachhang');
      $loaikh = 1;

      if($request->has('loaikh'))
      {
         switch ($request->loaikh) {
            case '0':
               $loaikh = 0;
            case '2':
               $loaikh = 2;
               break;
            default:
               break;
         }
      }

      $query->where('trangthai', 1);
      $query->where('loaikh', $loaikh);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('hovaten'))
      {
         $query->where('hovaten', 'like', "%$request->hovaten%");
      }

      if($request->has('sodienthoaikh'))
      {
         $query->where('sodienthoaikh', 'like', "%$request->sodienthoaikh%");
      }

      if($request->has('diachi'))
      {
         $query->where('diachi', 'like', "%$request->diachi%");
      }

      if($request->has('email'))
      {
         $query->where('email', 'like', "%$request->email%");
      }

      if($request->has('gioitinh'))
      {
         switch ($request->gioitinh) {
            case '1':
               $query->where('gioitinh', 0);
               break;
            case '2':
               $query->where('gioitinh', 1);
               break;
            default:
               break;
         }
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }

}
