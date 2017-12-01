<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Theloai;
use App\Models\Hangsanxuat;
// use App\Models\Nhomsanpham;
use App\Models\Sanpham;
use DB;
use Config;

class TheLoaiController extends Controller
{
   
   public function getTheLoai($slugtl, Request $request)
   {
      $categories = explode('/', $slugtl);
      $slug = array_pop($categories);
      
   	$theloai = Theloai::findBySlug($slugtl);

      $theloai_con = Theloai::where(['parent_id' => $theloai->id, 'trangthai' => 1])->get();
      $all_sanpham = $theloai->sanpham($request);

      $all_hangsanxuat = $this->get_data_hangsanxuat($theloai->id);

      $all_khuyenmai = $this->get_data_khuyenmai($theloai->id);

   	$data = [
	   	'all_sanpham' => $all_sanpham,
	   	'theloai'	  => $theloai,
         'list_theloai_con' => $theloai_con,
         'all_hangsanxuat'  => $all_hangsanxuat,
         'list_khuyenmai'   => $all_khuyenmai,
   	];
      
   	return view('site.sanpham.theloai', $data);
   }

   private function get_data_hangsanxuat($theloai_id)
   {
      $query = DB::table('sanpham')
         ->select('sanpham.hangsanxuat_id')
         ->where('theloai_id', $theloai_id)
         ->distinct('sanpham.hangsanxuat_id');

      $all_hangsanxuat = [];

      foreach ($query->get() as $value) {
         array_push($all_hangsanxuat, $value->hangsanxuat_id);
      }

      return $all_hangsanxuat;
   }

   private function get_data_khuyenmai($theloai_id)
   {
      $query = DB::table('sanpham')
         ->select('sanpham.theloai_id')
         ->where('theloai_id', $theloai_id)
         ->distinct('sanpham.theloai_id');

      $all_khuyenmai = [];

      foreach ($query->get() as $value) {
         array_push($all_khuyenmai, $value->theloai_id);
      }

      return $all_khuyenmai;
   }
}
