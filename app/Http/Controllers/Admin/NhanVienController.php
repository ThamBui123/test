<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nhanvien;
use App\Models\Nhomquyen;
use App\Http\Requests\SuaNhanVienRequest;
use App\Http\Requests\ThemNhanVienRequest;
use Hash;
use DB;

class NhanVienController extends Controller
{
   public function getAllList(Request $request)
	{
		$data = [
   		'all_nhanvien' => Nhanvien::get_data($request),
   		'da_xoa' => Nhanvien::where('trangthai', 0)->count(),
   	];

   	return view('admin.nhanvien.index', $data);
	}

	public function getAllListThungRac()
   {
      $all_nhanvien = Nhanvien::where('trangthai', 0)
			->orderBy('id', 'desc')
			->get();

		$data = [
   		'all_nhanvien' => $all_nhanvien,
   		'da_xoa' => Nhanvien::where('trangthai', 0)->count(),
   	];

      return view('admin.nhanvien.thungrac', $data);
   }

   public function getSua($nhanvien_id)
   {
   	$nhanvien = Nhanvien::findOrFail($nhanvien_id);
      $nhomquyen = Nhomquyen::where('trangthai', 1)
         ->orderBy('id', 'desc')
         ->get();

   	$data = [
	   	'nhanvien' => $nhanvien,
         'all_nhomquyen' => $nhomquyen,
   	];

   	return view('admin.nhanvien.sua', $data);
   }

   public function postSua($nhanvien_id, SuaNhanVienRequest $request)
   {
   	$nhanvien = Nhanvien::findOrFail($nhanvien_id);
   	$nhanvien->manhanvien = $request->manhanvien;
   	$nhanvien->hovaten = $request->hovaten;
   	$nhanvien->gioitinh = $request->gioitinh;
   	$nhanvien->ngaysinh = dinh_dang_ngay_mysql($request->ngaysinh);
   	$nhanvien->diachi = $request->diachi;
   	$nhanvien->email = $request->email;
   	$sodienthoainv = str_replace(' ', '', $request->sodienthoainv);
   	$sodienthoainv = str_replace('_', '', $sodienthoainv);
   	$nhanvien->sodienthoainv = $sodienthoainv;
   	$nhanvien->save();
   	return redirect()->route('listNhanVien')->with('thongbao', 'Cập nhật thông tin nhân viên thành công');
   }

   public function getThem()
   {
      $nhomquyen = Nhomquyen::where('trangthai', 1)
         ->orderBy('id', 'desc')
         ->get();

      $data = [
         'all_nhomquyen' => $nhomquyen,
      ];

   	return view('admin.nhanvien.them', $data);
   }

   public function postThem(ThemNhanVienRequest $request)
   {
   	$nhanvien = new Nhanvien;
   	$nhanvien->manhanvien = $request->manhanvien;
   	$nhanvien->hovaten = $request->hovaten;
   	$nhanvien->gioitinh = $request->gioitinh;
   	$nhanvien->ngaysinh = dinh_dang_ngay_mysql($request->ngaysinh);
   	$nhanvien->diachi = $request->diachi;
   	$nhanvien->email = $request->email;
   	$nhanvien->password = Hash::make($request->matkhau);
   	$nhanvien->sodienthoainv = str_replace(' ', '', $request->sodienthoainv);
      $nhanvien->nhomquyen_id = $request->nhomquyen_id;
   	$nhanvien->save();
   	return redirect()->back()->with('thongbao', 'Thêm nhân viên mới thành công');
   }
}
