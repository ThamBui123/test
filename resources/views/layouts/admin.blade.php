<!DOCTYPE html>
<html lang="en">
<head>
<title>Quản lý | @yield('title')</title>
<meta charset="UTF-8" />
<!-- <link rel="icon" href="{{ asset('favicon.ico') }}"/> -->
<link rel="shortcut icon" href="{{ asset('favicon.png') }}"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/matrix-media.css') }}" />
@yield('style')
<link rel="stylesheet" href="{{ asset('css/admin/font-awesome.css') }}"  />
<link rel="stylesheet" href="{{ asset('css/admin/jquery.gritter.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/form-validation.css') }}"  type="text/css"/>
<link rel="stylesheet" href="{{ asset('css/admin/jquery-confirm.min.css') }}"  type="text/css"/>
</head>
<body>
<div id="header">
  <h1><a href="{{ route('dashboard') }}">Trang chủ</a></h1>
</div>
@php
$tongsobinhluan_moi = \App\Models\Binhluan::tongso_binhluan_moi();
$tongsodonhang_moi = \App\Models\Donhang::tongso_donhang_moi();  
$tongso_donhang_chuathanhtoan = \App\Models\Donhang::tongso_donhang_chuathanhtoan();
$tongso_donhang = \App\Models\Donhang::tongso_donhang();
$tongso_sanpham = \App\Models\Sanpham::tongso_sanpham();
$tongso_sanpham_daban = \App\Models\Sanpham::tongso_sanpham_daban();
$sanpham_hethang = \App\Models\Sanpham::sanpham_hethang();
$thongbao_sanpham_hethang = $sanpham_hethang->count() > 0 ? $sanpham_hethang->count() : 0;
$list_sanpham_hethang = '';
foreach ($sanpham_hethang as $sanpham) {
  $list_sanpham_hethang .= $sanpham->id. '|';
}
$list_sanpham_hethang = rtrim($list_sanpham_hethang, '|');
@endphp
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Xin chào! {{ Auth::guard('nhanvien')->user()->hovaten }}</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="{{ route('getThongTinCaNhan') }}"><i class="icon-user"></i> Thông tin cá nhân</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('getDangXuatAdmin') }}"><i class="icon-key"></i> Đăng xuất</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text"> Thông báo</span> <span class="label label-important">{{ ($tongsobinhluan_moi + $tongsodonhang_moi + $thongbao_sanpham_hethang) }}</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
      @if((Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN') || (Auth::guard('nhanvien')->user()->nhomquyen->key === 'NVNH'))
        @if ($thongbao_sanpham_hethang > 0)
          <li><a title="" href="{{ route('getThemNhapHang') }}?nhaphang_sanpham={{ $list_sanpham_hethang }}"><i class="icon-plus"></i> Có {{ $sanpham_hethang->count() }} sản phẩm đã hết hàng cần nhập thêm</a></li>
          <li class="divider"></li>
        @endif
      @endif
      @if((Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN') || (Auth::guard('nhanvien')->user()->nhomquyen->key === 'NVDH'))
        @if ($tongsodonhang_moi > 0)
          <li><a href="{{ route('listDonHang') }}?tinhtrangdonhang=0"><i class="icon-plus"></i> Có {{ $tongsodonhang_moi }} đơn đang cần duyệt</a></li>
          <li class="divider"></li>
        @endif
      @endif
      @if ($tongsobinhluan_moi > 0)
        <li><a href="{{ route('listBinhLuan') }}?daxem=0"><i class="icon-plus"></i> Có {{ $tongsobinhluan_moi }} bình luận đang cần duyệt</a></li>
        <li class="divider"></li>
      @endif
      @if ($tongsobinhluan_moi <= 0 && $tongsodonhang_moi <= 0 && $thongbao_sanpham_hethang <= 0)
        <li><a title=""> Không có thông báo nào</a></li>
        <li class="divider"></li>
      @endif
      </ul>
    </li>
    @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
    <li class=""><a title="Cài đặt thông tin cửa hàng" href="{{ route('getCaiDat') }}"><i class="icon icon-cog"></i> <span class="text">Cài đặt</span></a></li>
    @endif
    <li class=""><a title="Đăng xuất" href="{{ route('getDangXuatAdmin') }}"><i class="icon icon-share-alt"></i> <span class="text">Đăng xuất</span></a></li>
  </ul>
</div>
<div id="sidebar"><a href="{{ route('dashboard') }}" class="visible-phone"><i class="icon icon-home"></i> Trang chủ</a>
  <ul class="sidebar-nav">
    <li class="mymenu">
      <a href="{{ route('dashboard') }}"><i class="icon icon-home"></i> <span>Trang chủ</span></a> 
    </li>
    @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
    <li class="submenu mymenu"> 
      <a href="#"><i class="icon icon-th-list"></i> <span>Quản lý danh mục</span> &nbsp; <span class="badge badge-info">8 mục</span></a>
        <ul>
          <li><a href="{{ route('listHangSanXuat') }}">Hãng sản xuất</a></li>
          <li><a href="{{ route('listTheLoai') }}">Thể loại</a></li>
          <li><a href="{{ route('listSanPham') }}">Sản phẩm</a></li>
          <li><a href="{{ route('listPhuongThucTT') }}">Phương thức thanh toán</a></li>
          <li><a href="{{ route('listPhuongThucVC') }}">Phương thức vận chuyển</a></li>
          <li><a href="{{ route('listTinTuc') }}">Tin tức</a></li>
          <li><a href="{{ route('listSliders') }}">Slider</a></li>
          <li class="mymenu"><a href="{{ route('listPages') }}"><span>Pages</span></a></li>
        </ul>
    </li>
    @endif

    @if(Auth::guard('nhanvien')->user()->nhomquyen->key !== 'NVNH')
    <li class="mymenu"><a href="{{ route('listDonHang') }}"><i class="icon-shopping-cart"></i> <span>Quản lý đơn hàng</span>@if($tongsodonhang_moi > 0) &nbsp; <span class="badge badge-important">{{ $tongsodonhang_moi }} mới</span>@endif</a></li>
    @endif
    @if(Auth::guard('nhanvien')->user()->nhomquyen->key !== 'NVDH')
    <li class="mymenu"><a href="{{ route('listNhapHang') }}"><i class=" icon-upload"></i> <span>Quản lý nhập hàng</span></a></li>
    @endif

    @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
    <li class="mymenu"><a href="{{ route('listBinhLuan') }}"><i class="icon-comment"></i> <span>Quản lý bình luận</span>@if($tongsobinhluan_moi > 0) &nbsp; <span class="badge badge-important">{{ $tongsobinhluan_moi }} mới</span>@endif</a></li>
    <li class="submenu mymenu"> 
      <a href="#"><i class="icon icon-th-list"></i> <span>Quản lý tài khoản</span> &nbsp; <span class="badge badge-info">2 mục</span></a>
        <ul>
            <li class="mymenu"><a href="{{ route('listKhachHang') }}"><i class=" icon-user"></i> <span>Khách hàng</span></a></li>
            <li class="mymenu"><a href="{{ route('listNhanVien') }}"><i class="icon-group"></i> <span>Nhân viên</span></a></li>
        </ul>
    </li>
    <li class="submenu mymenu"> <a href="#"><i class="icon-bar-chart"></i> <span>Quản lý thống kê</span> &nbsp; <span class="badge badge-info">4 mục</span></a>
      <ul>
        <li><a href="{{ route('getLoiNhuan') }}">Lợi nhuận</a></li>
        <li><a href="{{ route('listSanPhamDaBan') }}">Sản phẩm đã bán</a></li>
        <li><a href="{{ route('listSanPhamBanChay') }}">Sản phẩm bán chạy</a></li>
        <li><a href="{{ route('listSanPhamTonKho') }}">Sản phẩm tồn kho</a></li>
      </ul>
    </li>
    @endif
  </ul>
</div>
@yield('content')
<input id="token_key" value="{{ csrf_token() }}" type="hidden">
<div class="row-fluid">
  <div id="footer" class="span12"> {{ date('Y') }} &copy; Bùi Thị Thắm - B1304904 </div>
</div>
<script src="{{ asset('js/admin/jquery.min.js') }}"></script> 
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/admin/matrix.js') }}"></script>  
<script src="{{ asset('js/admin/jquery.number.js') }}"></script> 
<script src="{{ asset('js/admin/form-validator/jquery.form-validator.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery-confirm.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/admin/manager.js') }}"></script> 
@if(Auth::guard('nhanvien')->user()->nhomquyen->key != 'NVDH')
@if ($thongbao_sanpham_hethang > 0)
<script>
    $.gritter.add({
      title:  'Có {{ $sanpham_hethang->count() }} sản phẩm đã hết hàng',
      text: 'Hãy truy cập trang nhập hàng để nhập hàng<br><br><a class="notyfi" href="{{ route('getThemNhapHang') }}?nhaphang_sanpham={{ $list_sanpham_hethang }}">Xem chi tiết</a>',
      sticky: false
    });   
</script>
@endif
@endif
@if(Auth::guard('nhanvien')->user()->nhomquyen->key != 'NVNH')
@if ($tongsodonhang_moi > 0)
<script>
    $.gritter.add({
      title:  'Bạn có {{ $tongsodonhang_moi }} đơn hàng mới cần duyệt',
      text: 'Hãy truy cập trang đơn hàng để kiểm tra ngay<br><br><a class="notyfi" href="{{ route('listDonHang') }}?tinhtrangdonhang=0">Xem chi tiết</a>',
      sticky: false
    });   
</script>
@endif
@endif
@if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
@if ($tongsobinhluan_moi > 0)
<script>
    $.gritter.add({
      title:  'Bạn có {{ $tongsobinhluan_moi }} bình luận mới cần xem',
      text: 'Hãy truy cập trang bình luận để kiểm tra ngay<br><br><a class="notyfi" href="{{ route('listBinhLuan') }}?daxem=0">Xem chi tiết</a>',
      sticky: false
    });   
</script>
@endif
@endif
@yield('script')
</body>
</html>
