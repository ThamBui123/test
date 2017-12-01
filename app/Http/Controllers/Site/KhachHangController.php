<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\Khachhang;
use App\Models\Chitietuathich;
use Auth;
use App\Http\Requests\UpdateThongTinKhachHang;
use Hash;
use DB;
use Config;

class KhachHangController extends Controller
{
   public function getTaiKhoan()
   {
   	$khachhang_id = Auth::user()->id;
      $khachhang = Khachhang::findOrFail($khachhang_id);
   	$data = [
   		'donhang_khachhang' => $khachhang->donhang(),
   	];

   	return view('site.khachhang.dashboard', $data);
   }

   public function getDonHang()
   {
      $khachhang_id = Auth::user()->id;
      $khachhang = Khachhang::findOrFail($khachhang_id);
      $data = [
         'donhang_khachhang' => $khachhang->donhang(),
      ];

      return view('site.khachhang.donhang', $data);
   }

   

   public function getChiTietDonHang($madonhang)
   {
      $donhang = Donhang::where('madonhang', $madonhang)
         ->where('khachhang_id', Auth::user()->id)
         ->first();
         
      if(!$donhang)
      {
         abort(404);
      }

      $data = [
         'donhang' => $donhang,
      ];

      return view('site.khachhang.chitietdonhang', $data);
   }

   public function getThongTin()
   {
   	$khachhang_id = Auth::user()->id;
      $khachhang = Khachhang::findOrFail($khachhang_id);
   	$data = [
         'khachhang' => $khachhang,
   	];

   	return view('site.khachhang.thongtin', $data);
   }

   public function postUpdateThongTin(UpdateThongTinKhachHang $request)
   {
      $khachhang_id = Auth::user()->id;
      $khachhang = Khachhang::findOrFail($khachhang_id);
      if($request->has('matkhaucu') || $request->has('matkhaumoi'))
      {
         $matkhaucu = $request->matkhaucu;
         if (Hash::check($matkhaucu, $khachhang->password)) {
            $khachhang->password = Hash::make($request->matkhaumoi);
         }
         elseif($khachhang->loaikh == 2)
         {
            $khachhang->loaikh = 1;
            $khachhang->password = Hash::make($request->matkhaumoi);
         }
         else
         {
            return redirect()
               ->back()
               ->withErrors(['matkhaucu' => 'Mật khẩu cũ không khớp']);
         }
      }

      $khachhang->hovaten = $request->hovaten;
      $khachhang->diachi = $request->diachi;
      $khachhang->gioitinh = $request->gioitinh;
      $khachhang->ngaysinh = dinh_dang_ngay_mysql($request->ngaysinh);
      $khachhang->email = $request->email;
      $khachhang->sodienthoaikh = $request->sodienthoaikh;
      $khachhang->save();
      return redirect()->back()->with('thongbao', 'Cập nhật thông tin cá nhân thành công');
   }

   public function getYeuThich()
   {
   	$khachhang_id = Auth::user()->id;
   	$khachhang = Khachhang::findOrFail($khachhang_id);
   	$data = [
   		'list_chitietuathich' => $khachhang->yeuthich(),
   	];

   	return view('site.khachhang.yeuthich', $data);
   }
}
