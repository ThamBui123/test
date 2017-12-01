<nav>
  <div class="container">
    <div class="nav-inner">
      <div class="logo-small">
        <div class="top-cart-contain" style="margin-top: 4px;" id="top-cart-contain-two">
          <div class="mini-cart" style="text-align: right;">
            @include('site.blocks.template.model-cart')
          </div>
        </div>
      </div>
      <div class="hidden-desktop" id="mobile-menu">
        <ul class="navmenu">
          <li>
            <div class="menutop">
              <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
              <h2>Menu</h2>
            </div>
            <ul class="submenu">
              <li>
                <ul class="topnav">
                  <li class="level0 nav-10 level-top "> 
                    <a class="level-top" href="{{ route('home') }}"> <span>Trang chủ</span> 
                  </a> 
                  </li>
                  @php
                    $mobile_menu = \App\Models\Theloai::where('trangthai', 1)->get();
                  @endphp
                  @foreach ($mobile_menu as $menu_nhomsanpham)
                  <li class="level0 nav-6 level-top"> <a class="level-top" href="{{ route('getTheLoaiSanPham', $menu_nhomsanpham->slugtl) }}"> 
                    <span>{{ $menu_nhomsanpham->tentheloai }}</span> 
                   </a>
                    @php
                    $theloaicon = DB::table('theloai')->where('trangthai', 1)->get();
                    @endphp
                    @if (!$theloaicon->isEmpty())
                    <ul class="level0">
                      @foreach ($theloaicon as $theloai)
                      <li class="level1 first">
                        <a href="{{ route('getTheLoaiSanPham', $theloai->slugtl) }}">
                          <span>{{ $theloai->tentheloai }}</span>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                    @else
                    <li class="level0 nav-10 level-top "> 
                      <a class="level-top" href="{{ route('getTheLoaiSanPham', $theloai->slugtl) }}"> <span>{{ $theloai->tentheloai }}</span> 
                    </a> 
                    </li>
                    @endif
                  </li>
                  @endforeach

                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>      
      <ul id="nav" class="hidden-xs">
        <li id="nav-home"><a href="{{ route('home') }}" class="active"><span>Trang chủ</span> </a>
        </li>
        @php
          $desktop_menu = \App\Models\Theloai::where('trangthai', 1)->get();
        @endphp
        @foreach ($desktop_menu as $menu_nhomsanpham)
        <li class="level0 nav-5 level-top first"> <a class="level-top" href="{{ route('getTheLoaiSanPham', $menu_nhomsanpham->slugtl) }}"> <span>{{ $menu_nhomsanpham->tentheloai }}</span> </a>
          <div class="level0-wrapper dropdown-6col">
            <div class="level0-wrapper2">
              <div class="nav-block nav-block-center">
                <ul class="level0">
                    

                  @php
                    $sanpham_banchay = \App\Models\Sanpham::nhomsanphambanchay($menu_nhomsanpham->id);
                  @endphp
                  @if(!$sanpham_banchay->isEmpty())
                  <li class="level3 nav-6-1 parent item"> <a href="{{ route('getTheLoaiSanPham', $menu_nhomsanpham->slugtl) }}?sortby=hot&oderby=desc"><span>Đang hot</span></a> 
                    <ul class="level1">
                      @foreach ($sanpham_banchay as $sanpham)
                      <li class="level2 nav-6-1-1"> <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"><span>{{ $sanpham->tensanpham }}</span></a> </li>
                      @endforeach
                    </ul>
                  </li>
                  @endif
                  <li class="level3 nav-6-1 parent item"> <a href="{{ route('getTheLoaiSanPham', $menu_nhomsanpham->slugtl) }}?oderby=desc"><span>Mới nhất</span></a> 
                    <ul class="level1">
                      @php
                        $query = DB::table('sanpham')->join('theloai', 'theloai.id', '=', 'sanpham.theloai_id');
                        $sanpham_moi = $query->where('theloai.id', $menu_nhomsanpham->id)->where('sanpham.trangthai', 1)->limit(6)->orderBy('sanpham.id', 'desc')->get();
                      @endphp
                      @foreach ($sanpham_moi as $sanpham)
                      <li class="level2 nav-6-1-1"> <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"><span>{{ $sanpham->tensanpham }}</span></a> </li>
                      @endforeach
                    </ul>
                  </li>
                  
                  <li class="level3 nav-6-1 parent item"> <a href="{{ route('getTheLoaiSanPham', $menu_nhomsanpham->slugtl .'?orderby=desc') }}?oderby=desc"><span>Ngẫu nhiên</span></a> 
                    <ul class="level1">
                      @php
                        $query = DB::table('sanpham')->join('theloai', 'theloai.id', '=', 'sanpham.theloai_id');
                        $sanpham_ngaunhien = $query->where('theloai.id', $menu_nhomsanpham->id)->where('sanpham.trangthai', 1)->limit(6)->inRandomOrder()->get();
                      @endphp
                      @foreach ($sanpham_ngaunhien as $sanpham)
                      <li class="level2 nav-6-1-1"> <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"><span>{{ $sanpham->tensanpham }}</span></a> </li>
                      @endforeach
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </li>
        @endforeach

      <!--   <li class="nav-custom-link level0 level-top parent"> <a class="level-top" style="cursor: pointer;"><span>Đang hot</span></a>
          <div class="level0-wrapper custom-menu">
            <div class="header-nav-dropdown-wrapper clearer">
              @php
              $sanpham_danghot = \App\Models\Sanpham::sanphambanchay(4);
              @endphp
              @foreach ($sanpham_danghot as $sanpham)
              <div class="grid12-5">
                <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}" title="{{ $sanpham->tensanpham }}">
                  <div class="custom_img" style="background-image: url('{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}');">
                  </div>
                </a>
                 <p><a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}" title="{{ $sanpham->tensanpham }}">{{ str_limit($sanpham->tensanpham, 30) }}</a>
                 </p>
                <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}" title="{{ $sanpham->tensanpham }}" class="learn_more_btn"><span>Chi tiết</span></a>
              </div>
              @endforeach
            </div>
          </div>
        </li> -->
        <li><a href="{{ route('getListTinTuc') }}"><span>Tin tức mới</span> </a>
        </li>
      </ul>
    </div>
  </div>
</nav>