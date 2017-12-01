<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Uathich;
use App\Models\Chitietuathich;
use Auth;
use Cart;
use DB;
use Mail;
use App\Mail\ChiaSeSanPham;

class CongCuController extends Controller
{

   public function postAutoCompleteSanPham(Request $request)
   {
      if($request->has('term'))
      {
         $key_search = $request->term;
         $theloai_id = $request->theloai_id;
         if(intval($theloai_id) > 0)
         {
            $list_sanpham = DB::table('sanpham')
               ->where('theloai_id', $theloai_id)
               ->where('tensanpham', 'like', "%{$key_search}%")
               ->get();
         }
         else
         {
            $list_sanpham = DB::table('sanpham')
               ->where('tensanpham', 'like', "%{$key_search}%")
               ->get();
         }

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

   public function postAjaxTableSoSanh(Request $request)
   {
      $sanpham_id =  $request->sanpham_id;
      if($this->checkSanPhamSoSanh($sanpham_id))
      {
         return 'false';
      }

      if(count(Cart::instance('sosanh')->content()) == 3)
      {
         return 'false_more';
      }

      $this->themVaoSoSanh($sanpham_id);

      return view('site.blocks.sosanh.bangsosanh', ['list_tensanpham' => $this->listTenSanPhamSoSanh()]);
   }
}
