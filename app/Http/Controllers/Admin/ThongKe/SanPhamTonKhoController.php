<?php

namespace App\Http\Controllers\Admin\ThongKe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use Config;
use DB;

class SanPhamTonKhoController extends Controller
{
   public function getListSanPhamTonKho(Request $request)
   {
   	$data = [
	   	'sanphamtonkho' => $this->get_data($request),
   	];

   	return view('admin.thongke.sanphamtonkho', $data);
   }

   private function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $soluongton = 1;
      $query = DB::table('sanpham');
      $query->join('theloai', 'theloai.id', '=', 'sanpham.theloai_id');
      $query->orderBy('sanpham.id', 'desc');

      if($request->has('tensanpham'))
      {
         $query->where('sanpham.tensanpham', 'like', "%$request->tensanpham%");
      }

      if($request->has('masanpham'))
      {
         $query->where('sanpham.masanpham', 'like', "%$request->masanpham%");
      }

      if($request->has('soluongton') && intval($request->soluongton) > 0)
      {
         $soluongton = $request->soluongton;
         $query->where('sanpham.soluongsanpham', '>=', $soluongton);
      }

      return $query->paginate($pagination);
   }
}
