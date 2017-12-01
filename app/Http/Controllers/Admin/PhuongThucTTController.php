<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Phuongthuctt;
use App\Http\Requests\ThemPhuongThucTTRequest;
use App\Http\Requests\SuaPhuongThucTTRequest;
use DateTime;

class PhuongThucTTController extends Controller
{
   public function getAllList()
   {
   	$data = [
   		'all_phuongthuctt' => Phuongthuctt::where('trangthai', 1)->orWhere('trangthai', 2)->get(),
         'da_xoa' => Phuongthuctt::where('trangthai', 0)->count(),
   	];
   	return view('admin.phuongthuctt.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_phuongthuctt' => Phuongthuctt::where('trangthai', 0)->get(),
      ];
      return view('admin.phuongthuctt.thungrac', $data);
   }

   public function getThem()
   {
   	return view('admin.phuongthuctt.them');
   }

   public function postThem(ThemPhuongThucTTRequest $request)
   {
      $phuongthuctt = new Phuongthuctt;
      $phuongthuctt->tenphuongthuc = $request->tenphuongthuc;
      $phuongthuctt->trangthai = $request->trangthai;
      $phuongthuctt->huongdan = $request->huongdan;
      $phuongthuctt->save();
      return redirect()->back()->with('thongbao', 'Thêm phương thức thanh toán thành công');
   }

   public function getSua($id)
   {
      $data = [
         'phuongthuctt' => Phuongthuctt::findOrFail($id)
      ];
      return view('admin.phuongthuctt.sua', $data);
   }

   public function postSua($id, SuaPhuongThucTTRequest $request)
   {
      $phuongthuctt = Phuongthuctt::findOrFail($id);
      $phuongthuctt->tenphuongthuc = $request->tenphuongthuc;
      $phuongthuctt->trangthai = $request->trangthai;
      $phuongthuctt->huongdan = $request->huongdan;
      $phuongthuctt->updated_at = new DateTime;
      $phuongthuctt->save();
      return redirect()->route('listPhuongThucTT')->with('thongbao', 'Thêm phương thức thanh toán thành công');
   }
}
