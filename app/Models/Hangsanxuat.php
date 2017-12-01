<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class Hangsanxuat extends Model
{
   protected $table = 'hangsanxuat';

   public function sanpham()
   {
      return $this->hasMany('App\Models\Sanpham');
   }

   public function sosanpham()
   {
   	return DB::table('sanpham')->where('hangsanxuat_id', $this->id)
         ->where('trangthai', 1)
         ->count();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'hangsanxuat.id';
      $orderBy = 'desc';
      $query = DB::table('hangsanxuat');
      $query->where('trangthai', 1);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('tenhang'))
      {
         $query->where('tenhang', 'like', "%$request->tenhang%");
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }
}
