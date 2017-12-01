<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sliders;
use App\Http\Requests\ThemSlidersRequest;
use App\Http\Requests\SuaSlidersRequest;
use Auth;
use File;
use DateTime;
use DB;

class SlidersController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_slider' => Sliders::get_data($request),
   		'da_xoa' => Sliders::where('trangthai', 0)->count(),
   	];

   	return view('admin.sliders.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_slider' => Sliders::where('trangthai', 0)->get(),
      ];
      return view('admin.sliders.thungrac', $data);
   }

   public function getThem()
   {
   	return view('admin.sliders.them');
   }

   public function postThem(ThemSlidersRequest $request)
   {
   	$sliders = new Sliders;
   	$hinhanh = $request->hinhanh;
   	$file_image = time() . '-' . $hinhanh->getClientOriginalName();
      $file_save = $file_image . '.' . $hinhanh->getClientOriginalExtension();
   	$sliders->tieude = $request->tieude;
   	$sliders->lienket = $request->lienket;
   	$sliders->vitri = $request->vitri;
   	$sliders->hinhanh = $file_save;
   	$sliders->trangthai = $request->trangthai;
   	$sliders->save();
   	$path = public_path() . '/uploads/banner/';
      $request->file('hinhanh')->move($path, $file_save);
      return redirect()->back()->with('thongbao', 'Thêm slider thành công');
   }

   public function getSua($id)
   {
   	$data = [
	   	'slider' => Sliders::findOrFail($id),
   	];

   	return view('admin.sliders.sua', $data);
   }

   public function postSua($id, SuaSlidersRequest $request)
   {
   	$slider = Sliders::findOrFail($id);
   	$slider->tieude = $request->tieude;
   	$hinhanh = $request->hinhanh;
   	if(count($hinhanh) > 0)
   	{
   		if(file_exists(public_path() . '/uploads/banner/' . $slider->hinhanh))
         {
            File::delete(public_path() . '/uploads/banner/' . $slider->hinhanh);
         }

   		$file_image = time() . '-' . $hinhanh->getClientOriginalName();
	      $file_save = $file_image . '.' . $hinhanh->getClientOriginalExtension();
	   	$path = public_path() . '/uploads/banner/';
	      $request->file('hinhanh')->move($path, $file_save);
	      $slider->hinhanh = $file_save;
   	}

   	$slider->lienket = $request->lienket;
   	$slider->vitri = $request->vitri;
   	$slider->trangthai = $request->trangthai;
      $slider->updated_at = new DateTime;
   	$slider->save();

      return redirect()->route('listSliders')->with('thongbao', 'Sửa slider thành công');
   }
}
