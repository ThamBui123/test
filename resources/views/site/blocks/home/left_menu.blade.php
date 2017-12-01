<div id="magik-verticalmenu" class="block magik-verticalmenu">
  <div class="nav-title"> <span>Danh mục</span> </div>
  <div class="nav-content">
    <div class="navbar navbar-inverse">
      <div id="verticalmenu" class="verticalmenu" role="navigation">
        <div class="navbar">
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav verticalmenu">
              @php
                $all_nhomsanpham = \App\Models\Nhomsanpham::where('trangthai', 1)->get();
              @endphp
              @foreach ($all_nhomsanpham as $nhomsanpham)
                @if (!$nhomsanpham->theloai->isEmpty())
                <li class=" parent dropdown "> <a href="{{ route('getTheLoaiSanPham', $nhomsanpham->slugnsp) }}" class="dropdown-toggle" data-toggle="dropdown"><span class="menu-title">{{ $nhomsanpham->tennhomsanpham }}</span><b class="round-arrow"></b></a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-inner">
                      <div class="row">
                        <div class="mega-col col-sm-66" data-widgets="wid-7" data-colwidth="6">
                          <div class="mega-col-inner">
                            <div class="ves-widget">
                              <div class="menu-title"><a href="">{{ $nhomsanpham->tennhomsanpham }}</a>
                              </div>
                              <div class="widget-html">
                                <div class="widget-inner">
                                  @php
                                  left_menu($nhomsanpham->theloai);
                                  @endphp
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @php
                          $list_sanpham = DB::table('sanpham')->leftJoin('theloai', 'theloai.id', '=', 'sanpham.theloai_id')->leftJoin('nhomsanpham', 'theloai.nhomsanpham_id', '=', 'nhomsanpham.id')->where('nhomsanpham.id', $nhomsanpham->id)->limit(3)->get()->toArray();
                        @endphp
                        @foreach ($list_sanpham as $sanpham)
                        <div data-widgets="wid-8" data-colwidth="6" class="mega-col col-sm-66 ">
                          <div class="mega-col-inner">
                            <div id="wid-8"> 
                              <div class="widget-image">
                                <div class="widget-inner clearfix">
                                  <div><a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"><img title="" alt="" src="{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}" style="width: 150px;height: auto"></a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </li>
                @else
                <li class=""> <a href="{{ route('getTheLoaiSanPham', $nhomsanpham->slugnsp) }}"><span class="menu-title"> {{ $nhomsanpham->tennhomsanpham }}</span></a></li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>