<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Khachhang;
use Config;
use DB;

class KhachHangController extends Controller
{

	public function getAllList(Request $request)
	{
		$data = [
   		'all_khachhang' => Khachhang::get_data($request),
   		'da_xoa' => Khachhang::where('trangthai', 0)->count(),
   	];

   	return view('admin.khachhang.index', $data);
	}

	public function getAllListThungRac()
   {
      $all_khachhang = Khachhang::where('trangthai', 0)
			->orderBy('id', 'desc')
			->get();

		$data = [
   		'all_khachhang' => $all_khachhang,
   	];

      return view('admin.khachhang.thungrac', $data);
   }

   public function getLichSuMuaHang($khachhang_id)
   {
      $khachhang = Khachhang::findOrFail($khachhang_id);
      $data = [
         'donhang_khachhang' => $khachhang->donhang(),
         'khachhang' => $khachhang,
      ];

      return view('admin.khachhang.lichsumuahang', $data);
   }

}
