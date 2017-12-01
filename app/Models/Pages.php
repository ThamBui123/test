<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;
use DB;

class Pages extends Model
{
   protected $table = 'pages';

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'pages.id';
      $orderBy = 'desc';
      $query = DB::table('pages');
      $query->where('pages.trangthai', 1);
      
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
