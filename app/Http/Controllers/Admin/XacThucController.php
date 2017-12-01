<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class XacThucController extends Controller
{

   public function __construct()
   {
      $this->middleware('checknhanvien', ['except' => 'getDangXuat']);
   }

   public function getDangNhap()
   {
   	return view('admin.auth.dangnhap');
   }

   public function postDangNhap(Request $request)
   {
      $email = $request->email;
      $password = $request->password;
      $login = [
         'email' => $email, 
         'password' => $password, 
         'trangthai' => 1,
      ];

      if (Auth::guard('nhanvien')->attempt($login)) {
         return redirect()->route('dashboard')->with('thongbao', 'Đăng nhập tài khoản của bạn thành công');
      } else {
         return redirect()->back()->with('thongbao', 'Tài khoản không hợp lệ')->with('danger', 'true');
      }
   }

   public function getDangXuat()
   {
      Auth::guard('nhanvien')->logout();
      return redirect()->route('admin')->with('thongbao', 'Đăng xuất tài khoản của bạn thành công');
   }

}
