<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Theloai;
// use App\Models\Nhomsanpham;
use App\Models\Thuoctinh;

use App\Http\Requests\SuaTheLoaiRequest;
use App\Http\Requests\ThemTheLoaiRequest;
use DateTime;
use Config;
use DB;

class TheLoaiController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_theloai' => Theloai::get_data($request),
         'da_xoa' => Theloai::where('trangthai', 0)->count(),
   	];
      
   	return view('admin.theloai.index', $data);
   }


   public function getAllListThungRac()
   {
      $data = [
         'all_theloai' => Theloai::where('trangthai', 0)->get(),
      ];
      return view('admin.theloai.thungrac', $data);
   }

   public function getThem()
   {
      $data = [
         'all_theloai' => Theloai::where('trangthai', 1)->get(),
         // 'all_nhomsanpham' => Nhomsanpham::where('trangthai', 1)->get(),
      ];
      return view('admin.theloai.them');
   }

   public function postThem(ThemTheLoaiRequest $request)
   {
      $theloai = new Theloai;
      $theloai->tentheloai = $request->tentheloai;
      // $theloai->parent_id = $request->parent_id;
      // $theloai->nhomsanpham_id = $request->nhomsanpham_id;
      $theloai->slugtl = str_slug($request->tentheloai);
      $theloai->gioithieutl = $request->gioithieutl;
      $theloai->trangthai = $request->trangthai;
      $theloai->save();
      return redirect()->back()->with('thongbao', 'Thêm thể loại thành công');
   }

   public function getSua($id)
   {
   	$data = [
   	   'theloai' => Theloai::findOrFail($id),
         //'all_theloai' => Theloai::where('trangthai', 1)->get(),
        // 'all_nhomsanpham' => Nhomsanpham::where('trangthai', 1)->get(),
	   ];
   	return view('admin.theloai.sua', $data);
   }

   public function postSua($id, SuaTheLoaiRequest $request)
   {
   	$theloai = Theloai::findOrFail($id);
   	$theloai->tentheloai = $request->tentheloai;
      $theloai->parent_id = $request->parent_id != $id ? $request->parent_id : 0;
      // $theloai->nhomsanpham_id = $request->nhomsanpham_id;
   	$theloai->slugtl = str_slug($request->tentheloai);
   	$theloai->gioithieutl = $request->gioithieutl;
      $theloai->trangthai = $request->trangthai;
      $theloai->updated_at = new DateTime;
   	$theloai->save();
   	return redirect()->route('listTheLoai')->with('thongbao', 'Sửa thể loại thành công');
   }

}
