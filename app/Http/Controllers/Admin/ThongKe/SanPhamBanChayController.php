<?php

namespace App\Http\Controllers\Admin\ThongKe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;

class SanPhamBanChayController extends Controller
{
   public function getListSanPhamBanChay(Request $request)
   {
   	$input_date = $request->data;
		$arr_date = explode('-', $input_date);

   	$dieukienloc = 'ngày ' .date('d'). ' tháng ' .date('m'). ' năm ' .date('Y');

   	switch ($request->typeof) {
   		case '1':
   			$dieukienloc = 'ngày ' .$arr_date[0]. ' tháng ' .$arr_date[1]. ' năm ' .$arr_date[2];
   			break;
   		case '2':
   			$dieukienloc = 'tháng ' .$arr_date[1]. ' năm ' .$arr_date[2];
   			break;
			case '3':
   			$dieukienloc = 'năm ' .$arr_date[2];
   			break;
   		default:
   			break;
   	}

   	$soluongban = $request->soluongban ? $request->soluongban : 1;

   	$data = [
	   	'sanphambanchay' => $this->get_data($request, $soluongban),
	   	'dieukienloc' => $dieukienloc,
	   	'soluongban' => $soluongban,
   	];

   	return view('admin.thongke.sanphambanchay', $data);
   }

   private function get_data($request, $soluongban)
   {
   	$pagination = Config::get('settings.admin_pages');
      $query = DB::table('chitietdonhang')
      ->select('sanpham.id', 'sanpham.tensanpham', 'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham', 'sanpham.masanpham' , DB::raw('SUM(chitietdonhang.soluong) as total_sales'), DB::raw('SUM(chitietdonhang.soluong * chitietdonhang.giaban) as total_price'));

      $query->join('sanpham', 'sanpham.id', '=', 'chitietdonhang.sanpham_id');
      $query->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id');
      $query->where('sanpham.trangthai', 1);

      if($request->has('sosanphambanra'))
      {
         $soluongban = $request->soluongban;
      }

      $query->havingRaw('SUM(chitietdonhang.soluong) >=' .$soluongban);
      $query->orderBy('total_sales', 'desc');
      $query->groupBy('sanpham.id');
      $query->groupBy('sanpham.id', 'sanpham.tensanpham',  'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham', 'sanpham.masanpham');

      if($request->has('tensanpham'))
      {
         $query->where('sanpham.tensanpham', 'like', "%$request->tensanpham%");
      }

      if($request->has('masanpham'))
      {
         $query->where('sanpham.masanpham', 'like', "%$request->masanpham%");
      }

      if($request->has('sosanpham') && intval($request->sosanpham) > 0)
      {
         $pagination = $request->sosanpham;
      }

      $typeof = $request->typeof;
      if($request->has('data'))
      {
			$input_date = $request->data;
			$arr_date = explode('-', $input_date);
			$ngay = $arr_date[0];
			$thang = $arr_date[1];
			$nam = $arr_date[2];
			$ngaythangnam = $nam.'-'.$thang.'-'.$ngay; 
		}

      switch ($typeof) {
   		case '1':
   			$query->whereDate('donhang.ngaynhan', $ngaythangnam);
				$query->whereMonth('donhang.ngaynhan', $thang);
				$query->whereYear('donhang.ngaynhan', $nam);
   			break;
   		case '2':
   			$query->whereMonth('donhang.ngaynhan', $thang);
   			$query->whereYear('donhang.ngaynhan', $nam);
   			break;
			case '3':
   			$query->whereYear('donhang.ngaynhan', $nam);
   			break;
   		default:
				$query->whereMonth('donhang.ngaynhan', date('m'));
				$query->whereYear('donhang.ngaynhan', date('y'));
   			break;
   	}

      $query->whereNotNull('donhang.ngaynhan');
      $thongke = $query->get();
      $tongso_daban = 0;
      $tongtien = 0;

      foreach ($thongke as $sanpham) {
         $tongso_daban += $sanpham->total_sales;
         $tongtien += $sanpham->total_price;
      }

      $data = [
         'data' => $query->paginate($pagination),
         'tongtien' => $tongtien,
         'tongso_daban' => $tongso_daban
      ];

      return $data;
   }
}
