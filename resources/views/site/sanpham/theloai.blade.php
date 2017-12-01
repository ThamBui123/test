@extends('layouts.site')
@section('title')
{{ $theloai->tentheloai }}
@endsection
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
       
        <li class="category13"><strong>{{ $theloai->tentheloai }}</strong></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container col2-left-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 col-sm-push-3 wow bounceInUp animated">
        <div class="category-title clearfix">
          <h1 class="pull-left">Thể loại - {{ $theloai->tentheloai }}</h1>
          @include('site.blocks.sanpham.list_loctimkiem')
        </div>
        @if (!$list_theloai_con->isEmpty())
        <div class="list_theloai_con clearfix"> 
          <label>Thể loại con: &nbsp; </label> 
          <ul>
            @foreach ($list_theloai_con as $theloai_con)
            <li>
              <a href="{{ route('getTheLoaiSanPham', $theloai_con->slugtl) }}"> {{ $theloai_con->tentheloai }}</a>
            </li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="category-products clearfix">
          @include('site.blocks.sanpham.loctimkiem')
          @include('site.blocks.sanpham.list_sanpham', ['all_sanpham' => $all_sanpham])
        </div>
        <div class="pager">
          <div class="pages">
          {{ $all_sanpham->appends(Request::except('page'))->links('partials.phantrang') }}
          </div>
        </div>
      </section>
      @include('site.blocks.sanpham.list_leftmenu')
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
  $('input.input_price').maskNumber({
    integer: true,
    thousands: '.'
  });
</script>
@endsection