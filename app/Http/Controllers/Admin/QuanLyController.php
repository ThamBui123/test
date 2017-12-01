<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\Binhluan;
use App\Models\Sanpham;
use App\Models\Khachhang;
use App\Models\Theloai;
//use App\Models\Nhomsanpham;
use DB;
use Auth;
use App\Http\Requests\CapNhatThongTinCuaHang;

class QuanLyController extends Controller
{
   function getQuanLy()
   {
      $all_donhang = Donhang::where('trangthai', 1)
         ->where('tinhtrangdonhang', '<>', 2)
         ->orderBy('id', 'desc')
         ->orderBy('tinhtrangdonhang', 'desc')
         ->limit(10)->get();

      $all_binhluan = Binhluan::where('trangthai', 1)
         ->where('daxem', 0)->limit(10)->get();

      $tongso_donhang = Donhang::tongso_donhang();
      $tongso_sanpham = Sanpham::tongso_sanpham();
      $tongso_theloai = Theloai::tongso_theloai();
      $tongso_binhluan = Binhluan::tongso_binhluan();
      $tongso_khachhang = Khachhang::tongso_khachhang();
     // $tongso_nhomsanpham = Nhomsanpham::tongso_nhomsanpham();

   	$data = [
         'all_donhang' => $all_donhang,
         'all_binhluan' => $all_binhluan,
         'tongso_binhluan' => $tongso_binhluan,
         'tongso_donhang' => $tongso_donhang,
         'tongso_sanpham' => $tongso_sanpham,
         'tongso_theloai' => $tongso_theloai,
         'tongso_khachhang' => $tongso_khachhang,
        // 'tongso_nhomsanpham' => $tongso_nhomsanpham,
         'doanhthu_ngay' => $this->get_data_doanhthu(date('m'), date('Y')),
      ];

   	return view('admin.common.quanly', $data);
   }

   public function getCaiDat()
   {
      $cuahang = DB::table('cuahang')->first();

   	return view('admin.common.caidat', 
      [
         'cuahang' => $cuahang
      ]);
   }

   public function postCaiDat(CapNhatThongTinCuaHang $request)
   {
      $cuahang = [
         'tencuahang' => $request->tencuahang,
         'sodienthoai' => $request->sodienthoai,
         'diachi' => $request->diachi,
         'email' => $request->email,
         'gioithieu' => $request->gioithieu
      ];

      DB::table('cuahang')
         ->update($cuahang);

      return redirect()->back()->with('thongbao', 'Cập nhật thông tin của hàng thành công');
   }

   public function ajaxDoanhThu(Request $request)
   {
      $thang = ($request->thang > 12 || $request->thang < 0) ? date('m') : $request->thang;
      $nam = ($request->nam < 0) ? date('Y') : $request->nam;

      $data = [
         'doanhthu_ngay' => $this->get_data_doanhthu($thang, $nam)
      ];

      return view('admin.ajax.doanhthu', $data);
   }

   private function get_data_doanhthu($thang, $nam)
   {
      $query_doanhthu = DB::table('chitietdonhang')
      ->select(
         DB::raw('SUM(chitietdonhang.soluong * chitietdonhang.giaban) as total_price'),
         DB::raw('day(donhang.ngaynhan) AS OrderDay')
      );

      $query_doanhthu->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id');

      $query_doanhthu->whereMonth('donhang.ngaynhan', $thang);
      $query_doanhthu->whereYear('donhang.ngaynhan', $nam);

      $query_doanhthu->whereNotNull('donhang.ngaynhan');
      $query_doanhthu->groupBy('OrderDay');
      $query_doanhthu->orderBy('ngaynhan');
      $thongke = $query_doanhthu->get();
      $tongtien = 0;


      foreach ($thongke as $sanpham) {
         $tongtien += $sanpham->total_price;
      }

      $data = [
         'tongtien' => $tongtien,
         'data' => $thongke,
         'thang' => $thang,
         'nam' => $nam,
      ];

      return $data;
   }
}
