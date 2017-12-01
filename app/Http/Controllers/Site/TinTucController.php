<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use DB;
use Config;

class TinTucController extends Controller
{
   public function getListTinTuc()
   {
   	$data = [
	   	'all_tintuc' => $this->get_data()
   	];
   	return view('site.tintuc.index', $data);
   }

   public function getTinTuc($slug)
   {
   	$tintuc = Tintuc::where('slug', $slug)
				   	->where('trangthai', 1)
				   	->firstOrFail();
   	$luotxem_hientai = $tintuc->luotxem;
   	$tintuc->luotxem = $luotxem_hientai + 1;
   	$tintuc->save();
      $tintuc_lienquan = Tintuc::where('trangthai', 1)
         ->where('id', '<>', $tintuc->id)
         ->limit(3)
         ->get();

   	$data = [
	   	'tintuc' => $tintuc,
         'tintuc_lienquan' => $tintuc_lienquan,
   	];

   	return view('site.tintuc.chitiet', $data);
   }

   private function get_data()
   {
   	$pagination = Config::get('settings.site_pages');
   	return DB::table('tintuc')
	   	->where('trangthai', 1)
         ->orderBy('id', 'desc')
	   	->paginate($pagination);
   }
}
