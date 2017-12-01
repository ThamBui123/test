<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Votes extends Model
{
   protected $table = 'votes';

   public static function check_exits($sanpham_id)
   {
   	$ip_address = request()->ip();
   	$count =  DB::table('votes')->where('sanpham_id', $sanpham_id)
	   	->where('ip_address', $ip_address)
	   	->count();
	   if($count > 0)
	   	return true;
	   return false;
   }
}
