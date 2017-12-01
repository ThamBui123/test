@php
   $tintuc_xemnhieu = DB::table('tintuc')->where('trangthai', 1)->orderBy('luotxem', 'desc')->limit(6)->get();
@endphp
<div class="col-right sidebar col-sm-3 wow bounceInUp animated">
   <div class="news-posts wow bounceInUp animated">
      <h3 class="widget-title">Xem nhiều nhất</h3>
      <div class="widget-content">
         <div class="posts-list clearfix">
            @foreach($tintuc_xemnhieu as $tintuc)
            <div class="media">
              <div class="media-left">
                <a href=""{{ route('getTinTuc', $tintuc->slug) }}">
                  <img class="media-object" src="{{ asset('uploads/tintuc/' .$tintuc->thumbnail) }}" alt="{{ $tintuc->tieude }}" width="80px" height="auto">
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">
                   <a href=""{{ route('getTinTuc', $tintuc->slug) }}">{{ $tintuc->tieude }}
                   </a>
                </h4>
              </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>