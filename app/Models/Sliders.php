<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;

class Sliders extends Model
{
   protected $table = 'sliders';

   public static function leftSliders()
   {
   	return Sliders::where('trangthai', 1)
         ->where('vitri', 1)
         ->get();
   }

   public static function rightSliders()
   {
   	return Sliders::where('trangthai', 1)
         ->where('vitri', 2)
         ->orderBy('id', 'desc')
         ->limit(2)
         ->get();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'sliders.id';
      $orderBy = 'desc';
      $query = DB::table('sliders');
      $query->where('sliders.trangthai', 1);
      
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
