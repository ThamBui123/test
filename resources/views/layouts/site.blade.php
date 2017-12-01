<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<!-- <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" /> -->
<link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="{{ asset('css/site/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/site/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/site/jquery-ui.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/site/form-validation.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/admin/jquery-confirm.min.css') }}"  type="text/css"/>
<link rel="stylesheet" href="{{ asset('css/site/fancybox.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/site/font-awesome.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/site/style.css') }}" type="text/css">
@yield('style')
</head>
<body>
<div id="fb-root"></div>
{{-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1625097767762563";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script> --}}
<div class="page">
  @if (!Auth::check())
  @include('site.common.modeldangnhap')
  @endif 
  <header class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row"> 
          <div class="col-xs-6">
            @if(Auth::check())
            <div class="welcome-msg" title="{{ Auth::user()->hovaten }}"> 
            Hi! {{ str_limit(Auth::user()->hovaten, 10) }}
            </div>
             @endif
          </div>
          <div class="col-xs-6"> 
            <div class="toplinks">
              <div class="links">
                @if (!Auth::check())
                <div class="login"><a title="Đăng nhập" href="javascript:;" data-toggle="modal" data-target="#model_dangnhap"><span class="hidden-xs">Đăng nhập</span></a></div>
                <div class="myaccount"><a title="Đăng ký tài khoản mới" href="{{ route('getDangKy') }}"><span class="hidden-xs">Đăng ký</span></a></div>
                @else
                <div class="check"><a title="Tài khoản" href="{{ route('getTaiKhoan') }}"><span class="hidden-xs">Tài khoản</span></a></div>
                <div class="myaccount"><a title="Đăng xuất tài khoản" href="javascript:;" onclick="return xacnhan_redirect('{{ route('getDangXuat') }}');"><span class="hidden-xs">Đăng xuất</span></a></div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2"> 
          <a class="logo" title="Trang chủ" href="{{ route('home') }}"><img alt="Trang chủ" src="{{ asset('img/site/logo.png') }}"></a> 
        </div>
        <div class="col-lg-8 col-sm-6 col-md-8"> 
          <div class="search-box">
            <form action="{{ route('getTimKiem') }}" method="get" name="Categories">
              <select name="category_id" class="cate-dropdown hidden-xs" id="main-search-key">
                @php
                  $timkiem_theloai = DB::table('theloai')->where('trangthai', 1)->get();
                @endphp
                <option value="0">Tất cả thể loại</option>
                @foreach ($timkiem_theloai as $theloai)
                  <option value="{{ $theloai->id }}" {{ request()->get('category_id') == $theloai->id ? 'selected' : '' }}>{{ $theloai->tentheloai }}</option>
                @endforeach
              </select>
              <input type="text" placeholder="Sản phẩm tìm kiểm..." value="{{ request()->get('search_key') }}" maxlength="70" class="" name="search_key" id="search">
              <button id="submit-button" class="search-btn-bg"><span>Search</span></button>
            </form>
          </div>
        </div>
        <div class="col-lg-2 col-sm-3 col-md-2">
          <div class="top-cart-contain">
            <div class="mini-cart">
              @include('site.blocks.template.model-cart')
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  @include('site.blocks.template.navbar')
  @yield('content')
  <input id="token_key" value="{{ csrf_token() }}" type="hidden">
   <footer class="footer wow bounceInUp animated">
    @include('site.blocks.template.logohang')
    <div class="footer-top">
      <div class="container">
        @php
          $cuahang_info = DB::table('cuahang')->first();
        @endphp
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-7">
            <div class="block-subscribe">
              <div class="newsletter">
                <h4>{{ str_limit($cuahang_info->gioithieu, 100) }}</h4>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="social">
              <ul>
                <li class="fb"><a href="#"></a></li>
                <li class="tw"><a href="#"></a></li>
                <li class="googleplus"><a href="#"></a></li>
                <li class="rss"><a href="#"></a></li>
                <li class="pintrest"><a href="#"></a></li>
                <li class="linkedin"><a href="#"></a></li>
                <li class="youtube"><a href="#"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-middle container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="footer-logo"><a href="{{ route('home') }}" title="Trang chủ"><img src="{{ asset('img/site/logo.png') }}" alt="Trang chủ"></a></div>
          <p>Website đặc sản Đà Lạt, tinh túy đặc sản từ xứ mộng mơ</p>
          <div class="payment-accept">
            <div>
              <img src="{{ asset('img/site/payment-1.png') }}" alt="payment"> <img src="{{ asset('img/site/payment-2.png') }}" alt="payment"> <img src="{{ asset('img/site/payment-3.png') }}" alt="payment"> <img src="{{ asset('img/site/payment-4.png') }}" alt="payment">
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4">
          <h4>Hướng dẫn sử dụng</h4>
          <ul class="links">
            <li class="first"><a href="{{ route('getPage', 'gioi-thieu') }}" title="Hướng dẫn mua hàng">Giới thiệu</a></li>
            <li><a href="{{ route('getPage', 'dieu-khoan') }}" title="Điều khoản">Điều khoản</a></li>
            <li><a href="{{ route('getPage', 'hinh-thuc-thanh-toan') }}" title="Hình thức thanh toán">Hình thức thanh toán</a></li>
            <li><a href="{{ route('getPage', 'van-chuyen') }}" title="Vận chuyển">Vận chuyển</a></li>
            <li class="last"><a href="{{ route('getPage', 'lien-he') }}" title="Liên hệ">Liên hệ</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-4">
          <ul class="links">
            <li class="first"><a href="{{ route('getPage', 'huong-dan-mua-hang') }}" title="Hướng dẫn mua hàng">Hướng dẫn mua hàng</a></li>
            <li><a href="{{ route('getPage', 'dieu-khoan') }}" title="Điều khoản">Điều khoản</a></li>
            <li><a href="{{ route('getPage', 'hinh-thuc-thanh-toan') }}" title="Hình thức thanh toán">Hình thức thanh toán</a></li>
            <li><a href="{{ route('getPage', 'van-chuyen') }}" title="Vận chuyển">Vận chuyển</a></li>
            <li class="last"><a href="{{ route('getPage', 'lien-he') }}" title="Liên hệ">Liên hệ</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-4">
          <h4>Liện hệ với chúng tôi</h4>
          <div class="contacts-info">
            <address>
            <i class="add-icon">&nbsp;</i>{{ $cuahang_info->diachi }}<br>&nbsp;
            </address>
            <div class="phone-footer"><i class="phone-icon">&nbsp;</i> {{ $cuahang_info->sodienthoai }}</div>
            <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:{{ $cuahang_info->email }}?Subject=Liên%20hệ%20với%20chúng%20tôi">{{ $cuahang_info->email }}</a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
      <div class="row">
        <div class="col-sm-5 col-xs-12 coppyright"> &copy; {{ date('Y') }}. All Rights Reserved. </div>
        <div class="col-sm-7 col-xs-12 company-links">
          <ul class="links">
            <li><a href="https://facebook.com/hoangphut1995" title="Nguyễn Hoàng Phút">Bùi Thị Thắm</a></li>
            <li class="last"><a href="http://ctu.edu.vn" title="Đại học Cần Thơ">Đại học Cần Thơ</a></li>
          </ul>
        </div></div>
      </div>
    </div>
  </footer>
  <div id="_load_ajax"></div>
</div>
<script type="text/javascript" src="{{ asset('js/site/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/form-validator/jquery.form-validator.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/common.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/owl.carousel.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/toggle.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/jquery.fancybox.js') }}"></script>  
<script type="text/javascript" src="{{ asset('js/site/jquery.flexslider.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/revslider.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/site/jquery.masknumber.js') }}"></script> 
<script src="{{ asset('js/site/jquery-confirm.min.js') }}"></script>
@yield('script')
@include('partials.site_alert')
</body>
</html>