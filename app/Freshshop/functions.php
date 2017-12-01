<?php

if(!function_exists('left_menu'))
{
	function left_menu($menus, $id_parent = 0, $str = '') 
	{
	    $menu_tmp = array();
	    foreach ($menus as $key => $item) {
	        if ((int) $item['parent_id'] == (int) $id_parent) {
	            $menu_tmp[] = $item;
	        }
	    }
	    if ($menu_tmp) 
	    {
	        echo '<ul>';
	        foreach ($menu_tmp as $item) 
	        {
	        		echo '<li>';
	        		if($item['parent_id'] == 0)
	        		{
						echo '<a href="'.url('the-loai/' .$item['slugtl']).'"><b><span>'.$item['tentheloai'].'</span></b></a>';
	        		}
	        		else
	        		{
	        			echo $str . '<a href="'.url('the-loai/' .$item['slugtl']).'"> <span>'.$item['tentheloai'].'</span> </a>';
	        		}
	        		
	            left_menu($menus, $item['id'], $str . '&nbsp;&nbsp;-');
	            echo '</li>';
	        }
	        echo '</ul>';
	    }
	}
}

if(!function_exists('site_tatca_theloai'))
{
	function site_tatca_theloai($data, $parent_id = 0)
	{
		echo '<ul>';
		foreach ($data as $value) {
		   $id = $value['id'];
		   $name = $value['tentheloai'];
		   if($value['parent_id'] == $parent_id){
		   	
		   	echo '<li> <a href="'.route('getTheLoaiSanPham', $value['slugtl']).'">'.$value['tentheloai'].'</a>';
			   site_tatca_theloai($data, $id);
		   	echo '</li>';
		   }
	   }
	   echo '</ul>';
	}
}



if(!function_exists('admin_list_theloai'))
{
	function admin_list_theloai($data, $parent_id = 0, $str = '--')
	{
		foreach ($data->toArray()['data'] as $value) {
		   $id = $value->id;
		   $name = $value->tentheloai;
		   if($value->parent_id == $parent_id){
		   	echo '<tr class="gradeX">';
		   	echo '<td><input type="checkbox" name="ckb_dulieu[]" value="'.$id.'_'.'theloai'.'" /></td>';
		   	echo '<td>'.$str." ".$name.'</td>';
		   	echo '<td>'.str_limit($value->gioithieutl, 50).'</td>';
		   	echo '<td>';
		   	if($value->trangthai == 2)
		   		echo 'Nháp';
		   	else echo 'Hiển thị';
		   	echo '</td>';
		   	echo '<td class="center">';
		   	echo '<a href="'.route('getSuaTheLoai', $id).'" class="btn btn-mini btn-info">Sửa</a> ';
		   	echo '<button type="button" class="btn btn-mini btn-danger xacnhan" data-action="'.route('postThungRac').'" name="del_dulieu" data-value="'.$id .'_'. 'theloai' .'">Xóa</button>';
		   	echo '</td>';
		   	echo '</tr>';

			   admin_list_theloai($data, $id, $str." --");

		   }
	   }   
	}
}


if(!function_exists('admin_list_nhomsanpham'))
{
	function admin_list_nhomsanpham($data, $parent_id = 0, $str = '--')
	{
		foreach ($data->toArray()['data'] as $value) {
		   $id = $value->id;
		   $name = $value->tennhomsanpham;
		   if($value->parent_id == $parent_id){
		   	echo '<tr class="gradeX">';
		   	echo '<td><input type="checkbox" name="ckb_dulieu[]" value="'.$id.'_'.'nhomsanpham'.'" /></td>';
		   	echo '<td>'.$str." ".$name.'</td>';
		   	echo '<td>'.str_limit($value->gioithieunsp, 50).'</td>';
		   	echo '<td>';
		   	if($value->trangthai == 2)
		   		echo 'Nháp';
		   	else echo 'Hiển thị';
		   	echo '</td>';
		   	echo '<td class="center">';
		   	echo '<a href="'.route('getSuaNhomSanPham', $id).'" class="btn btn-mini btn-info">Sửa</a> ';
		   	echo '<button type="button" class="btn btn-mini btn-danger xacnhan" data-action="'.route('postThungRac').'" name="del_dulieu" data-value="'.$id .'_'. 'theloai' .'">Xóa</button>';
		   	echo '</td>';
		   	echo '</tr>';

			   admin_list_nhomsanpham($data, $id, $str." --");

		   }
	   }   
	}
}

