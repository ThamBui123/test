<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Phuongthucvc;
use App\Http\Requests\ThemPhuongThucVCRequest;
use App\Http\Requests\SuaPhuongThucVCRequest;
use DateTime;

class PhuongThucVCController extends Controller
{
   public function getAllList()
   {
   	$data = [
   		'all_phuongthucvc' => Phuongthucvc::where('trangthai', 1)->orWhere('trangthai', 2)->get(),
         'da_xoa' => Phuongthucvc::where('trangthai', 0)->count(),
   	];
   	return view('admin.phuongthucvc.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_phuongthucvc' => Phuongthucvc::where('trangthai', 0)->get(),
      ];
      return view('admin.phuongthucvc.thungrac', $data);
   }

   public function getThem()
   {
   	return view('admin.phuongthucvc.them');
   }

   public function postThem(ThemPhuongThucVCRequest $request)
   {
      $phuongthucvc = new Phuongthucvc;
      $phuongthucvc->tenvanchuyen = $request->tenvanchuyen;
      $phuongthucvc->thoigianvanchuyen = $request->thoigianvanchuyen;
      $phuongthucvc->phivanchuyen = $request->hidden_price;
      $phuongthucvc->trangthai = $request->trangthai;
      $phuongthucvc->save();
      return redirect()->back()->with('thongbao', 'Thêm phương vận chuyển thành công');
   }

   public function getSua($id)
   {
      $data = [
         'phuongthucvc' => Phuongthucvc::findOrFail($id)
      ];
      return view('admin.phuongthucvc.sua', $data);
   }

   public function postSua($id, SuaPhuongThucVCRequest $request)
   {
      $phuongthucvc = Phuongthucvc::findOrFail($id);
      $phuongthucvc->tenvanchuyen = $request->tenvanchuyen;
      $phuongthucvc->thoigianvanchuyen = $request->thoigianvanchuyen;
      $phuongthucvc->phivanchuyen = $request->hidden_price;
      $phuongthucvc->trangthai = $request->trangthai;
      $phuongthucvc->updated_at = new DateTime;
      $phuongthucvc->save();
      return redirect()->route('listPhuongThucVC')->with('thongbao', 'Thêm phương vận chuyển thành công');
   }
}
