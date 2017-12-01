<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Donhang;
use App\Models\Chitietdonhang;
use App\Models\Khachhang;
use App\Models\Magiamgia;
use App\Models\Phuongthucvc;
use App\Models\Phuongthuctt;
use App\Models\Giohang;
use App\Models\Chitietgiohang;
use Cart;
use App\Http\Requests\ThanhToanKhongDangKyRequest;
use DateTime;
use Auth;
use Session;
use Validator;
use Mail;
use DB;
use App\Mail\ThongBaoDonHang;

class GioHangController extends Controller
{
	public function getCart()
	{
      $list_phuongthucvc = Phuongthucvc::where('trangthai', 1)
         ->get();
      $list_phuongthuctt = Phuongthuctt::where('trangthai', 1)
         ->get();
      $data = [
         'list_phuongthucvc' => $list_phuongthucvc,
         'list_phuongthuctt' => $list_phuongthuctt,
      ];
      // Cart::instance('shopping')->destroy();
      return view('site.giohang.chitiet');
	}

   public function getThanhToan()
   {
   	if(Cart::instance('shopping')->content()->isEmpty() || !Auth::check())
   		return redirect()->route('home');
      return view('site.giohang.thanhtoan');
   }

   public function getBoxCart()
   {
      return view('site.giohang.box-cart');
   }

   public function getTableBoxCart()
   {
      return view('site.blocks.giohang.table-box-cart');
   }

   public function getModelCart()
   {
      return view('site.blocks.template.model-cart');
   }

   public function postUpdatePhuongthuc(Request $request)
   {
      if($request->phuongthucvc_id != 'df')
      {
         $phuongthucvc_id = $request->phuongthucvc_id;
         $phuongthucvc = Phuongthucvc::find($phuongthucvc_id);
         if(!$phuongthucvc)
            return redirect()->back();
         $phuongthucvc = [
            'phuongthucvc_id' => $phuongthucvc_id,
            'phivanchuyen' => $phuongthucvc->phivanchuyen,
            'thoigianvanchuyen' => $phuongthucvc->thoigianvanchuyen,
         ];

         Session::put('psty_phuongthucvc', $phuongthucvc);
      }
      else
      {
         if(Session::has('psty_phuongthucvc'))
         {
            Session::forget('psty_phuongthucvc');
         }
      }

      if($request->phuongthuctt_id != 'df')
      {
         $phuongthuctt_id = $request->phuongthuctt_id;
         $phuongthuctt = Phuongthuctt::find($phuongthuctt_id);
         if(!$phuongthuctt)
            return redirect()->back();
         $phuongthuctt = [
            'phuongthuctt_id' => $phuongthuctt_id,
            'tenphuongthuc' => $phuongthuctt->tenphuongthuc,
            'huongdan'     => $phuongthuctt->huongdan,
         ];

         Session::put('psty_phuongthuctt', $phuongthuctt);
      }
      else
      {
         if(Session::has('psty_phuongthuctt'))
         {
            Session::forget('psty_phuongthuctt');
         }
      }

      return redirect()->back()->with('thongbao', 'Áp dụng phương thức thành công');
   }

   public function getStep1()
   {
      if(!Cart::instance('shopping')->content()->isEmpty() && Auth::check())
         return redirect()->route('getThanhToanGioHang');
      if(Cart::instance('shopping')->content()->isEmpty() || Auth::check())
         return redirect()->route('home');

      return view('site.giohang.step1');
   }

   public function postStep1(Request $request)
   {
      $validator = Validator::make($request->all(), 
         [
         'sodienthoai' => 'required|min:10',
         'sodienthoai' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
         ], 
         ['Vui lòng nhập số điện thoại hợp lệ']
      );

      if ($validator->fails()) {
         return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
      }

      $khachhang = Khachhang::where('sodienthoaikh', $request->sodienthoai)->first();

      if($khachhang)
      {
         $khachhang_damua = [
            'hovaten' => $khachhang->hovaten,
            'diachi'  => $khachhang->diachi,
            'sodienthoaikh' => $khachhang->sodienthoaikh,
            'email' => $khachhang->email,
         ];

         Session::put('psty_sodienthoai', $request->sodienthoai);
         Session::put('psty_damuahang', $khachhang_damua);
         return redirect()->back()->with('damuahang', 'Số điện thoại này đã mua hàng trước đó bạn có muốn lấy lại thông tin này không'); 
      }
      else
      {
         Session::forget('psty_damuahang');
         Session::put('psty_checkdamua', false);
      }

      Session::put('psty_sodienthoai', $request->sodienthoai);
      return redirect()->route('getStep2');
   }

