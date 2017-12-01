<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\Models\Sanpham;
use App\Models\Hangsanxuat;
use File;

class CongCuController extends Controller
{
   public function postDuaVaoThungRac(Request $request)
   {
   	if(isset($request->del_dulieu))
      {
      	$array_request = explode('_', $request->del_dulieu);
         $id = $array_request[0];
         $table = $array_request[1];
         $this->duaVaoThungRac($table, $id);
         return redirect()->back()->with('thongbao', 'Đã chuyển vào thùng rác');        
      }
      else if(isset($request->ckb_dulieu))
      {
         $list_request = $request->ckb_dulieu;
         foreach ($list_request as $data_request) {
         	$array_request = explode('_', $data_request);
	         $id = $array_request[0];
	         $table = $array_request[1];
            $this->duaVaoThungRac($table, $id);
         }
         return redirect()->back()->with('thongbao', 'Đã chuyển vào thùng rác');
      }
      else
      {
         return redirect()->back()->with('thongbao', 'Không có gì để xóa');
      }
   }

   public function postKhoiPhuc(Request $request)
   {
      $array_request = explode('_', $request->res_dulieu);
      $id = $array_request[0];
      $table = $array_request[1];
      DB::table($table)->where('id', $id)->update(['trangthai' => 1]);
      return redirect()->back()->with('thongbao', 'Khôi phục thành công');    
   }

   public function postXoaBo(Request $request)
   {
   	if(isset($request->del_dulieu))
      {
      	$array_request = explode('_', $request->del_dulieu);
         $id = $array_request[0];
         $table = $array_request[1];
         if($this->check_parent($table, $id))
         {
            if($table == 'theloai')
               return redirect()->back()->with('thongbao', 'Không thể xóa vì nó là cha của thể loại khác')->with('danger', true);
            else
               return redirect()->back()->with('thongbao', 'Không thể xóa vì nó là cha của nhóm sản phẩm khác')->with('danger', true);
         }

         switch ($table) 
         {
            case 'sanpham':
               $this->xoaHinhSanPham($id);
               break;
            case 'hangsanxuat':
               $this->xoaHinhHangSanXuat($id);
               break;
            case 'donhang':
               $this->xoaDonHang($id);
               break;
            default:
               break;
         }
         
         $this->xoaDuLieu($table, $id);
         return redirect()->back()->with('thongbao', 'Đã xóa vĩnh viễn');        
      }
      else if(isset($request->ckb_dulieu))
      {
         $list_request = $request->ckb_dulieu;
         foreach ($list_request as $data_request) {
         	$array_request = explode('_', $data_request);
	         $id = $array_request[0];
	         $table = $array_request[1];
            if($this->check_parent($table, $id))
            {
               if($table == 'theloai')
                  return redirect()->back()->with('thongbao', 'Không thể xóa vì nó là cha của thể loại khác')->with('danger', true);
               else
                  return redirect()->back()->with('thongbao', 'Không thể xóa vì nó là cha của nhóm sản phẩm khác')->with('danger', true);
            }

            switch ($table) 
            {
               case 'sanpham':
                  $this->xoaHinhSanPham($id);
                  break;
               case 'hangsanxuat':
                  $this->xoaHinhHangSanXuat($id);
                  break;
               case 'donhang':
                  $this->xoaDonHang($id);
                  break;
               default:
                  break;
            }

            $this->xoaDuLieu($table, $id);
         }
         return redirect()->back()->with('thongbao', 'Đã xóa vĩnh viễn');
      }
      else
      {
         return redirect()->back()->with('thongbao', 'Không có gì để xóa');
      }
   }

   private function duaVaoThungRac($table, $id)
   {
   	DB::table($table)
         ->where('id', $id)
         ->update(['trangthai' => 0]);
   }

   private function check_parent($table, $parent_id)
   {
      switch ($table) {
         case 'theloai':
            $check = DB::table($table)
               ->where('parent_id', $parent_id)
               ->count();
            if($check > 0)
               return true;
            break;
         case 'nhomsanpham':
            $check = DB::table($table)
               ->where('parent_id', $parent_id)
               ->count();
            if($check > 0)
               return true;
            break;
         default:
            break;
      }

      return false;
   }

   private function xoaDuLieu($table, $id)
   {
   	DB::table($table)->where('id', $id)->delete();
   }

   private function xoaHinhSanPham($id)
   {
      $sanpham = Sanpham::find($id);
      if(file_exists(public_path() . '/uploads/anhsanpham/' . $sanpham->anhsanpham))
      {
         File::delete(public_path() . '/uploads/anhsanpham/' . $sanpham->anhsanpham);
      }
      $danhsachhinhanh = Sanpham::find($id)->hinhsanpham;
      foreach ($danhsachhinhanh as $hinhanh) {
         if(file_exists(public_path() . '/uploads/hinhanhsanpham/' . $hinhanh->lienket))
         {
            File::delete(public_path() . '/uploads/hinhanhsanpham/' . $hinhanh->lienket);
         }
      }

      DB::table('hinhsanpham')->where('sanpham_id', $id)->delete();
   }

   private function xoaHinhHangSanXuat($id)
   {
      $hangsanxuat = Hangsanxuat::findOrFail($id);
      if(file_exists(public_path() . '/uploads/hangsanxuat/' . $hangsanxuat->logohang))
      {
         File::delete(public_path() . '/uploads/hangsanxuat/' . $hangsanxuat->logohang);
      }
   }

   private function xoaDonHang($id)
   {
      DB::table('chitietdonhang')->where('donhang_id', $id)->delete();
   }

}
