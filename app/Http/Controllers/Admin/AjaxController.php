<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Theloai;
use DB;

class AjaxController extends Controller
{
   public function postSanPhamTheoHSX(Request $request)
   {
   	$hangsanxuat_id = $request->hangsanxuat_id;
   	if($hangsanxuat_id > 0)
   	{
	   	$all_sanpham = Sanpham::where('hangsanxuat_id', $hangsanxuat_id)
   		->get();
         
         return view('admin.ajax.sanpham_hsx', ['all_sanpham' => $all_sanpham]);
   	}
   }

   public function getListSanPhamAjax(Request $request)
   {
      if($request->ajax())
      {
         if($request->has('key_search'))
         {
            $key_search = $request->key_search;
            $list_sanpham = DB::table('sanpham')
            ->where('tensanpham', 'like', "%{$key_search}%")->get();
            $results = [];

            foreach ($list_sanpham as $sanpham) {
               $results[] = [
                  'id' => $sanpham->id,
                  'text' => $sanpham->tensanpham,
                  'slugsp' => $sanpham->slugsp,
               ];
            }
            
            return response()->json($results);
         }

         if($request->has('sanpham_id'))
         {
            $sanpham_id = $request->sanpham_id;
            if(intval($sanpham_id) == 0)
               return;
            $list_sanpham = DB::table('sanpham')
               ->where('id', $sanpham_id)->get();
            $results = [];

            foreach ($list_sanpham as $sanpham) {
               $results[] = [
                  'id' => $sanpham->id,
                  'text' => $sanpham->tensanpham,
                  'slugsp' => $sanpham->slugsp,
               ];
            }
            
            return response()->json($results);
         }
      }
   }

   public function autoCompleteSanPham(Request $request)
   {
      if($request->ajax())
      {
         if($request->has('term'))
         {
            $key_search = $request->term;
            $theloai_id = $request->theloai_id;
            $list_sanpham = DB::table('sanpham')
                  ->where('tensanpham', 'like', "%{$key_search}%")
                  ->get();

            $results = [];
            foreach ($list_sanpham as $sanpham) {
               $label = $sanpham->tensanpham;
               $desc = str_limit($sanpham->gioithieungan, 100);
               $img = asset('uploads/anhsanpham/' .$sanpham->anhsanpham);
               $sanpham_id = $sanpham->id;
               $results[] = array(
                  'label' => $label,
                  'value' => $label,
                  'desc' => $desc,
                  'img' => $img,
                  'lienket' => route('getChiTietSanPham', $sanpham->slugsp)
               );
            }
            return response()->json($results);
         }
      }
   }
}
