<ul class="products-grid">
  @forelse ($all_sanpham as $sanpham)
  <li class="item col-lg-3 col-md-3 col-sm-6 col-xs-6">
    <div class="col-item">
    @if (check_sanphammoi($sanpham->created_at))
    <div class="new-label new-top-right">New</div>
    @endif
      <div class="product-image-area"> <a class="product-image" title="{{ $sanpham->tensanpham }}" href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"> <img src="{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}" class="img-product" alt="{{ $sanpham->anhsanpham }}"/> </a>
      </div>
      <div class="info">
        <div class="info-inner">
          <div class="item-title"> <a title=" {{ $sanpham->tensanpham }}" href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"> {{ $sanpham->tensanpham }} </a> </div>
          <div class="item-content">
            <div class="ratings">
              <div class="rating-box">
                <div class="rating" style="width: {{ phamtramvote($sanpham->id) }}%"></div>
              </div>
            </div>
            <div class="price-box">
              <p class="special-price"> <span class="price"> {{ number_format($sanpham->giasanpham) }}</span> </p>
            </div>
          </div>
        </div>
        <div class="clearfix"> </div>
        <div class="actions">
            <button class="button btn-cart" onclick="cart.add('{{ $sanpham->id }}', false);" title="Thêm vào giỏ hàng"><span>Mua ngay</span>
            </button>
        </div>
      </div>
    </div>
  </li>
  @empty
    <li class="item col-md-12">
        <div class="alert alert-info" role="alert">
          <strong>Thông báo ! </strong> Chưa có sản phẩm nào
        </div>
    </li>
  @endforelse
</ul>