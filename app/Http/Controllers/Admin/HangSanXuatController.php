<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Hangsanxuat;
use App\Http\Requests\SuaHangSanXuatRequest;
use App\Http\Requests\ThemHangSanXuatRequest;
use DateTime;
use DB;
use Config;
use File;

class HangSanXuatController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_hangsanxuat' => Hangsanxuat::get_data($request),
         'da_xoa' => Hangsanxuat::where('trangthai', 0)->count(),
    	];
   	return view('admin.hangsanxuat.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 0)->get(),
      ];
      return view('admin.hangsanxuat.thungrac', $data);
   }

   public function getSua($id)
   {
   	$data = [
   	   'hangsanxuat' => Hangsanxuat::findOrFail($id),
	   ];
   	return view('admin.hangsanxuat.sua', $data);
   }

   public function postSua($id, SuaHangSanXuatRequest $request)
   {
   	$logohang = $request->logohang;
   	$hangsanxuat = Hangsanxuat::findOrFail($id);
   	$hangsanxuat->tenhang = $request->tenhang;
   	if(count($logohang) > 0)
   	{
         if(file_exists(public_path() . '/uploads/hangsanxuat/' . $hangsanxuat->logohang))
         {
            File::delete(public_path() . '/uploads/hangsanxuat/' . $hangsanxuat->logohang);
         }
         
   		$file_logohang = time() . '-' . $logohang->getClientOriginalName();
         $file_save = md5($file_logohang) . '.' . $logohang->getClientOriginalExtension();
   		$hangsanxuat->logohang = $file_save;
   		$path = public_path() . '/uploads/hangsanxuat/';
   		$request->file('logohang')->move($path, $file_save);
   	}

      $hangsanxuat->slughsx = str_slug($request->tenhang);
      $hangsanxuat->trangthai = $request->trangthai;
      $hangsanxuat->updated_at = new DateTime;
   	$hangsanxuat->save();
   	return redirect()->route('listHangSanXuat')->with('thongbao', 'Sửa hãng sản xuất thành công');
   }

   public function getThem()
   {
   	return view('admin.hangsanxuat.them');
   }

   public function postThem(ThemHangSanXuatRequest $request)
   {
   	$logohang = $request->logohang;
   	$hangsanxuat = new Hangsanxuat;
   	$hangsanxuat->tenhang = $request->tenhang;
		$file_logohang = time() . '-' . $logohang->getClientOriginalName();
      $file_save = md5($file_logohang) . '.' . $logohang->getClientOriginalExtension();
		$hangsanxuat->logohang = $file_save;
		$path = public_path() . '/uploads/hangsanxuat/';
		$request->file('logohang')->move($path, $file_save);
      $hangsanxuat->slughsx = str_slug($request->tenhang);
      $hangsanxuat->trangthai = $request->trangthai;
   	$hangsanxuat->save();
   	return redirect()->back()->with('thongbao', 'Thêm hãng sản xuất thành công');
   }
}
