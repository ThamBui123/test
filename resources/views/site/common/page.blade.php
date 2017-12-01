@extends('layouts.site')
@section('title')
{{ $page->tieude }}
@endsection
@section('content')
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <ul>
          <li class="home"> <a title="Về trang chủ" href="{{ route('home') }}">Trang chủ</a><span>&mdash;›</span></li>
          <li class="category13"><strong>{{ $page->tieude }}</strong></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="main-container">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 wow bounceInUp animated">
          <div class="page-title">
            <h2>{{ $page->tieude }}</h2>
          </div>
          <div class="static-contain">
				<p>
					{!! $page->noidung !!}
				</p>
          </div>
        </section>
        <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
          <div class="block block-company">
            <div class="block-title">Liên quan </div>
            <div class="block-content">
              <ol id="recently-viewed-items">
               @foreach($pages as $page)
               <li class="item {{ $loop->last ? 'last' : ''}}">
	               <a href="{{ route('getPage', $page->slug) }}">{{ $page->tieude }}</a>
               </li>
                @endforeach
              </ol>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
  <!--End main-container --> 
@endsection