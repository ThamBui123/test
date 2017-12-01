<?php

namespace App\Http\Controllers\Admin\ThongKe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use DB;
use App\Models\Sanpham;

class LoiNhuanController extends Controller
{
   public function getLoiNhuan(Request $request)
   {
      $loai_thongke = 'Tất cả sản phẩm';
      
      if($request->has('sanpham') && intval($request->sanpham) > 0)
      {
         $sanpham = Sanpham::find($request->sanpham);
         $loai_thongke = $sanpham->tensanpham;
      }

   	$data = [
	   	'doanhthu' => $this->get_data_doanhthu($request),
	   	'nhaphang' => $this->get_data_nhaphang($request),
	   	'soluongtonkho' => $this->get_soluongtonkho(),
         'loai_thongke' => $loai_thongke
   	];
   	return view('admin.thongke.loinhuan', $data);
   }

   private function get_data_doanhthu($request)
   {
      $query_doanhthu = DB::table('chitietdonhang')
      ->select(
         DB::raw('SUM(chitietdonhang.soluong) as total_sales'), 
         DB::raw('SUM(chitietdonhang.soluong * chitietdonhang.giaban) as total_price'),
         DB::raw('YEAR(donhang.ngaynhan) as namdat'), 
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 1 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang1'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 2 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang2'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 3 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang3'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 4 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang4'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 5 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang5'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 6 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang6'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 7 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang7'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 8 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang8'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 9 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang9'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 10 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang10'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 11 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang11'),
         DB::raw('SUM(CASE WHEN MONTH(donhang.ngaynhan) = 12 THEN (chitietdonhang.soluong * chitietdonhang.giaban) ELSE 0 END) as thang12')
      );

      $query_doanhthu->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id');

      if($request->has('none_filter'))
      {
	      if($request->has('data_thang'))
	      {
	      	$query_doanhthu->whereMonth('donhang.ngaynhan', $request->data_thang);
	      }

	      if($request->has('data_nam'))
	      {
	      	$query_doanhthu->whereYear('donhang.ngaynhan', $request->data_nam);
	      }

	      if($request->has('data_tunam') && $request->has('data_dennam'))
	      {
	      	$data_tunam = $request->data_tunam;
   			$data_dennam = $request->data_dennam;
   			$query_doanhthu->whereYear('donhang.ngaynhan', '>=', $data_tunam);
				$query_doanhthu->whereYear('donhang.ngaynhan', '<=', $data_dennam);
	      }
      }
      else
      {
      	$year_select = date('Y');

      	if($request->has('data_tuthang'))
	      {
	      	$query_doanhthu->whereMonth('donhang.ngaynhan', '>=', $request->data_tuthang);
	      }

	      if($request->has('data_denthang'))
	      {
	      	$query_doanhthu->whereMonth('donhang.ngaynhan', '<=', $request->data_denthang);
	      }

	      if($request->has('data_nam'))
	      {
	      	$year_select = $request->data_nam;
	      }

	      $query_doanhthu->whereYear('donhang.ngaynhan', $year_select);
      }

      if($request->has('sanpham') && intval($request->sanpham) > 0)
      {
         $query_doanhthu->where('chitietdonhang.sanpham_id', $request->sanpham);
      }

      $query_doanhthu->whereNotNull('donhang.ngaynhan');
      $query_doanhthu->groupBy('namdat');
      $query_doanhthu->orderBy('namdat');
      $thongke = $query_doanhthu->get();
      $tongso_daban = 0;
      $tongtien = 0;

      foreach ($thongke as $sanpham) {
         $tongso_daban += $sanpham->total_sales;
         $tongtien += $sanpham->total_price;
      }
      


      $data = [
         'tongtien' => $tongtien,
         'tongso_daban' => $tongso_daban,
         'data' => $thongke
      ];

      return $data;
   }

   private function get_data_nhaphang($request)
   {
   	$query_nhaphang = DB::table('chitietnhaphang')
      ->select(DB::raw('SUM(chitietnhaphang.soluongnhap) as total_input'), DB::raw('SUM(chitietnhaphang.soluongnhap * chitietnhaphang.gianhap) as total_price'));

      $query_nhaphang->join('nhaphang', 'nhaphang.id', '=', 'chitietnhaphang.nhaphang_id');

      if($request->has('none_filter'))
      {
	      if($request->has('data_thang'))
	      {
	      	$query_nhaphang->whereMonth('nhaphang.ngaynhaphang', $request->data_thang);
	      }

	      if($request->has('data_nam'))
	      {
	      	$query_nhaphang->whereYear('nhaphang.ngaynhaphang', $request->data_nam);
	      }

	      if($request->has('data_tunam') && $request->has('data_dennam'))
	      {
	      	$data_tunam = $request->data_tunam;
   			$data_dennam = $request->data_dennam;
   			$query_nhaphang->whereYear('nhaphang.ngaynhaphang', '>=', $data_tunam);
				$query_nhaphang->whereYear('nhaphang.ngaynhaphang', '<=', $data_dennam);
	      }
      }
      else
      {
      	$year_select = date('Y');

      	if($request->has('data_tuthang'))
	      {
	      	$query_nhaphang->whereMonth('nhaphang.ngaynhaphang', '>=', $request->data_tuthang);
	      }

	      if($request->has('data_denthang'))
	      {
	      	$query_nhaphang->whereMonth('nhaphang.ngaynhaphang', '<=', $request->data_denthang);
	      }

	      if($request->has('data_nam'))
	      {
	      	$year_select = $request->data_nam;
	      }

	      $query_nhaphang->whereYear('nhaphang.ngaynhaphang', $year_select);
      }

      if($request->has('sanpham') && intval($request->sanpham) > 0)
      {
         $query_nhaphang->where('chitietnhaphang.sanpham_id', $request->sanpham);
      }

      $thongke = $query_nhaphang->get();
      $tongso_nhaphang = 0;
      $tongtien = 0;

      foreach ($thongke as $sanpham) {
         $tongso_nhaphang += $sanpham->total_input;
         $tongtien += $sanpham->total_price;
      }

      $data = [
         'tongtien' => $tongtien,
         'tongso_nhaphang' => $tongso_nhaphang
      ];

      return $data;
   }

   private function get_soluongtonkho()
   {
   	return DB::table('sanpham')->sum('soluongsanpham');
   }
}