   public function getStep2()
   {
      if(Cart::instance('shopping')->content()->isEmpty() || Auth::check())
         return redirect()->route('home');
      if(!Session::has('psty_sodienthoai'))
         return redirect()->route('getStep1');
      return view('site.giohang.step2');
   }

   public function postStep2(ThanhToanKhongDangKyRequest $request)
   {
      $khachhang_id = 0;

      if(session('psty_checkdamua'))
      {
         $khachhang = Khachhang::where('sodienthoaikh', session('psty_sodienthoai'))->first();
         $khachhang_id = $khachhang->id;
      }
      else
      {
         $khachhang = new Khachhang;
         $khachhang->hovaten = $request->hovaten;
         $khachhang->sodienthoaikh = $request->sodienthoai;
         $khachhang->gioitinh = 0;
         $khachhang->diachi = $request->diachi;
         $khachhang->email = $request->email;
         $khachhang->loaikh = 0;
         $khachhang->save();
         $khachhang_id = $khachhang->id;
      }
      if($khachhang_id > 0)
         $this->thanhToan($khachhang_id, $request);
         return redirect()->route('home')->with('thongbao', 'Thanh toán giỏ hàng thành công');
      return redirect()->back();
   }


   public function postThanhToanDangKy(Request $request)
   {
      $this->thanhToan(Auth::user()->id, $request);

      return redirect()->route('home')->with('thongbao', 'Thanh toán giỏ hàng thành công');
   }

   public function getStep1Y()
   {
      Session::put('psty_checkdamua', true);
      return redirect()->route('getStep2');
   }

   public function getStep1N()
   {
      Session::put('psty_checkdamua', false);
      return redirect()->route('getStep2');
   }

   public function postCoupon(Request $request)
   {
      $coupon_code = $request->coupon_code;
      $coupon = Magiamgia::where('maso', $coupon_code)
      ->where('trangthai', 1)
      ->where('ngayhethan', '>=', date('Y-m-d H:i:s'))
      ->get();
      if(!$coupon->isEmpty())
      {
         $coupon_data = [
            'maso' => $coupon_code,
            'phantram' => $coupon[0]->phantramgiamgia,
         ];

         Session::put('psty_couponcode', $coupon_data);
         return redirect()->back()->with('coupon_code', 'Bạn đã nhập mã giảm giá thành công');
      }

      return redirect()->back()->with('coupon_code', 'Mã giảm giá này không hợp lệ');
   }

   private function thanhToan($khachhang_id, $request)
   {
      $donhang = new Donhang;
      $donhang->madonhang = time();
      $donhang->khachhang_id = $khachhang_id;
      $donhang->phuongthuctt_id = 1;
      $donhang->phuongthucvc_id = 1;
      $donhang->ngaydat = new DateTime;
      $donhang->ghichukhachhang = $request->ghichu;
      
      $options = ['phivanchuyen' => 0, 'phantramgiamgia' => 0];

      if(session::has('psty_phuongthucvc'))
      {
         $phuongthucvc = session('psty_phuongthucvc');
         $options['phivanchuyen'] = $phuongthucvc['phivanchuyen'];
         $donhang->phuongthucvc_id = $phuongthucvc['phuongthucvc_id'];
      }
      if(session::has('psty_phuongthuctt'))
      {
         $phuongthuctt = session('psty_phuongthuctt');
         $donhang->phuongthuctt_id = $phuongthuctt['phuongthuctt_id'];
      }
      if(session::has('psty_couponcode'))
      {
         $phantramgiamgia = session('psty_couponcode')['phantram'];
         $options['phantramgiamgia'] = $phantramgiamgia;
      }

      if(!empty($options))
      {
         $donhang->options = json_encode($options);
      }

      $donhang->save();
      $donhang_id = $donhang->id;

      foreach (Cart::instance('shopping')->content() as $cart) {
         $chitietdonhang = new Chitietdonhang;
         $chitietdonhang->donhang_id = $donhang_id;
         $chitietdonhang->sanpham_id = $cart->id;
         $chitietdonhang->soluong = $cart->qty;
         $chitietdonhang->giaban = $cart->price;
         $chitietdonhang->dagiao = 0;
         $muatruoc = $cart->options->muatruoc;
         $options_sanpham = '';
         if($muatruoc > 0)
         {
            $options_sanpham = [
               'dattruoc' => "$muatruoc",
            ];

            $options_sanpham = json_encode($options_sanpham);
         }

         $chitietdonhang->options = $options_sanpham;
         
         $chitietdonhang->save();
      }

      $khachhang = Khachhang::find($khachhang_id);
      
      if(!empty($khachhang->email))
      {
         Mail::to($khachhang->email)->send(new ThongBaoDonHang($donhang));
      }
      
      Cart::instance('shopping')->destroy();

      if(Auth::check())
      {
         $giohang_dangco = Giohang::where('khachhang_id', $khachhang_id)
              ->where('trangthai', 0)->first();
         if($giohang_dangco)
         {
            $giohang_dangco->trangthai = 1;
            $giohang_dangco->save();
         }
      }
   }

