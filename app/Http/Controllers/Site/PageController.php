<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pages;

class PageController extends Controller
{
   public function getPage($slug)
   {
   	$page = Pages::where('slug', $slug)
	   	->where('trangthai', 1)
	   	->firstOrFail();

	   $pages = Pages::where('trangthai', 1)
		   ->where('id', '<>', $page->id)
	   	->get();

   	$data = [
   		'page' => $page,
   		'pages' => $pages,
   	];

   	return view('site.common.page', $data);
   }
}
