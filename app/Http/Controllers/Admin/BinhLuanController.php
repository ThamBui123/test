<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Binhluan;
use Config;

class BinhLuanController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_binhluan' => Binhluan::get_data($request),
   		'da_xoa' => Binhluan::where('trangthai', 0)->count(),
   	];
   	return view('admin.binhluan.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_binhluan' => Binhluan::where('trangthai', 0)->get(),
      ];
      return view('admin.binhluan.thungrac', $data);
   }

   public function getXemBinhLuan($id, Request $request)
   {
   	$binhluan = Binhluan::findOrFail($id);

      if($binhluan->daxem != 1)
      {
         $binhluan->daxem = 1;
         $binhluan->save();
      }
      
      // if($request->noidungtraloi)
      // {
      //    $binhluan_traloi = new Binhluan;
      //    $binhluan_traloi->sanpham_id = $binhluan->sanpham_id;
      //    $binhluan_traloi->khachhang_id = $binhluan->khachhang_id;
      //    $binhluan_traloi->parent_id = $binhluan->id;
      //    $binhluan_traloi->noidung = $request->noidungtraloi;
      //    $binhluan_traloi->daduyet = 1;
      //    $binhluan_traloi->save();
      //    return redirect()->back()->with('thongbao', 'Trả lời bình luận này thành công');
      // }

   	$data = [
         'binhluan' => $binhluan,
      ];
   	return view('admin.binhluan.chitiet', $data);
   }

   public function postHuyBoBinhLuan($id)
   {
      $binhluan = Binhluan::findOrFail($id);
      $binhluan->delete();
      return redirect()->route('listBinhLuan')->with('thongbao', 'Xóa bỏ bình luận thành công');
   }

   public function postDuyetBinhLuan($id)
   {
      $binhluan = Binhluan::findOrFail($id);
      if($binhluan->daxem != 1)
      {
         $binhluan->daxem = 1;
         $binhluan->save();
      }
      
      return redirect()->route('listBinhLuan')->with('thongbao', 'Duyệt bình luận thành công');
   }
}
