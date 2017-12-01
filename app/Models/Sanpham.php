<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Config;

class Sanpham extends Model
{
   protected $table = 'sanpham';

   public function theloai()
   {
      return $this->belongsTo('App\Models\Theloai');
   }

   public function diemvote()
   {
      $diemvote = $this->hasMany('App\Models\Votes')
         ->avg('diemvote');
      return $diemvote ? $diemvote : 5;  
   }

   public function hangsanxuat()
   {
      return $this->belongsTo('App\Models\Hangsanxuat');
   }

   public function binhluan()
   {
      return $this->hasMany('App\Models\Binhluan');
   }

   public function khuyenmai()
   {
      return $this->hasMany('App\Models\Khuyenmai');
   }

   public function hinhsanpham()
   {
      return $this->hasMany('App\Models\Hinhsanpham');
   }

   public static function check_sanpham($sanpham_id)
   {
      return !empty(Sanpham::find($sanpham_id));
   }

   public static function findBySlug($slug)
   {
      return Sanpham::where('slugsp', $slug)
         ->where('trangthai', 1)
         ->whereNotNull('theloai_id')
         ->whereNotNull('hangsanxuat_id')
         ->firstOrFail();
   }

   public static function soluong($sanpham_id)
   {
      return Sanpham::select('soluongsanpham')
         ->where('id', $sanpham_id)
         ->first()
         ->soluongsanpham;
   }

    
   
   public static function sanpham_hethang()
   {
      $sanpham_hethang = Sanpham::where('trangthai', 1)
         ->where('soluongsanpham', '<=', 0)
         ->get();
      return $sanpham_hethang;
   }

   public static function moinhat($limit = 15)
   {
      return Sanpham::where('trangthai', 1)
         ->orderBy('id', 'desc')
         ->limit($limit)
         ->get();
   }

   public static function dacbiet($limit = 15)
   {
      return Sanpham::where('trangthai', 1)
         ->where('sanphamdacbiet', 1)
         ->orderBy('id', 'desc')
         ->limit($limit)
         ->get();
   }

   

   public static function tongso_sanpham()
   {
      $tongso_sanpham =  DB::table('chitietnhaphang')
      ->join('nhaphang', 'nhaphang.id', '=', 'chitietnhaphang.nhaphang_id')
      ->sum('soluongnhap');
      return $tongso_sanpham > 0 ? $tongso_sanpham : 1;
   }

   public static function tongso_sanpham_daban()
   {
      $soluong_sanpham_daban = DB::table('chitietdonhang')
      ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
      ->whereNotNull('donhang.ngaynhan')
      ->sum('soluong');

      return $soluong_sanpham_daban;
   }

   public function ketiep(){
      $ketiep = Sanpham::where('id', '<', $this->id)
      ->where('trangthai', 1)
      ->orderBy('id','asc')
      ->first();

      if(!$ketiep)
         $ketiep = Sanpham::where('trangthai', 1)
      ->orderBy('id','desc')
      ->first();

     return $ketiep;
   }

   public function truocdo(){
      $truocdo = Sanpham::where('id', '>', $this->id)
      ->where('trangthai', 1)
      ->orderBy('id','asc')
      ->first();

      if(!$truocdo)
         $truocdo = Sanpham::where('trangthai', 1)
      ->orderBy('id','desc')
      ->first();

     return $truocdo;
   }

   public function soluongchuathanhtoan()
   {
      $soluong_sanpham = DB::table('chitietdonhang')
      ->join('donhang', 'donhang.id', '=', 'chitietdonhang.donhang_id')
      ->where('donhang.trangthai', 1)
      ->where('donhang.tinhtrangdonhang', 0)
      ->where('sanpham_id', $this->id)
      ->sum('soluong');
      
      return $soluong_sanpham > 0 ? $soluong_sanpham : 0;
   }

   public static function sanphambanchay($limit = 10)
   {
      $sanphambanchay = DB::table('chitietdonhang')
      ->select('sanpham.id', 'sanpham.tensanpham', 'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham', 'sanpham.created_at' , DB::raw('SUM(chitietdonhang.soluong) as total_sales'))
      ->join('sanpham', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
      ->where('sanpham.trangthai', 1)
      ->orderBy('total_sales', 'desc')
      ->groupBy('sanpham.id')
      ->groupBy('sanpham.id', 'sanpham.tensanpham', 'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham', 'sanpham.created_at')
      ->limit($limit)->get();
      return $sanphambanchay;
   }

   public static function nhomsanphambanchay($nhomsanpham_id, $limit = 2)
   {
      $sanphambanchay = DB::table('chitietdonhang')
      ->select('sanpham.id', 'sanpham.tensanpham', 'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham' , DB::raw('SUM(chitietdonhang.soluong) as total_sales'))
      ->join('sanpham', 'sanpham.id', '=', 'chitietdonhang.sanpham_id')
      ->join('theloai', 'theloai.id', '=', 'sanpham.theloai_id')
      //->join('nhomsanpham', 'nhomsanpham.id', '=', 'theloai.nhomsanpham_id')
      ->where('sanpham.trangthai', 1)
      ->where('theloai.id', $nhomsanpham_id)
      ->orderBy('total_sales', 'desc')
      ->groupBy('sanpham.id')
      ->groupBy('sanpham.id', 'sanpham.tensanpham', 'sanpham.slugsp', 'sanpham.anhsanpham', 'sanpham.giasanpham')
      ->limit($limit)->get();
      return $sanphambanchay;
   }

   public static function get_data($request)
   {
      $pagination = Config::get('settings.admin_pages');
      $sortById = 'sanpham.id';
      $orderBy = 'desc';
      $query = Sanpham::select('*');
      $query->whereNotNull('theloai_id');
      $query->whereNotNull('hangsanxuat_id');
      $query->where('sanpham.trangthai', 1);

      if($request->has('hienthi') && intval($request->hienthi) > 0)
      {
         $pagination = $request->hienthi;
      }

      if($request->has('sapxep') && $request->sapxep === 'giamdan')
      {
         $orderBy = 'asc';
      }

      if($request->has('masanpham'))
      {
         $query->where('sanpham.masanpham', 'like', "%$request->masanpham%");
      }

      if($request->has('tensanpham'))
      {
         $query->where('sanpham.tensanpham', 'like', "%$request->tensanpham%");
      }

      if($request->has('giasanpham'))
      {
         $giasanpham = str_replace(',', '', $request->giasanpham);
         $query->where('sanpham.giasanpham', '>=', intval($giasanpham));
      }

      if($request->has('theloai_id') && intval($request->theloai_id) > 0)
      {
         $query->where('sanpham.theloai_id', $request->theloai_id);
      }

      if($request->has('hangsanxuat_id') && intval($request->hangsanxuat_id) > 0)
      {
         $query->where('sanpham.hangsanxuat_id', $request->hangsanxuat_id);
      }

     

      $query->orderBy($sortById, $orderBy);
      return $query->paginate($pagination);
   }

}
