<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Config;
use DB;
use Auth;
use App\Notifications\KhoiPhucMatKhauAdmin;

class Nhanvien extends Authenticatable
{
	use Notifiable;
   protected $table = 'nhanvien';
   
   protected $fillable = [
      'hovaten', 'email', 'password',
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   public function sendPasswordResetNotification($token)
   {
      $this->notify(new KhoiPhucMatKhauAdmin($token));
   }

   public function hovaten()
   {
   	return $this->hovaten;
   }

   public function manhanvien()
   {
   	return $this->manhanvien;
   }

   public function nhomquyen()
   {
      return $this->belongsTo('App\Models\Nhomquyen');
   }

   public function quyentruycap($nhomquyen)
   {
      if(is_array($nhomquyen))
      {
         foreach ($nhomquyen as $quyen) {
            if($this->check_quyen($quyen))
            {
               return true;
            }
         }
      }
      else
      {
         if($this->check_quyen($nhomquyen))
         {
            return true;
         }
      }

      return false;
   }

   private function check_quyen($nhomquyen)
   {
      if($this->nhomquyen()->where('key', $nhomquyen)->first())
      {
         return true;
      }

      return false;
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'nhanvien.id';
      $orderBy = 'desc';
      $query = Nhanvien::select('*');
      $query->where('nhanvien.trangthai', 1);
      $auth_login = Auth::guard('nhanvien')->id();
      $query->where('nhanvien.id', '<>', $auth_login);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }
         
      if($request->has('manhanvien'))
      {
         $query->where('manhanvien', 'like', "%$request->manhanvien%");
      }

      if($request->has('hovaten'))
      {
         $query->where('hovaten', 'like', "%$request->hovaten%");
      }

      if($request->has('sodienthoainv'))
      {
         $query->where('sodienthoainv', 'like', "%$request->sodienthoainv%");
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
