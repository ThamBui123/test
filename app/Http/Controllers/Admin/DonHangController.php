<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donhang;
use App\Models\Chitietdonhang;
use App\Models\Sanpham;
use App\Models\Nhanvien;
use App\Models\Hangsanxuat;
use DB;
use DateTime;
use Auth;

class DonHangController extends Controller
{
   public function getAllList(Request $request)
   {
      $data = [
         'all_donhang' => Donhang::get_data($request),
         'da_xoa' => Donhang::where('trangthai', 0)->count(),
      ];
      return view('admin.donhang.index', $data);
   }

   public function getXuatKho()
   {
      $data = [
         'all_sanpham' => Sanpham::where('trangthai', 1)->get(),
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 1)->get(),
      ];

      return view('admin.donhang.xuatkho', $data);
   }
   public function getAllListThungRac()
   {
      $data = [
         'all_donhang' => Donhang::where('trangthai', 0)->get(),
      ];
      return view('admin.donhang.thungrac', $data);
   }

   public function getChiTiet($donhang_id)
   {
      $donhang = Donhang::findOrFail($donhang_id);
      // dd($donhang->check_hoanthanh());
      $tinhtrangdonhang = [
         ['id' => 0, 'tinhtrang' => 'Chưa xem'],
         ['id' => 1, 'tinhtrang' => 'Đã xác nhận'],
         ['id' => 2, 'tinhtrang' => 'Hoàn thành'],
      ];

      $data = [
         'donhang' => $donhang,
         'all_tinhtrangdonhang' => $tinhtrangdonhang,
      ];

      return view('admin.donhang.chitiet', $data);

   }

   public function postCapNhatDonHang($donhang_id, Request $request)
   {
      $donhang = Donhang::findOrFail($donhang_id);
      $request_tinhtrangdonhang = $request->tinhtrangdonhang;

      $array_tinhtrangdonhang = ['0', '1', '2'];
      if(!in_array($request_tinhtrangdonhang, $array_tinhtrangdonhang))
      {
         return redirect()->back();
      }


      if(intval($request_tinhtrangdonhang) === 0)
      {
         return redirect()->back();
      }
      
      if($request_tinhtrangdonhang < $donhang->tinhtrangdonhang)
      {
         return redirect()->back()
            ->with('thongbao', 'Không có gì mới để thay đổi')
            ->with('danger', true);
      }

      if($donhang->check_hoanthanh())
      {
         return redirect()->back()->with('thongbao', 'Đơn hàng đã hoàn thành');
      }

      if($request_tinhtrangdonhang == 2)
      {
         $list_soluongmua = [];
         foreach ($request->soluongmua as $soluongmua) 
         {
            $soluongmua = explode('_', $soluongmua);
            $list_soluongmua += [$soluongmua[0] => $soluongmua[1]];
         }

         foreach ($list_soluongmua as $sanpham_id => $giaotruoc) 
         {
            if(!Sanpham::check_sanpham($sanpham_id))
               return redirect()->back()->with('thongbao', 'Sai dữ liệu sản phẩm vui lòng thực hiện lại');
            if(intval($giaotruoc) < 0)
              return redirect()->back()->with('thongbao', 'Sai dữ liệu vui lòng thực hiện lại'); 
            if($giaotruoc > Sanpham::soluong($sanpham_id))
               return redirect()->back()->with('thongbao', 'Số lượng còn lại không đủ để giao hàng');
         }

         foreach ($donhang->chitietdonhang as $chitietdonhang) {
            $sanpham = Sanpham::find($chitietdonhang->sanpham_id);
            $soluong_hientai = $sanpham->soluongsanpham;
            
            if(array_key_exists($sanpham->id, $list_soluongmua))
            {
               $soluong_thanhtoan = $list_soluongmua[$sanpham->id];
               $check_update = $chitietdonhang->dagiao + $soluong_thanhtoan;
               if($check_update <= $chitietdonhang->soluong && $check_update > 0)
               {
                  $soluongsanpham = $soluong_hientai - $soluong_thanhtoan;
                  $sanpham->soluongsanpham = $soluongsanpham;
                  $sanpham->save();
                  $update_dagiao = $chitietdonhang->dagiao + $soluong_thanhtoan;
                  DB::table('chitietdonhang')
                  ->where('donhang_id', $donhang->id)
                  ->where('sanpham_id', $sanpham->id)
                  ->update(['dagiao' => $update_dagiao]);
               }
            }
         }
         
         $donhang->nhanvien_id = Auth::guard('nhanvien')->id();
      }

      if($donhang->check_hoanthanh())
      {
         $request_tinhtrangdonhang = 2;
         $donhang->ngaynhan = new DateTime;
         $donhang->save();
      }

      $donhang->tinhtrangdonhang = $request_tinhtrangdonhang;
      $donhang->ghichudonhang = $request->ghichudonhang;
      $donhang->save();

      return redirect()->back()->with('thongbao', 'Cập nhật tình trạng đơn hàng thành công');
   }

   public function postHuyBoDonHang(Request $request)
   {
      $donhang = Donhang::findOrFail($request->donhang_id);
      $donhang_id = $donhang->id;
      $donhang->delete();
      DB::table('chitietdonhang')->where('donhang_id', $donhang_id)->delete();
      return redirect()->route('listDonHang')->with('thongbao', 'Hủy bỏ đơn hàng thành công');
   }

   public function postChinhSuaDonHang($donhang_id, Request $request)
   {
      $donhang = Donhang::findOrFail($donhang_id);

      if($request->has('khongthexoa_istrue'))
      {
         $donhang->delete();
         DB::table('chitietdonhang')->where('donhang_id', $donhang_id)->delete();
         return redirect()->route('listDonHang')->with('thongbao', 'Hủy bỏ đơn hàng thành công');
      }

      if($request->has('xoasanpham_dh'))
      {
         if($donhang->sosanpham() == 1)
         {
            return redirect()
            ->route('getChiTietDonHang', $donhang_id)
            ->with('thongbao', 'Đơn hàng này chỉ còn một sản phẩm nếu xóa đơn hàng này sẽ được hủy')
            ->with('danger', 'true')
            ->with('khongthexoa', 'true');
         }

         $sanpham_id = $request->xoasanpham_dh;
         $query = DB::table('chitietdonhang')
         ->where('donhang_id', $donhang_id)
         ->where('sanpham_id', $sanpham_id)
         ->delete();

         if($query)
            return redirect()
            ->route('getChiTietDonHang', $donhang_id)
            ->with('thongbao', 'Xóa sản phẩm trong đơn hàng thành công');
         return redirect()
            ->route('getChiTietDonHang', $donhang_id)
            ->with('thongbao', 'Không thể xóa sản phẩm trong đơn hàng này');
      }

      if($request->has('suasoluong'))
      {
         $sanpham_id = $request->sanpham_id;
         $sanpham = Sanpham::find($sanpham_id);
         if($sanpham)
         {
            $soluong = $request->value;
            if($soluong > $sanpham->soluongsanpham)
            {
               return response()->json([
                  'success' => false,
                  'msg_txt' => 'Số lượng hiện tại không đủ để đặt hàng'
                  ]
               );
            }

            $query = DB::table('chitietdonhang')
            ->where('donhang_id', $donhang_id)
            ->where('sanpham_id', $sanpham_id)
            ->update(['soluong' => $soluong]);

            $thanhtien = Chitietdonhang::thanhtien_byid($donhang_id, $sanpham_id);

            if($query)
               return response()->json([
                  'success' => true,
                  'tongtien' => $donhang->tongtien(),
                  'thanhtien' => $thanhtien,
               ]
            );
         }
      }

      return response()->json([
         'success' => false,
         'msg_txt' => 'Không tìm thấy dữ liệu cần thực hiện'
         ]
      );
   }
}