   public function postUpdateCart(Request $request)
   {
      $list_cart = Cart::instance('shopping')->content();
      if($request->has('cart'))
      {
         foreach ($request->cart as $rowId => $qty) {
            $sanpham_id = $list_cart[$rowId]->id;
            $sanpham = Sanpham::find($sanpham_id);
            if(!$sanpham)
               return redirect()->back()->with('thongbao', 'Lỗi dữ liệu hãy thực hiện lại')
               ->with('danger', 'true');

            $check_muatruoc = $list_cart[$rowId]->options->muatruoc;
            $soluong_themtruoc = $list_cart[$rowId]->qty;
            
            $soluong_ton = $sanpham->soluongsanpham;
            $solong_muathem = $qty['qty'] - $soluong_ton;
            $soluong_kiemtra = $qty['qty'];

            if($soluong_kiemtra > $sanpham->soluongtoida)
            return redirect()->back()->with('thongbao', 'Bạn chỉ được mua tối đa ' . $sanpham->soluongtoida . ' sản phẩm ' . $sanpham->tensanpham)
            ->with('danger', 'true');
            
            if($check_muatruoc)
            {
               if(intval($qty['qty']) > 0)
               {
                  $options = $list_cart[$rowId]->options;
                  $muatruoc = $qty['qty'] - $soluong_ton;
                  $options['muatruoc'] = $muatruoc > 0 ? $muatruoc : 0;

                  $update_cart = [
                     'qty' => $qty['qty'],
                     'options' => $options
                  ];

                  Cart::instance('shopping')->update($rowId, $update_cart);
               }
            }
            else if($soluong_kiemtra > $soluong_ton)
            {
               return redirect()->back()->with('thongbao', 'Sản phẩm ' .$list_cart[$rowId]->name. ' bạn muốn mua thêm không đủ số lượng bạn cần mua bạn có muốn đặt trước ' .$solong_muathem. ' sản phẩm không?')->with('danger', 'true')->with('dattruoc', $solong_muathem)->with('rowid', $rowId)->with('soluongmua', $soluong_kiemtra);
            }
            else
            {
               if(intval($qty['qty']) > 0)
                  Cart::instance('shopping')->update($rowId, $qty);
            }
         }

         save_cart_to_database();
         return redirect()->back()->with('thongbao', 'Cập nhật giỏ hàng thành công');
      }
      return redirect()->back()->with('thongbao', 'Lỗi dữ liệu hãy thực hiện lại')
               ->with('danger', 'true');
   }

   public function postUpdateCartDatTruoc(Request $request)
   {
      $qty = $request->qty;
      $rowId = $request->rowid;
      $dattruoc = $request->dattruoc;
      if(intval($qty) > 0)
      {
         $list_cart = Cart::instance('shopping')->content();
         $sanpham_id = $list_cart[$rowId]->id;
         $sanpham = Sanpham::find($sanpham_id);
         if(!$sanpham)
            return redirect()->back()->with('thongbao', 'Lỗi dữ liệu hãy thực hiện lại')
            ->with('danger', 'true');
         if($qty > $sanpham->soluongtoida)
            return redirect()->back()->with('thongbao', 'Bạn chỉ được mua tối đa ' . $sanpham->soluongtoida . ' sản phẩm ' . $sanpham->tensanpham)
            ->with('danger', 'true');
         $options = $list_cart[$rowId]->options;
         $options['muatruoc'] = $dattruoc;

         $update_cart = [
            'qty' => $qty,
            'options' => $options
         ];

         Cart::instance('shopping')->update($rowId, $update_cart);
         save_cart_to_database();
      }
      return redirect()->back()->with('thongbao', 'Cập nhật giỏ hàng thành công');
   }

