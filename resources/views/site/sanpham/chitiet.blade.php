@extends('layouts.site')
@section('title')
{{ $sanpham->tensanpham }}
@endsection
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
       
        <li class=""> <a href="{{ route('getTheLoaiSanPham', $sanpham->theloai->slugtl) }}" title="Về {{ $sanpham->theloai->tentheloai }}">{{ $sanpham->theloai->tentheloai }}</a><span>&mdash;›</span></li>
        <li class="category13"><strong> {{ $sanpham->tensanpham }} </strong></li>
      </ul>
    </div>
  </div>
</div>
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div id="div_menu">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div style="background: #f0f0f0;">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".truycapnhanh-collapse">
                      Mở rộng
                    </button>
                    <a class="navbar-brand">Truy cập nhanh</a>
                  </div>
                  <div class="collapse navbar-collapse truycapnhanh-collapse">
                    <ul class="nav navbar-nav">
                      <li> <a href="javascript:;" data-scroll="#list_gioithieu" class="click_scoll"> Giới thiệu sản phẩm </a> </li>
                      <li> <a href="javascript:;" data-scroll="#list_sanpham_lienquan" class="click_scoll">Sản phẩm liên quan</a> </li>
                      <li> <a href="javascript:;" data-scroll="#list_binhluan" class="click_scoll">Bình luận</a> </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li style="background: #41ade2;"> <a href="javascript:;" onClick="cart.add('{{ $sanpham->id }}');" style="cursor: pointer;"><i class="glyphicon glyphicon-shopping-cart"></i> Thêm vào giỏ hàng</a> </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="product-view">
          <div class="product-essential">
            <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
              <div class="owl-carousel owl-theme">
                @foreach ($sanpham->hinhsanpham as $hinhsanpham)
                <div class="owl-item" style="width: 100%">
                  <div class="item" title="Nhấn vào ảnh để xem lớn hơn">
                    <a data-fancybox="images" data-caption="{{ $sanpham->tensanpham }}" href="{{ asset('uploads/hinhanhsanpham/' .$hinhsanpham->lienket) }}">
                    <img class="sp-image" src="{{ asset('uploads/hinhanhsanpham/' .$hinhsanpham->lienket) }}"  data-src="{{ asset('uploads/hinhanhsanpham/' .$hinhsanpham->lienket) }}" alt="{{ $sanpham->tensanpham }}" style="height: 450px; width: 100%" />
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="product-shop col-lg-7 col-sm-7 col-xs-12">
              <div class="product-next-prev"> <a class="product-next" href="{{ route('getChiTietSanPham', $sanpham_ketiep->slugsp) }}"><span></span></a> <a class="product-prev" href="{{ route('getChiTietSanPham', $sanpham_truocdo->slugsp) }}"><span></span></a> </div>
              <div class="product-name">
                <h1>{{ $sanpham->tensanpham }}</h1>
              </div>
              <div class="ratings">
                <div class="detail-rating-box">
                  <div id="rate_product"> </div>
                </div>
                <p class="rating-links"> <a href="{{ route('getHangSanXuat', $sanpham->hangsanxuat->slughsx) }}" style="color: red;">{{ $sanpham->hangsanxuat->tenhang }}</a> <span class="separator">|</span> <a href="{{ route('getTheLoaiSanPham', $sanpham->theloai->slugtl) }}">{{ $sanpham->theloai->tentheloai }}</a> 
                </p>
              </div>
              @if ($sanpham->giamgiasanpham > 0)
              <p class="availability in-stock">Khuyến mãi: &nbsp; <span>
              <b>{{ phamtramgiamgia($sanpham->giamgiasanpham, $sanpham->giasanpham) }}</b>
              </span></p>
              @endif
              <div class="price-block">
                <div class="price-box">
                  @if ($sanpham->giamgiasanpham > 0)
                    <p class="special-price"> 
                    <span class="price"> {{ number_format($sanpham->giamgiasanpham) }} </span> 
                    </p>
                    <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ number_format($sanpham->giasanpham) }} </span> 
                    </p>
                  @else
                    <p class="special-price"> <span class="price"> {{ number_format($sanpham->giasanpham) }}</span> </p>
                  @endif
                </div>
              </div>
              <div class="short-description">
                <h2>Giới thiệu ngắn</h2>
                <p>{{ $sanpham->gioithieungan }}</p>
              </div>
              <form action="" method="post">
                <div class="add-to-box">
                  <div class="add-to-cart">
                    <label for="inputnumber">Số lượng:</label>
                    <div class="pull-left custom">
                      <button onClick="var result = document.getElementById('inputnumber'); var inputnumber = result.value; if( !isNaN( inputnumber ) && inputnumber > 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                      <input type="text" class="input-text qty inputnumber" title="Số lượng cần mua" value="1" id="inputnumber" name="inputnumber" data-validation="number" data-validation-allowing="range[1;{{ $sanpham->soluongtoida }}]" data-validation-error-msg="Vui lòng nhập số lượng sản phẩm từ 1 đến {{ $sanpham->soluongtoida }}">
                      <button onClick="var result = document.getElementById('inputnumber'); var inputnumber = result.value; if( isNaN( inputnumber )) result.value = 1; if( !isNaN( inputnumber )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                    </div>
                    <button onClick="cart.add('{{ $sanpham->id }}', true, '{{ $sanpham->soluongtoida }}');" class="button btn-cart" title="Thêm vào giỏ hàng" type="button"><span><i class="icon-basket"></i> Mua ngay</span></button>
                  </div>
                </div>
              </form>
              <div class="social">
                @php
                  $link_share =  route('getChiTietSanPham', $sanpham->slugsp);
                @endphp
                <ul>
                  <li>
                      <div class="fb-like" data-href="{{ $link_share }}" data-width="200px" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                  </li>
                  <li>
                    <g:plusone size="medium" ></g:plusone>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="product-collateral">
            <div class="col-sm-12 wow bounceInUp animated">
              <div id="list_gioithieu">
                <div class="row">
                  <div class="col-sm-9">
                  <h3>Giới thiệu sản phẩm</h3>
                  {!! $sanpham->gioithieusanpham; !!}
                  </div>
                  <div class="col-sm-3 sidebar col-left">
                    @include('site.blocks.sanpham.sanphamgioithieu', ['list_sanpham_gioithieu' => $list_sanpham_gioithieu])
                  </div>
                </div>
              </div>
              <div id="list_binhluan">
                <div class="row">
                  <div class="col-sm-12 box-collateral box-reviews">
                      @if(Auth::check())
                      <div class="form-add">
                        <form id="review-form" method="post" action="{{ route('postBinhLuan') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="sanpham_id" value="{{ $sanpham->id }}">
                          <h3>Bạn đánh giá sản phẩm này như thế nào?</h3>
                          <fieldset>
                            <div class="review2">
                              <ul>
                                <li>
                                  <div class="input-box">
                                    <span id="append_reply" class="text-primary"></span>
                                    <textarea class="required-entry" rows="3" cols="5" id="noidung_binhluan" name="noidung" ></textarea>
                                    <input type="hidden" id="parent_id" value="0">
                                  </div>
                                </li>
                              </ul>
                              <div class="buttons-set">
                                <button class="button submit" title="Gửi bình luận" type="button" id="submit_binhluan" data-id='{{ $sanpham->id }}'><span>Gửi đi</span></button>
                              </div>
                            </div>
                          </fieldset>
                        </form>
                      </div>
                      @else
                      <div class="form-add">
                        <p style="color: blue;">Vui lòng đăng nhập để bình luận</p>
                        <div class="buttons-set">
                          <button class="button submit" title="Đăng nhập" type="button" data-toggle="modal" data-target="#model_dangnhap"><span>Đăng nhập</span></button>
                        </div>
                      </div>
                      @endif
                      <div id="ajax_load_binhluan">
                        @include('site.blocks.sanpham.binhluan', ['list_binhluan' => $list_binhluan])
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
                <div id="list_sanpham_lienquan">
                  <div class="row">
                    <div class="col-sm-12">
                      @include('site.blocks.sanpham.sanphamlienquan')
                    </div>
                  </div>
                </div>
              </div>
           </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End main-container --> 
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/site/jrate.min.js') }}"></script> 
<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    autoWidth:true,
    items: 1,
    itemsDesktop: [1024, 1],
    itemsDesktopSmall: [750, 2],
    itemsTablet: [650, 2],
    itemsMobile: [320, 1],
  });

  $('body').on('click', '#ajax_load_binhluan .pagination a', function(e) {
  link = $(this).attr('href');
  $.ajax({
      url: link,
      type: 'get',
      dataType: 'text',
      success: function(data)
      {
        $('#ajax_load_binhluan').html(data);
      }
  });
  return false;
});

