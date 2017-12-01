<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sanpham;
use App\Models\Hangsanxuat;
use App\Models\Theloai;
use App\Models\Tintuc;
use App\Models\Sliders;
use Cart;

class HomeController extends Controller
{
   public function getHome()
   {
   	$data = [
	   	'sanpham_dacbiet' => Sanpham::dacbiet(),
   		'sanpham_moi' => Sanpham::moinhat(),
   		'sanpham_banchay' => Sanpham::sanphambanchay(),
   		'sanpham_totnhat' => Sanpham::all(),
         'tintuc_moi' => Tintuc::moinhat(3),
         'slider_left' => Sliders::leftSliders(),
         'slider_right' => Sliders::rightSliders(),
   	];
      
   	return view('site.common.home', $data);
   }
}
