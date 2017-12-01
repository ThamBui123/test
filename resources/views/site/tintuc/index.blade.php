@extends('layouts.site')
@section('title', 'Tin tức mới')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li class="category13"><strong> Tin tức </strong></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container">
   <div class="main container">
      <div class="row">
         <div class="col-main col-sm-9">
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div id="content">
                    @foreach($all_tintuc as $tintuc)
                    <div class="col-xs-12 col-sm-4">
                      <div class="blog-img"> <img src="{{ asset('uploads/tintuc/' .$tintuc->thumbnail) }}" alt="{{ $tintuc->tieude }}" width="100%">
                        <div class="mask"> 
                          <a class="info" href="{{ route('getTinTuc', $tintuc->slug) }}">{{ $tintuc->tieude }}</a> 
                        </div>
                      </div>
                      <h4><a href="{{ route('getTinTuc', $tintuc->slug) }}" title="{{ $tintuc->tieude }}">{{ str_limit($tintuc->tieude, 40) }}</a> </h4>
                      <div class="post-date"><i class="icon-calendar"></i>{{ dinh_dang_ngay_gio($tintuc->created_at) }}</div>
                      <p>{{ str_limit(strip_tags($tintuc->noidung), 200)  }}</p>
                    </div>
                    @endforeach
                  </div>
               </div>
    					<div class="pager">
			         <div class="pages">
			         {{ $all_tintuc->links('partials.phantrang') }}
			         </div>
		         </div>
            </div>
         </div>
         @include('site.tintuc.sidebar')
      </div>
   </div>
</div>
@endsection