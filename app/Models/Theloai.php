<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class Theloai extends Model
{
   protected $table = 'theloai';

   public function sanpham($request)
   {
      $query = $this->hasMany('App\Models\Sanpham');

      $pagination = Config::get('settings.products_pages');
      $orderby = 'desc';
      $sortby = 'sanpham.id';
      $query->where('sanpham.trangthai', 1);
      $sale = false;
      if ($request->has('orderby')){
         switch ($request->orderby) {
            case 'asc':
               $orderby = 'asc';
               break;
            case 'desc':
               $orderby = 'desc';
               break;
            default:
               $orderby = 'desc';
               break;
         }
      }

      if ($request->has('sortby')){
         $sortby = '';
         switch ($request->sortby) {
            case 'name':
               $sortby = 'tensanpham';
               break;
            case 'price':
               $sortby = 'giasanpham';
               break;
            case 'sale':
               $sale = true;
               $sortby = 'giasanpham';
               break;
            default:
               $sortby = 'sanpham.id';
               break;
         }
      }

      $query->orderBy($sortby,  $orderby);

      if($request->has('price_from'))
      {
         $price_from = str_replace('.','', $request->price_from);
         $query->where('giasanpham', '>=', intval($price_from));
      }

      if($request->has('price_to'))
      {
         $price_to = str_replace('.','', $request->price_to);
         $query->where('giasanpham', '<=', intval($price_to));
      }

      if($request->has('show') && intval($request->show) > 0)
      {
         $pagination = $request->show;
      }

      if($sale == true)
      {
         $query->where('giamgiasanpham' , '>', 0);
      }

      return $query->paginate($pagination);
   }

   // public function nhomsanpham()
   // {
   //    return $this->belongsTo('App\Models\Nhomsanpham');
   // }

   public static function findBySlug($slug)
   {
      return Theloai::where('slugtl', $slug)
         ->where('trangthai', 1)
         ->firstOrFail();
   }

   public static function tongso_theloai()
   {
      return Theloai::where('trangthai', 1)->count();
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'theloai.id';
      $orderBy = 'desc';
      $query = DB::table('theloai');
      $query->where('trangthai', 1);

      if($request->has('hienthi') && $request->hienthi > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }
      
      if($request->has('tentheloai'))
      {
         $query->where('tentheloai', 'like', "%$request->tentheloai%");
      }

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }

}