   public function postRemoveCart(Request $request)
{
   $list_cart = Cart::instance('shopping')->content();
   $sanpham_id = $list_cart[$request->rowid]->id;
   if(Auth::check())
   {
      $giohang_dangco = get_giohang_khachhang();
      $sanpham = Sanpham::find($sanpham_id);
      if($sanpham)
      {
         DB::table('chitietgiohang')->where('sanpham_id', $sanpham_id)
         ->where('giohang_id', $giohang_dangco->id)->delete();
      }
   }
   
   Cart::instance('shopping')->remove($request->rowid);
   return view('site.giohang.form-cart');
}

   public function postDestroyCart(Request $request)
   {
      if(Auth::check())
      {
         $giohang_dangco = get_giohang_khachhang();
         $giohang_dangco->trangthai = 2;
         $giohang_dangco->save();
      }
      
      Cart::instance('shopping')->destroy();
      return redirect()->route('home')->with('thongbao', 'Đã xóa giỏ hàng!');
   }

   private function check_exits_cart($sanpham_id)
   {
      $check = [];

      foreach (Cart::instance('shopping')->content() as $cart) 
      {
         if($cart->id == $sanpham_id)
         {
            $check = $cart;
            break;
         }
      }

      return $check;
   }

   // Them san pham vao gio hang
   public function postAddCart(Request $request)
   {
   	$sanpham = Sanpham::find($request->idsanpham);
      if(!$sanpham)
      {
         return 'error';
      }
      else
      {
         if(!$sanpham) return;
         $muatruoc = 0;
         $soluong_ton = $sanpham->soluongsanpham;
         
         $soluong_kiemtra = 0;
         $cart = $this->check_exits_cart($sanpham->id);

         if(!$request->has('muatruoc'))
         {
            
            $soluong_kiemtra = $request->soluong;
            $flag = true;

            if($cart)
            {
               $soluong_dathem = $cart->qty;
               $soluong_kiemtra = $request->soluong + $soluong_dathem;
               if($cart->options->muatruoc > 0)
               {
                  goto muatruoc;
               }
            }
            if($soluong_kiemtra > $soluong_ton)
            {
               return 'false';
            }
            if($soluong_kiemtra > $sanpham->soluongtoida)
            {
               return 'soluongtoida';
            }
         }

         else
         {
            if($cart)
            {
               muatruoc: {
                  $soluong_dathem = $cart->qty;
                  $soluong_mua = $request->soluong + $soluong_dathem;
                  $muatruoc = $soluong_mua - $soluong_ton;
                  $list_cart = Cart::instance('shopping')->content();
                  $options = $list_cart[$cart->rowId]->options;
                  $options['muatruoc'] = $muatruoc;

                  $update_cart = [
                     'qty' => $soluong_mua,
                     'options' => $options
                  ];
                  if($soluong_mua > $sanpham->soluongtoida)
                  {
                     return 'soluongtoida';
                  }
                  Cart::instance('shopping')->update($cart->rowId, $update_cart);
                  return 'true';
               }
            }
            else
            {
               $soluong_mua = $request->soluong;
               $muatruoc = $soluong_mua - $soluong_ton;
            }
         }

         $idsanpham = $sanpham->id;
         $tensanpham = $sanpham->tensanpham;
         $giasanpham = ($sanpham->giamgiasanpham > 0 ? $sanpham->giamgiasanpham : $sanpham->giasanpham);
         $soluong = $request->soluong;
         if($soluong > $sanpham->soluongtoida)
         {
            return 'soluongtoida';
         }
         $data_cart = [
            'id' => $idsanpham,
            'name' => $tensanpham,
            'price' => $giasanpham,
            'qty' => $soluong,
            'options' => [
               'muatruoc' => $muatruoc,
            ],
         ];
         
         Cart::instance('shopping')->add($data_cart)->associate('App\Models\Sanpham');

         save_cart_to_database();

         return 'true';
      }
   }
}
