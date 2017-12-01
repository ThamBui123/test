<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use App\Models\Nhaphang;
use App\Models\Chitietnhaphang;
use App\Models\Hangsanxuat;
use DateTime;
use Auth;
use DB;
use App\Http\Requests\NhapHangRequest;
use Config;

class NhapHangController extends Controller
{
   public function getAllList(Request $request)
   {
      $data = [
         'all_nhaphang' => Nhaphang::get_data($request),
         'da_xoa' => Nhaphang::where('trangthai', 0)->count(),
      ];
      return view('admin.nhaphang.index', $data);
   }

   

   public function getAllListThungRac()
   {
      $data = [
         'all_nhaphang' => Nhaphang::where('trangthai', 0)->get(),
      ];
      return view('admin.nhaphang.thungrac', $data);
   }

   public function getChiTiet($nhaphang_id)
   {
      $nhaphang = Nhaphang::findOrFail($nhaphang_id);
      $data = [
         'nhaphang' => $nhaphang,
      ];
      return view('admin.nhaphang.chitiet', $data);
   }

   public function getThem(Request $request)
   {
      $nhaphang_sanpham = [];

      if($request->has('nhaphang_sanpham'))
      {
         $list_nhaphang = explode('|', $request->nhaphang_sanpham);
         foreach ($list_nhaphang as $sanpham_id) {
            $sanpham = Sanpham::find($sanpham_id);
            if($sanpham)
            {
               $info_sanpham = [
                  'id' => $sanpham->id,
                  'tensanpham' => $sanpham->tensanpham,
               ];
               array_push($nhaphang_sanpham, $info_sanpham);
            }
         }
      }

   	$data = [
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 1)->get(),
         'nhaphang_sanpham' => $nhaphang_sanpham,
   	];

   	return view('admin.nhaphang.them', $data);
   }

   public function postThem(NhapHangRequest $request)
   {
      $nhaphang = new Nhaphang;
      $nhaphang->nhanvien_id = Auth::guard('nhanvien')->user()->id;
      $nhaphang->ngaynhaphang = new DateTime;
      $nhaphang->ghichunhaphang = $request->ghichunhaphang;
      $nhaphang->trangthai = 1;
      $nhaphang->save();
      $nhaphang_id = $nhaphang->id;
      $count_sanpham_id = count($request->sanpham_id);
      $list_sanpham = $request->sanpham_id;
      $list_doigiaban = $request->doigiaban;
      $list_soluongnhap = $request->soluongnhap;
      $list_gianhap = $request->gianhap;
      $list_ghichuchitiet = $request->ghichuchitiet;
      for ($i=0; $i < $count_sanpham_id; $i++) { 
         $chitietnhaphang = new Chitietnhaphang;
         $sanpham_id = $list_sanpham[$i];
         $soluongnhap = str_replace(',', '', $list_soluongnhap[$i]);
         $gianhap = str_replace(',', '', $list_gianhap[$i]);
         if(!is_numeric($soluongnhap) || !is_numeric($gianhap) || $gianhap <= 0 || $soluongnhap <= 0)
         {
            return redirect()->back()
            ->with('thongbao', 'Lỗi nhập dữ liệu vui lòng nhập lại')
            ->with('danger', 'true')
            ->withInput();
         }

         $chitietnhaphang->nhaphang_id = $nhaphang_id;
         $chitietnhaphang->sanpham_id = $sanpham_id;
         $chitietnhaphang->soluongnhap = $soluongnhap;
         $chitietnhaphang->gianhap = $gianhap;
         $chitietnhaphang->ghichuchitiet = $list_ghichuchitiet[$i];
         $chitietnhaphang->save();

         $sanpham = Sanpham::find($list_sanpham[$i]);

         if(!$sanpham)
         {
            return redirect()->back()
            ->with('thongbao', 'Lỗi nhập dữ liệu vui lòng nhập lại')
            ->with('danger', 'true')
            ->withInput();
         }
         
         $soluong_hientai = $sanpham->soluongsanpham;
         $sanpham->soluongsanpham = $soluong_hientai + $soluongnhap;

         $doigiaban = str_replace(',', '', $list_doigiaban[$i]);

         if(!empty($doigiaban) && $doigiaban > 0)
         {
            $sanpham->giasanpham = $doigiaban;
            $sotien_toida = Config::get('settings.sotien_toida');
            $soluong_toida = intval(($sotien_toida / $doigiaban));
            $soluong_toida = ($soluong_toida > 1) ? $soluong_toida : 1;
            $sanpham->soluongtoida = $soluong_toida;

         }

         // if(!empty($doigiaban) && $doigiaban > 0)
         // {
         //    $sotien_toida = Config::get('settings.sotien_toida');
         //    $soluong_toida = intval(($sotien_toida / $giasanpham));

         //    $soluong_toida = ($soluong_toida > 1) ? $soluong_toida : 1;
         //    $sanpham->giasanpham = $doigiaban;
         //    $sanpham->soluongtoida = $soluong_toida;
         // }

         $sanpham->save();
      }

      return redirect()->route('getThemNhapHang')->with('thongbao', 'Nhập hàng thành công');
   }

   public function postUpdateEditable(Request $request)
   {
      $sanpham_id = $request->name;
      $nhaphang_id = $request->pk;
      $soluongnhap_moi = $request->value;
      $chitietnhaphang_cu = DB::table('chitietnhaphang')
         ->where('nhaphang_id', $nhaphang_id)
         ->where('sanpham_id', $sanpham_id)->get();

      $soluongnhap_cu = $chitietnhaphang_cu[0]->soluongnhap;

      if($soluongnhap_moi > $soluongnhap_cu)
      {
         $sanpham = Sanpham::find($sanpham_id);
         $soluong_hientai = $sanpham->soluongsanpham;
         $soluongnhap = $soluongnhap_moi - $soluongnhap_cu;
         $sanpham->soluongsanpham = $soluong_hientai + $soluongnhap;
         $sanpham->save();
         
         DB::table('chitietnhaphang')
         ->where('nhaphang_id', $nhaphang_id)
         ->where('sanpham_id', $sanpham_id)
         ->update(['soluongnhap' => $soluongnhap_moi]);
      }
   }
}
