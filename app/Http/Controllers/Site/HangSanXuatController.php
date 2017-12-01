<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Theloai;
use App\Models\Hangsanxuat;
use App\Models\Nhomsanpham;
use App\Models\Sanpham;
use DB;
use Config;

class HangSanXuatController extends Controller
{
   public function getHangSanXuat($slughsx, Request $request)
   {
      $categories = explode('/', $slughsx);
      $slug = array_pop($categories);
      
   	$hangsanxuat = Hangsanxuat::where(['slughsx' => $slug, 'trangthai' => 1])->firstOrFail();
      $all_sanpham = $this->get_data($hangsanxuat->id, $request);

      $all_khuyenmai = $this->get_data_khuyenmai($hangsanxuat->id);

   	$data = [
	   	'all_sanpham' => $all_sanpham,
	   	'hangsanxuat'	  => $hangsanxuat,
         'list_khuyenmai'   => $all_khuyenmai,
   	];
      
   	return view('site.sanpham.hangsanxuat', $data);
   }

   private function get_data_khuyenmai($hangsanxuat_id)
   {
      $query = DB::table('sanpham')
         ->select('sanpham.theloai_id')
         ->where('hangsanxuat_id', $hangsanxuat_id)
         ->distinct('sanpham.theloai_id');

      $all_khuyenmai = [];

      foreach ($query->get() as $value) {
         array_push($all_khuyenmai, $value->theloai_id);
      }

      return $all_khuyenmai;
   }

   private function get_data($hangsanxuat_id, $request)
   {
      $query = DB::table('sanpham');
      $query->where('hangsanxuat_id', $hangsanxuat_id)->where('trangthai', 1);

      $pagination = Config::get('settings.site_pages');;
      $orderby = 'desc';
      $sortby = 'sanpham.id';
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
         $query->where('giasanpham', '>=', $price_from);
      }

      if($request->has('price_to'))
      {
         $price_to = str_replace('.','', $request->price_to);
         $query->where('giasanpham', '<=', $price_to);
      }

      if($request->has('show'))
      {
         $pagination = intval($request->show);
      }

      if($sale == true)
      {
         $query->where('giamgiasanpham' , '>', 0);
      }

      return $query->paginate($pagination);
   }
}
