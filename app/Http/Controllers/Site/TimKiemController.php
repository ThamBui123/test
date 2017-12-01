<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Theloai;
use Config;

class TimKiemController extends Controller
{
   public function getTimKiem(Request $request)
   {
      if(!$request->search_key)
         return redirect('/');
   	$all_sanpham = $this->get_data($request);
   	$search = $request->search_key;
   	$data = [
	   	'all_sanpham' => $all_sanpham,
	   	'search' => $search,
   	];

   	return view('site.sanpham.timkiem', $data);
   }

   private function get_data($request)
   {
      $query = DB::table('sanpham');
   	$theloai_id = $request->category_id;
      $search = $request->search_key;
   	if($theloai_id > 0){
   		$query->where('theloai_id', $theloai_id)->where('trangthai', 1);
   	} else {
   		$query->where('trangthai', 1);
   	}

      $query->where('tensanpham', 'like', "%{$search}%");

      $pagination = Config::get('settings.products_pages');
      $orderby = 'desc';
      $sortby = 'sanpham.id';

      $query->orderBy($sortby,  $orderby);

      return $query->paginate($pagination);
   }
}
