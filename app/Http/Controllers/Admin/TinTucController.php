<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tintuc;
use App\Http\Requests\ThemTinTucRequest;
use App\Http\Requests\SuaTinTucRequest;
use Auth;
use File;
use DateTime;

class TinTucController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_tintuc' => Tintuc::get_data($request),
   		'da_xoa' => Tintuc::where('trangthai', 0)->count(),
   	];

   	return view('admin.tintuc.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_tintuc' => Tintuc::where('trangthai', 0)->get(),
      ];
      return view('admin.tintuc.thungrac', $data);
   }

   public function getThem()
   {
   	return view('admin.tintuc.them');
   }

   public function postThem(ThemTinTucRequest $request)
   {
   	$tintuc = new Tintuc;
   	$thumbnail = $request->thumbnail;
   	$file_image = time() . '-' . $thumbnail->getClientOriginalName();
      $file_save = md5($file_image) . '.' . $thumbnail->getClientOriginalExtension();
   	$tintuc->tieude = $request->tieude;
   	$tintuc->slug = str_slug($request->tieude);
   	$tintuc->nhanvien_id = Auth::guard('nhanvien')->user()->id;
   	$tintuc->thumbnail = $file_save;
   	$tintuc->noidung = $request->noidung;
   	$tintuc->trangthai = $request->trangthai;
   	$tintuc->save();
   	$path = public_path() . '/uploads/tintuc/';
      $request->file('thumbnail')->move($path, $file_save);
      return redirect()->route('getThemTinTuc')->with('thongbao', 'Thêm tin tức thành công');
   }

   public function getSua($id)
   {
   	$data = [
	   	'tintuc' => Tintuc::findOrFail($id),
   	];

   	return view('admin.tintuc.sua', $data);
   }

   public function postSua($id, SuaTinTucRequest $request)
   {
   	$tintuc = Tintuc::findOrFail($id);
   	$tintuc->tieude = $request->tieude;
   	$tintuc->slug = str_slug($request->tieude);
   	// $tintuc->nhanvien_id = Auth::guard('nhanvien')->user()->id;
   	$thumbnail = $request->thumbnail;
   	if(count($thumbnail) > 0)
   	{
   		if(file_exists(public_path() . '/uploads/tintuc/' . $tintuc->thumbnail))
         {
            File::delete(public_path() . '/uploads/tintuc/' . $tintuc->thumbnail);
         }

   		$file_image = time() . '-' . $thumbnail->getClientOriginalName();
	      $file_save = md5($file_image) . '.' . $thumbnail->getClientOriginalExtension();
	   	$path = public_path() . '/uploads/tintuc/';
	      $request->file('thumbnail')->move($path, $file_save);
	      $tintuc->thumbnail = $file_save;
   	}

   	$tintuc->noidung = $request->noidung;
   	$tintuc->trangthai = $request->trangthai;
      $tintuc->updated_at = new DateTime;
   	$tintuc->save();

      return redirect()->route('listTinTuc')->with('thongbao', 'Sửa tin tức thành công');
   }
}
