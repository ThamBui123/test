<?php 

if(!function_exists('get_giohang_khachhang'))
{
	function get_giohang_khachhang()
	{
		$khachhang_id = Auth::user()->id;
		$giohang_dangco = \App\Models\Giohang::where('khachhang_id', $khachhang_id)
         ->where('trangthai', 0)->first();
        return $giohang_dangco;
	}
}

if(!function_exists('add_cart_to_database'))
{
	function add_cart_to_database($giohang_dangco)
   {
       foreach (Cart::instance('shopping')->content() as $cart)
        {
	         $sanpham_id_from_cart = $cart->model->id;
	         $sanpham_check = DB::table('chitietgiohang')->select('sanpham_id')->join('giohang', 'giohang.id', '=', 'chitietgiohang.giohang_id')->where('giohang.trangthai', 0)->where('sanpham_id', $sanpham_id_from_cart)->first();

	         if($sanpham_check)
	         {
	            $sanpham_dathem = [
	               'soluongdat' => $cart->qty,
	               'dongiadat' => $cart->price
	            ];

	            DB::table('chitietgiohang')->where('sanpham_id', $sanpham_id_from_cart)
	               ->where('giohang_id', $giohang_dangco->id)->update($sanpham_dathem);
	         }
	         else
	         {
	            $sanpham_them = new \App\Models\Chitietgiohang;
	            $sanpham_them->soluongdat = $cart->qty;
	            $sanpham_them->dongiadat = $cart->price;
	            $sanpham_them->sanpham_id = $sanpham_id_from_cart;
	            $sanpham_them->giohang_id = $giohang_dangco->id;
	            $sanpham_them->save();
	         }
        }
	}
}

if(!function_exists('save_cart_to_database'))
{
	function save_cart_to_database()
	{
		if(Auth::check())
        {
            $giohang_dangco = get_giohang_khachhang();
           if($giohang_dangco)
           {
              add_cart_to_database($giohang_dangco);
           }
           else {
              $giohang_moi = new \App\Models\Giohang;
              $khachhang_id = Auth::user()->id;
              $giohang_moi->khachhang_id = $khachhang_id;
              $giohang_moi->ngaydat = new DateTime;
              $giohang_moi->trangthai = 0;
              $giohang_moi->save();
              add_cart_to_database($giohang_moi);
           }
        }
	}
}
