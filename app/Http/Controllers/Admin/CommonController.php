<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Nhanvien;
use App\Http\Requests\UpdateThongTinCaNhan;
use Hash;

class CommonController extends Controller
{
   public function getThongTinCaNhan()
   {
   	$data = [
	   	'thongtin' => Auth::guard('nhanvien')->user(),
   	];
   	return view('admin.common.thongtincanhan', $data);
   }

   public function postUpdateThongTinCaNhan(UpdateThongTinCaNhan $request)
   {
   	$nhanvien_id = Auth::guard('nhanvien')->id();
   	$nhanvien = Nhanvien::findOrFail($nhanvien_id);
   	if($request->has('matkhaucu'))
      {
         $matkhaucu = $request->matkhaucu;
         if (Hash::check($matkhaucu, $nhanvien->password)) {
            $nhanvien->password = Hash::make($request->matkhaumoi);
         }
         else
         {
            return redirect()
               ->back()
               ->withErrors(['mật khẩu cũ không khớp']);
         }
      }
   	
   	$nhanvien->hovaten = $request->hovaten;
   	$nhanvien->gioitinh = $request->gioitinh;
   	$nhanvien->ngaysinh = dinh_dang_ngay_mysql($request->ngaysinh);
   	$nhanvien->diachi = $request->diachi;
   	$nhanvien->email = $request->email;
   	$sodienthoainv = str_replace(' ', '', $request->sodienthoainv);
   	$sodienthoainv = str_replace('_', '', $sodienthoainv);
   	$nhanvien->sodienthoainv = $sodienthoainv;
   	$nhanvien->save();
   	return redirect()->route('getThongTinCaNhan')->with('thongbao', 'Cập nhật thông tin thành công');
   }
}
