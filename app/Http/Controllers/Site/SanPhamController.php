<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sanpham;
use App\Models\Votes;
use App\Models\Binhluan;
use Auth;
use DB;

class SanPhamController extends Controller
{
   public function getSanPham($slugsp, Request $request)
   {
      $sanpham = Sanpham::findBySlug($slugsp);
      $sanpham_id = $sanpham->id;
      if($request->ajax())
      {
         return view('site.blocks.sanpham.binhluan', [
            'list_binhluan' =>$this->list_binhluan($sanpham_id)
         ]);
      }

   	$sanpham_lienquan = explode(',', $sanpham->sanphamlienquan);

      $list_sanpham_gioithieu = Sanpham::where('theloai_id', $sanpham->theloai_id)
         ->where('id', '<>', $sanpham_id)
         ->where('trangthai', 1)
         ->limit(5)
         ->get();

   	$data = [
   		'sanpham' => $sanpham,
   		'sanpham_truocdo' => $sanpham->truocdo(),
   		'sanpham_ketiep' => $sanpham->ketiep(),
   		'sanpham_lienquan' => array_filter($sanpham_lienquan),
         'list_binhluan' => $this->list_binhluan($sanpham_id),
         'list_sanpham_gioithieu' => $list_sanpham_gioithieu,
         'check_vote' => Votes::check_exits($sanpham_id)
   	];

   	return view('site.sanpham.chitiet', $data);
   }

   public function postBinhLuan(Request $request)
   {
      $binhluan = new Binhluan;
      $binhluan->sanpham_id = $request->sanpham_id;
      $binhluan->khachhang_id = Auth::user()->id;
      $binhluan->parent_id = $request->parent_id;
      $binhluan->noidung = $request->noidung;
      $binhluan->daxem = 0;
      $binhluan->save();
   }

   private function list_binhluan($sanpham_id)
   {
      $pagination = 20;
      $list_binhluan = DB::table('binhluan');
      $list_binhluan->select('binhluan.*', 'khachhang.hovaten', 'sanpham.tensanpham', 'khachhang.gioitinh');
      $list_binhluan->join('sanpham', 'sanpham.id', '=', 'binhluan.sanpham_id');
      $list_binhluan->join('khachhang', 'khachhang.id', '=', 'binhluan.khachhang_id');
      $list_binhluan->where('binhluan.sanpham_id', $sanpham_id);
      // $list_binhluan->where('binhluan.daduyet', 1);
      $list_binhluan->where('binhluan.trangthai', 1);
      // $list_binhluan->orderBy('binhluan.id');
      $list_binhluan->orderBy('binhluan.parent_id');

      return $list_binhluan->paginate($pagination);
   }

   public function voteSanPham(Request $request)
   {
      if($request->ajax())
      {
         $diemvote = $request->diemvote;
         $sanpham_id = $request->sanpham_id;

         if($diemvote > 5 || $diemvote < 0)
            return;
         
         if(Votes::check_exits($sanpham_id))
         {
            echo "Bạn đã đánh giá sản phẩm này rồi";
         }
         else
         {
            $vote = new Votes;
            $vote->sanpham_id = $sanpham_id;
            $vote->ip_address = $request->ip();
            $vote->diemvote = $diemvote;
            $vote->save();
            echo "Cám ơn bạn đã đánh giá sản phẩm này";
         }
      }
   }
}
