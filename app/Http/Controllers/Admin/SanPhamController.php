<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ThemSanPhamRequest;
use App\Http\Requests\SuaSanPhamRequest;
use App\Models\Sanpham;
use App\Models\Theloai;
use App\Models\Hangsanxuat;
use App\Models\Hinhsanpham;
use App\Models\Thuoctinhchitiet;
use App\Models\Thuoctinh;
use App\Models\Nhaphang;
use App\Models\Chitietnhaphang;
use File;
use DB;
use DateTime;
use Auth;
use Config;

class SanPhamController extends Controller
{
   public function getAllList(Request $request)
   {
      $data = [
         'all_theloai' => Theloai::where('trangthai', 1)->get(),
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 1)->get(),
         'all_sanpham' => Sanpham::get_data($request),
         'da_xoa' => Sanpham::where('trangthai', 0)->count(),
      ];
      return view('admin.sanpham.index', $data);
   }

   public function getAllListThungRac()
   {
      $data = [
         'all_sanpham' => Sanpham::where('trangthai', 0)->get(),
      ];
      return view('admin.sanpham.thungrac', $data);
   }

   public function getThemSanPham()
   {
      $data = [
         'all_theloai' => Theloai::where('trangthai', 1)->get(),
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 1)->get(),
      ];

      return view('admin.sanpham.them', $data);
   }

   public function getSuaSanPham($id)
   {
      $sanpham = Sanpham::findOrFail($id);

      $data = [
         'sanpham' => $sanpham,
         'all_theloai' => Theloai::where('trangthai', 1)->get(),
         'all_hangsanxuat' => Hangsanxuat::where('trangthai', 1)->get(),
         'all_hinhsanpham' => Sanpham::find($id)->hinhsanpham,
      ];

      return view('admin.sanpham.sua', $data);
   }

   public function postThemSanPham(ThemSanPhamRequest $request)
   {
      
      // $giasanpham = str_replace(',', '', $request->giasanpham);
      // $gianhap = str_replace(',', '', $request->gianhap);
      // $soluongsanpham = str_replace(',', '', $request->soluongsanpham);
      $giasanpham = 0; 
      $gianhap = 0;
      $soluongsanpham = 0;
      // if(!is_numeric($giasanpham) || !is_numeric($soluongsanpham) || !is_numeric($gianhap) || $giasanpham <= 0 || $gianhap <= 0 || $soluongsanpham <= 0)
      // {
      //    return redirect()->back()
      //       ->with('thongbao', 'Lỗi nhập dữ liệu vui lòng nhập lại')
      //       ->with('danger', 'true')
      //       ->withInput();
      // }

      
      $anhsanpham = $request->anhsanpham;
      $file_image = time() . '-' . $anhsanpham->getClientOriginalName();
      $file_save = md5($file_image) . '.' . $anhsanpham->getClientOriginalExtension();
      $danhsachhinhanh = $request->danhsachhinhanh;
      $sanpham = new Sanpham;
      $sanpham->masanpham = $request->masanpham;
      $sanpham->theloai_id = $request->theloai_id;
      $sanpham->hangsanxuat_id = $request->hangsanxuat_id;
      $sanpham->tensanpham = $request->tensanpham;
      $sanpham->slugsp = str_slug($request->tensanpham);

      $sanpham->soluongsanpham = $soluongsanpham;
      $sanpham->giasanpham = $giasanpham;
      
      $sanpham->anhsanpham = $file_save;
      $sanpham_lienquan = $request->sanpham_lienquan;
      if(!empty($sanpham_lienquan))
      {
         $sanpham->sanphamlienquan = $sanpham_lienquan;
      }
      $sanpham->sanphamdacbiet = $request->sanphamdacbiet;
      $sanpham->soluongsanpham = !empty($request->soluongsanpham) ? $request->soluongsanpham : 0;
      $sanpham->gioithieungan = $request->gioithieungan;
      $sanpham->gioithieusanpham = $request->gioithieusanpham;
      
      $sanpham->save();
      $sanpham_id = $sanpham->id;
      //Nhập hàng mới
      $this->nhapHangMoi($sanpham_id, $soluongsanpham, $gianhap);


      $tensanpham = $sanpham->tensanpham;
      
      $path = public_path() . '/uploads/anhsanpham/';
      $request->file('anhsanpham')->move($path, $file_save);
      if(count($danhsachhinhanh) > 0)
      {
         foreach ($danhsachhinhanh as $hinhanh) {
            $path = public_path() . '/uploads/hinhanhsanpham/';
            $file_image_list = $hinhanh->getClientOriginalName();
            $lienket = time() . '-' . $file_image_list;
            $file_save_lienket = md5($lienket) . '.' . $hinhanh->getClientOriginalExtension();
            $hinhanh->move($path, $file_save_lienket);
            $hinhsanpham = new Hinhsanpham;
            $hinhsanpham->sanpham_id = $sanpham_id;
            $hinhsanpham->lienket = $file_save_lienket;
            $hinhsanpham->tenhinh = $tensanpham;
            $hinhsanpham->save();
         }
      }
      return redirect()->back()->with('thongbao', 'Thêm sản phẩm thành công');
   }

   public function postSuaSanPham($id, SuaSanPhamRequest $request)
   {
     
      $giasanpham = str_replace(',', '', $request->giasanpham);

      if(!is_numeric($giasanpham) || $giasanpham <= 0)
      {
         return redirect()->back()
            ->with('thongbao', 'Lỗi nhập dữ liệu vui lòng nhập lại')
            ->with('danger', 'true')
            ->withInput();
      }

      $sotien_toida = Config::get('settings.sotien_toida');
      $soluong_toida = intval(($sotien_toida / $giasanpham));

      $soluong_toida = ($soluong_toida > 1) ? $soluong_toida : 1;

      $file_image = $request->anhsanpham;
      $danhsachhinhanh = $request->danhsachhinhanh;
      $sanpham = Sanpham::findOrFail($id);
      $sanpham->masanpham = $request->masanpham;
      $sanpham->theloai_id = $request->theloai_id;
      $sanpham->hangsanxuat_id = $request->hangsanxuat_id;
      $sanpham->tensanpham = $request->tensanpham;
      $sanpham->slugsp = str_slug($request->tensanpham);
      $sanpham->giasanpham = $giasanpham;
      $sanpham->soluongtoida = $soluong_toida;
      

      if(count($file_image) > 0)
      {
         if(file_exists(public_path() . '/uploads/anhsanpham/' . $sanpham->anhsanpham))
         {
            File::delete(public_path() . '/uploads/anhsanpham/' . $sanpham->anhsanpham);
         }
         
         $path = public_path() . '/uploads/anhsanpham/';
         $anhsanpham = time() . '-' . $file_image->getClientOriginalName();
         $file_save = md5($anhsanpham) . '.' . $file_image->getClientOriginalExtension();
         $request->file('anhsanpham')->move($path, $file_save);
         $sanpham->anhsanpham = $file_save;         
      }

      if(count($danhsachhinhanh) > 0)
      {
         foreach ($danhsachhinhanh as $hinhanh) {
            $path = public_path() . '/uploads/hinhanhsanpham/';
            $file_image_list = $hinhanh->getClientOriginalName();
            $lienket = time() . '-' . $file_image_list;
            $file_save_lienket = md5($lienket) . '.' . $hinhanh->getClientOriginalExtension();
            $hinhanh->move($path, $file_save_lienket);
            $hinhsanpham = new Hinhsanpham;
            $hinhsanpham->sanpham_id = $sanpham->id;
            $hinhsanpham->lienket = $file_save_lienket;
            $hinhsanpham->tenhinh = $sanpham->tensanpham;
            $hinhsanpham->save();
         }
      }

   

      $sanpham_lienquan = $request->sanpham_lienquan;
      if(!empty($sanpham_lienquan))
      {
         $sanpham->sanphamlienquan = $sanpham_lienquan;
      }
      else
         $sanpham->sanphamlienquan = '';  
      $sanpham->sanphamdacbiet = $request->sanphamdacbiet;
      $sanpham->gioithieungan = $request->gioithieungan;
      $sanpham->gioithieusanpham = $request->gioithieusanpham;
      $sanpham->trangthai = $request->trangthai;
      $sanpham->updated_at = new DateTime;
      $sanpham->save();
      return redirect()->route('listSanPham')->with('thongbao', 'Sửa sản phẩm thành công');
   }

   private function nhapHangMoi($sanpham_id, $soluongnhap, $gianhap)
   {
      $nhaphang = new Nhaphang;
      $nhaphang->nhanvien_id = Auth::guard('nhanvien')->user()->id;
      $nhaphang->ngaynhaphang = new DateTime;
      $nhaphang->ghichunhaphang = "Nhập hàng mới cho sản phẩm";
      $nhaphang->trangthai = 1;
      $nhaphang->save();

      $chitietnhaphang = new Chitietnhaphang;
      $chitietnhaphang->nhaphang_id = $nhaphang->id;
      $chitietnhaphang->sanpham_id = $sanpham_id;
      $chitietnhaphang->soluongnhap = $soluongnhap;
      $chitietnhaphang->gianhap = $gianhap;
      $chitietnhaphang->ghichuchitiet = "Nhập hàng mới";
      $chitietnhaphang->save();
   }

   public function getXoaHinhAnh($id)
   {
      $hinhanhsanpham = Hinhsanpham::findOrFail($id);
      $sanpham = Sanpham::findOrFail($hinhanhsanpham->sanpham_id);
      if(count($sanpham->hinhsanpham) == 1)
         return redirect()->back()
            ->with('thongbao', 'Không thể xóa hết ảnh của sản phẩm')
            ->with('danger', 'true');
      
      $hinhanhsanpham->destroy($id);
      return redirect()->back()->with('thongbao', 'Xóa hình ảnh thành công');
   }

}

   