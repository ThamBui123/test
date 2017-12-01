<div class="block block-cart">
  <div class="block-content" style="padding-top: 0px;">
    <p class="block-subtitle">Có thể bạn muốn xem</p>
    <ul>
      @foreach ($list_sanpham_gioithieu as $sanpham)
      <li class="item"> <a class="product-image" title="{{ $sanpham->tensanpham }}" href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"><img width="80" alt="{{ $sanpham->tensanpham }}" src="{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}"></a>
        <div class="product-details">
          <p> <a href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}" title="{{ $sanpham->tensanpham }}">{{ $sanpham->tensanpham }}</a> </p>
           <p><small>{{ str_limit($sanpham->gioithieungan, 25) }}</small></p>
          @if ($sanpham->giamgiasanpham > 0)
          <span class="price">{{ number_format($sanpham->giamgiasanpham) }}</span> 
          <strong style="text-decoration: line-through;">{{ number_format($sanpham->giasanpham) }}</strong>
          @else
          <span class="price">{{ number_format($sanpham->giasanpham) }}</span>
          @endif
          </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>