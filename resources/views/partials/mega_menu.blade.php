<div class="col-md-3">
    <div class="mega-container visible-lg visible-md">
        <div class="navleft-container">
            <div class="mega-menu-title"><h3>Tất cả thể loại</h3></div>
            <div class="mega-menu-category" @yield('showmenu')>
                <ul class="nav">
                @foreach ($menu_theloai as $theloai)
                @if (count($theloai->sanpham) > 0)
                <li>
                     <a href="{{ route('getTheLoaiSanPham', $theloai->slugtl) }}">{{ $theloai->tentheloai }}</a>
                     <div class="wrap-popup">
                         <div class="popup">
                             <div class="row">
                                 <div class="col-md-7">
                                     <div class="custom-menu-right">
                                     @php
                                        $menu_sanpham_giamgia = DB::table('sanpham')->where(['theloai_id' => $theloai->id, 'trangthai' => '1'])->where('giamgiasanpham', '>', '0')->limit(3)->get();
                                     @endphp
                                     @foreach ($menu_sanpham_giamgia as $sanpham)
                                      <div class="box-banner media">
                                         <div class="media-left"><img class="media-object" src="{{ asset('uploads/anhsanpham/' . $sanpham->anhsanpham) }}" alt="{{ $sanpham->tensanpham }}" style="width: 70px;">
                                         </div>
                                          <div class="media-body">
                                              <h5 class="media-heading">Media heading</h5>
                                              <div class="price-sale">{{ ((100*$sanpham->giamgiasanpham)/$sanpham->giasanpham) }} <sup> %</sup></div>
                                              <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}">&gt; Chi tiết</a>
                                          </div>
                                       </div>
                                      @endforeach 
                                     </div>
                                 </div>
                                 <div class="col-md-5 has-sep">
                                     <ul class="nav">
                                     @php
                                     $menu_sanpham_moi = DB::table('sanpham')->where(['theloai_id' => $theloai->id, 'trangthai' => '1'])->limit(6)->get();
                                  @endphp
                                  @foreach ($menu_sanpham_moi as $sanpham)
                                   <li><a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}">{{ $sanpham->tensanpham }}</a></li>
                                   @endforeach 
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </li>
                @else
                   <li class="nosub"><a href="#">{{ $theloai->tentheloai }}</a></li>
                @endif
                @endforeach
                    {{-- <li class="nosub"><a href="#">Electtronic</a></li>    
                    <li class="nosub"><a href="#">New arrivals</a></li>
                    <li class="nosub"><a href="#">Bestseller</a></li>
                    <li class="more-menu"><a href="#">Bags &amp; Cases</a></li>
                    <li class="more-menu"><a href="#">Accessories</a></li>
                    <li class="view-more"><a href="#">More category</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>