div_menu = $('#div_menu');
_start = 400;

$.event.add(window, "scroll", function() {
    p = $(window).scrollTop();
    $(div_menu).css('position',((p)>_start) ? 'fixed' : 'static');
    $(div_menu).css('top',((p)>_start) ? '43px' : '');
    $(div_menu).css('display',((p)>_start) ? 'block' : 'none');
});

  $("#rate_product").jRate({
  @if ($check_vote)
  readOnly: true,
  @endif
  rating: {{ $sanpham->diemvote() }},
  onSet: function(rating) {
    $.ajax({
      url: '{{ route('voteSanPham') }}',
      type: 'post',
      data: {
        'sanpham_id': '{{ $sanpham->id }}',
        'diemvote': rating,
        '_token': token
      },
      success: function(data) {
        $.confirm(data, 'Thông báo !!!!');
      },
      error: function(xhr, ajaxOptions, thrownError) {
        thongbaoloi(xhr.responseText);
      }
    });
  },
  precision: 0.5,
  height: 20
});

$('.reply_cmt').click(function(e){
  parent_id = $(this).data('parentid');
  $('#parent_id').val(parent_id);
  hovaten = $(this).data('hovaten');
  $('#append_reply').html('Trả lời -------' +hovaten+ ':------- chọn để hủy');

  e.preventDefault();
  $('html, body').animate({
      scrollTop: $('#noidung_binhluan').offset().top-150
  }, 1000, 'easeOutExpo');
  
});
$('#append_reply').click(function(){
  $('#parent_id').val('0');
  $('#noidung_binhluan').focus();
  $('#append_reply').html('');
});
</script>
@endsection