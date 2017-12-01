<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Http\Requests\ThemPagesRequest;
use App\Http\Requests\SuaPagesRequest;
use Auth;
use File;
use DateTime;

class PagesController extends Controller
{
   public function getAllList(Request $request)
   {
   	$data = [
   		'all_page' => Pages::get_data($request),
   		'da_xoa' => Pages::where('trangthai', 0)->count(),
   	];

   	return view('admin.pages.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_page' => Pages::where('trangthai', 0)->get(),
      ];
      return view('admin.pages.thungrac', $data);
   }

   public function getThem()
   {
   	return view('admin.pages.them');
   }

   public function postThem(ThemPagesRequest $request)
   {
   	$pages = new Pages;
   	$pages->tieude = $request->tieude;
   	$pages->slug = str_slug($request->tieude);
   	$pages->noidung = $request->noidung;
   	$pages->trangthai = $request->trangthai;
   	$pages->save();
      return redirect()->back()->with('thongbao', 'Thêm trang thành công');
   }

   public function getSua($id)
   {
   	$data = [
	   	'page' => Pages::findOrFail($id),
   	];

   	return view('admin.pages.sua', $data);
   }

   public function postSua($id, SuaPagesRequest $request)
   {
   	$page = Pages::findOrFail($id);
   	$page->tieude = $request->tieude;
   	$page->slug = str_slug($request->tieude);
   	$page->noidung = $request->noidung;
   	$page->trangthai = $request->trangthai;
      $page->updated_at = new DateTime;
   	$page->save();

      return redirect()->route('listPages')->with('thongbao', 'Sửa trang thành công');
   }
}
