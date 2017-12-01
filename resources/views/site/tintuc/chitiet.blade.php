@extends('layouts.site')
@section('title')
{{ $tintuc->tieude }}
@endsection
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getListTinTuc') }}">Tin tức</a><span>&mdash;›</span></li>
        <li class="category13"><strong> {{ $tintuc->tieude }} </strong></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container">
   <div class="main container">
      <div class="row">
         <div class="col-main col-sm-9 wow bounceInUp animated">
            <div class="blog-wrapper" id="main">
               <div class="site-content" id="primary">
                  <div role="main" id="content">
                     <article class="blog_entry clearfix">
                        <header class="blog_entry-header clearfix">
                           <div class="blog_entry-header-inner">
                              <h2 class="blog_entry-title"> {{ $tintuc->tieude }} </h2>
                           </div>
                        </header>
                        <div class="entry-content">
                           <div class="entry-content">
                              <p>
                              {!! $tintuc->noidung !!}
                              </p>
                           </div>
                        </div>
                     </article>
                     <hr>
                     <div class="tintuc_lienquan">
                     <h4>Tin tức liên quan</h4>
                     @foreach($tintuc_lienquan as $tintuc)
                    <div class="col-xs-12 col-sm-4">
                      <div class="blog-img"> <img src="{{ asset('uploads/tintuc/' .$tintuc->thumbnail) }}" alt="{{ $tintuc->tieude }}" width="100%">
                        <div class="mask"> 
                          <a class="info" href="{{ route('getTinTuc', $tintuc->slug) }}">{{ $tintuc->tieude }}</a> 
                        </div>
                      </div>
                      <h4><a href="{{ route('getTinTuc', $tintuc->slug) }}" title="{{ $tintuc->tieude }}">{{ str_limit($tintuc->tieude, 40) }}</a> </h4>
                      <div class="post-date"><i class="icon-calendar"></i>{{ dinh_dang_ngay_gio($tintuc->created_at) }}</div>
                      <p>{{ str_limit(strip_tags($tintuc->noidung), 100)  }}</p>
                    </div>
                    @endforeach
                    </div>
                  </div>
               </div>
            </div>
         </div>
         @include('site.tintuc.sidebar')
      </div>
   </div>
</div>
@endsection