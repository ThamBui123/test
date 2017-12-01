<section class="latest-blog container wow bounceInUp animated">
  <div class="blog-title">
    <h2><a href="{{ route('getListTinTuc') }}"><span>Tin tức mới</span></a></h2>
  </div>
  @foreach($tintuc_moi as $tintuc)
  <div class="col-xs-12 col-sm-4">
    <div class="blog-img"> <img src="{{ asset('uploads/tintuc/' .$tintuc->thumbnail) }}" alt="{{ $tintuc->tieude }}" width="100%">
      <div class="mask"> 
        <a class="info" href="{{ route('getTinTuc', $tintuc->slug) }}">{{ $tintuc->tieude }}</a> 
      </div>
    </div>
    <h2><a href="{{ route('getTinTuc', $tintuc->slug) }}" title="{{ $tintuc->tieude }}">{{ str_limit($tintuc->tieude, 40) }}</a> </h2>
    <div class="post-date"><i class="icon-calendar"></i>{{ dinh_dang_ngay_gio($tintuc->created_at) }}</div>
    <p>{{ str_limit(strip_tags($tintuc->noidung), 200)  }}</p>
  </div>
  @endforeach
</section>