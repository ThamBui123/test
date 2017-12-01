@extends('layouts.site')
@section('title', 'Trang chủ')
@section('content')
@include('site.blocks.home.slider')
<div class="container">
  <div class="header-service wow bounceInUp animated">
    <div class="col-lg-3 col-sm-6 col-xs-3">
      <div class="content">
        <div class="icon-truck">&nbsp;</div>
        <span class="hidden-xs"><strong>VẬN CHUYỂN NHANH</strong></span></div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-3">
      <div class="content">
        <div class="icon-support">&nbsp;</div>
        <span class="hidden-xs"><strong>MUA HÀNG</strong> nhanh chóng</span></div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-3">
      <div class="content">
        <div class="icon-money">&nbsp;</div>
        <span class="hidden-xs"><strong>Hoàn tiền sau</strong> 3 ngày</span></div>
    </div>
    <div class="col-lg-3 col-sm-6 col-xs-3">
      <div class="content">
        <div class="icon-dis">&nbsp;</div>
        <span class="hidden-xs"><strong>Ưu đãi</strong> đặt biệt</span></div>
    </div>
  </div>
</div>
 {{-- @include('site.blocks.home.banner') --}}
 @include('site.blocks.home.moinhat')
 @include('site.blocks.home.muanhieu')
 @include('site.blocks.home.noibat')
 @include('site.blocks.home.tintuc')

@endsection