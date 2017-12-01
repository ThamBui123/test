<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DangKyRequest;
use App\Models\Khachhang;
use App\Models\Facebookkhachhang;
use Auth;
use Hash;
use Cart;
use Socialite;

class XacThucController extends Controller
{

   public function __construct()
   {
      $this->middleware('guest', ['except' => 'getDangXuat']);
   }


   public function getDangNhap()
   {
   	return view('site.common.dangnhap');
   }

   public function getModelDangNhap()
   {
      return view('site.common.modeldangnhap');
   }

   public function postDangNhap(Request $request)
   {
      $email = $request->email;
      $password = $request->password;
      $login = [
         'email' => $email, 
         'password' => $password, 
         'trangthai' => 1,
         'loaikh' => 1,
      ];

      $remember = !empty($request->remember) ? true : false;

      if (Auth::attempt($login, $remember)) {

      	// if(!Cart::instance('shopping')->content()->isEmpty())
      	// {
      	// 	if(Auth::check())
      	// 		return redirect()->route('getThanhToanGioHang')->with('thongbao', 'Đăng nhập tài khoản của bạn thành công');
      	// }
         $this->load_cart_khachhang_from_database();

         return redirect()->back()->with('thongbao', 'Đăng nhập tài khoản của bạn thành công');
      } else {
         return redirect()->route('getDangNhap')->with('thongbao', 'Tài khoản không hợp lệ')->with('danger', 'true');
      }
   }

   private function load_cart_khachhang_from_database()
   {
      if(Auth::check() && Cart::instance('shopping')->content()->isEmpty())
      {
         // dd($this);
         $giohang_dangco = get_giohang_khachhang();
         if($giohang_dangco)
         {
            // dd($giohang_dangco->chitietgiohang);
            foreach ($giohang_dangco->chitietgiohang as $chitiet) {
               $data_cart = [
                     'id' => $chitiet->sanpham_id,
                     'name' => $chitiet->sanpham->tensanpham,
                     'price' => $chitiet->sanpham->giasanpham,
                     'qty' => $chitiet->soluongdat,
                     'options' => [
                        'muatruoc' => 0,
                     ],
                 ];
                  
                 Cart::instance('shopping')->add($data_cart)->associate('App\Models\Sanpham');
            }
         }
      }
   }

   public function getDangXuat()
   {
      Auth::logout();
      Cart::instance('shopping')->destroy();
      return redirect()->route('home')->with('thongbao', 'Đăng xuất tài khoản của bạn thành công');
   }

   public function getDangKy()
   {
      if(Auth::check())
         return redirect()->route('home');
   	return view('site.common.dangky');
   }

   public function postDangKy(DangKyRequest $request)
   {
   	$khachhang = new Khachhang;
   	$khachhang->hovaten = $request->hovaten;
   	$khachhang->diachi = $request->diachi;
   	$khachhang->gioitinh = $request->gioitinh;
   	$khachhang->ngaysinh = dinh_dang_ngay_mysql($request->ngaysinh);
   	$khachhang->email = $request->email;
   	$khachhang->sodienthoaikh = $request->sodienthoaikh;
   	$khachhang->password = Hash::make($request->password);
      $khachhang->loaikh = 1;
   	$khachhang->save();
   	return redirect()->route('home')->with('thongbao', 'Đăng ký tài khoản của bạn thành công');
   }

   public function redirectToFacebook()
   {
      return Socialite::driver('facebook')
         ->redirect();
   }

   public function handleFacebookCallback()
   {
      try
      {
         $userSocial = Socialite::with('facebook')->user();
         
         $khachhang = Khachhang::where('email', $userSocial['email'])->first();

         if(!$khachhang)
         {
            $khachhang_moi = new Khachhang;
            $khachhang_moi->hovaten = $userSocial['name'];
            $khachhang_moi->email = $userSocial['email'];
            $gioitinh = 1;
            if($userSocial->user['gender'])
               $gioitinh = $userSocial->user['gender'] == 'male' ? 1 : 0;
            $khachhang_moi->gioitinh = $gioitinh;
            $khachhang_moi->loaikh = 2;
            $khachhang_moi->save();

            $facebook = new Facebookkhachhang;
            $facebook->facebook_id = $userSocial->getId();
            $facebook->khachhang_id = $khachhang_moi->id;
            $facebook->save();

            Auth::login($khachhang_moi);
            
            return redirect()->route('getThongTin')->with('thongbao', 'Đăng ký tài khoản của bạn thành công hãy cập nhật thông tin của bạn để tiến hành đặt hàng');
         }
         else
         {
         	if(empty($khachhang->facebook))
         	{
         		$facebook = new Facebookkhachhang;
	            $facebook->facebook_id = $userSocial->getId();
	            $facebook->khachhang_id = $khachhang->id;
	            $facebook->save();
         	}

         	Auth::login($khachhang);

	         return redirect()->back()->with('thongbao', 'Đăng nhập tài khoản của bạn thành công');
         }
         
      } catch (Exception $e) {
         return redirect('login/facebook');
      }
   }
}