if(!function_exists('list_binh_luan'))
{
	function list_binh_luan($data, $parent_id = 0)
	{
		foreach ($data->toArray()['data'] as $value) {
		   $id = $value->id;
		   $hovaten = $value->hovaten;
		   $sanpham_id = $value->sanpham_id;
		   $noidung = $value->noidung;
		   $ngaygui = dinh_dang_ngay_gio($value->created_at);
		   if($value->parent_id == $parent_id){
		   	echo '<div class="media">';
		   	echo '<div class="media-left">';
		   	echo '<a href="#">';
		   	if($value->gioitinh == 1)
		   		echo '<img class="media-object" src="'.asset('img/site/avatar_man.png').'">';
		   	else
		   		echo '<img class="media-object" src="'.asset('img/site/avatar_women.png').'">';
		   	echo '</a></div>';
		   	echo '<div class="media-body">';
		   	echo '<h5 class="media-heading">';
		   	if(auth()->check())
		   	echo "$hovaten &nbsp;|&nbsp;<a href='javascript:;' data-parentid='$id' class='reply_cmt' data-hovaten='$hovaten'>Trả lời</a><br><small>$ngaygui</small>";
		   	else
		   		echo "$hovaten &nbsp;|&nbsp;<a href='javascript:;' data-parentid='$id' class='reply_cmt' data-hovaten='$hovaten' data-toggle='modal' data-target='#model_dangnhap'>Trả lời</a><br><small>$ngaygui</small>";
		   	echo "</h5><p> $noidung </p>";
		   	list_binh_luan($data, $id);
		   	echo '</div></div>';
		   }
	   }
	}
}

if(!function_exists('dinh_dang_ngay'))
{
	function dinh_dang_ngay($ngaythangnam)
	{
		if(empty($ngaythangnam))
			return null;
		return date('d-m-Y', strtotime($ngaythangnam));
	}
}

if(!function_exists('dinh_dang_ngay_gio'))
{
	function dinh_dang_ngay_gio($ngaythangnam)
	{
		if(empty($ngaythangnam))
			return null;
		return date('d-m-Y | H:i:s', strtotime($ngaythangnam));
	}
}

if(!function_exists('dinh_dang_ngay_mysql'))
{
	function dinh_dang_ngay_mysql($ngaythangnam)
	{
		return date('Y-m-d', strtotime($ngaythangnam));
	}
}

if(!function_exists('check_sanphammoi'))
{
	function check_sanphammoi($ngaythangnam)
	{
      $kiemtra = (strtotime(date('Y-m-d H:i:s')) - strtotime($ngaythangnam)) / (60 * 60 * 24);
      if($kiemtra <= 30)
         return true;
      return false;
	}
}

if(!function_exists('admin_link_sapxep'))
{
	function admin_link_sapxep()
	{
		$link = '';
		$sapxep_tangdan = false;
		if(request()->get('sapxep') == "giamdan")
		{
	      $link = "?sapxep=tangdan";
	      $sapxep_tangdan = true;
		}
	   else
	   	$link = "?sapxep=giamdan";

      foreach (request()->except('sapxep', 'hienthi') as $key => $value) {
      	$link .= "&$key=$value";
      }

      $ten_loai = $sapxep_tangdan ? "<i class='icon-arrow-up'></i> [Tăng dần]" : "<i class='icon-arrow-down'></i> [Giảm dần]";
      $new_link = "<a href='$link'>&nbsp; &nbsp; $ten_loai</a>";
      $link .= "&hienthi=";
      $options = "<option value='df'>Hiển thị mặc định</option>";
      for ($i=1; $i <=3; $i++) { 
      	$value = $i*10;
      	$selected = request()->hienthi == $value ? 'selected' : '';
      	$options .= "<option value='$value' $selected>Hiển thị $value</option>";
      }

      $new_link .= "<div class='mytitle_tool'><select id='_change_hienthi' class='span12' onchange='change_hienthi(\"".$link."\");'>$options</select></div>";
      return $new_link;
	}
}

if(!function_exists('remove_param_url'))
{
	function remove_param_url($param)
	{
		$url = url()->full();
		$url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*$/', '', $url);
      $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*&/', '$1', $url);
      return $url;
	}
}

if(!function_exists('phamtramvote'))
{
	function phamtramvote($sanpham_id)
	{
		$diemvote = DB::table('votes')
         ->where('sanpham_id', $sanpham_id)
         ->avg('diemvote');
      $diemvote = $diemvote ? $diemvote : 5;
      return ($diemvote * 100 / 5);
	}
}

if(!function_exists('phamtramgiamgia'))
{
	function phamtramgiamgia($giagiam, $giaban)
	{
      return '-' . floor(100-($giagiam * 100 / $giaban)) . '%';
	}
}

if(!function_exists('check_donhang_hoanthanh'))
{
	function check_donhang_hoanthanh($donhang_id)
	{
      $check = DB::table('chitietdonhang')
	      ->where('donhang_id', $donhang_id)
         ->whereColumn('soluong', '<>', 'dagiao')
         ->count();
      return $check === 0;
	}
}

?>