<div class="comments-wrapper">
<h4 style="color: blue;">
  @if (session('thongbao'))
    {{ session('thongbao') }}
  @endif
</h4>
    <h3> Danh sách bình luận </h3>
    <div class="commentlist">
    @php
      list_binh_luan($list_binhluan);
    @endphp
    </div>
  </div>
<div class="actions"> 
  <div class="pager">
    <div class="pages">
    {{ $list_binhluan->appends(Request::except('page'))->links('partials.phantrang') }}
    </div>
  </div>
</div>