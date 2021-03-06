<section class="featured-pro container wow bounceInUp animated">
  <div class="slider-items-products">
    <div class="new_title center">
      <h2>Sản phẩm đặc biệt nhất</h2>
    </div>
    <div id="product-slider" class="product-flexslider hidden-buttons">
      <div class="slider-items slider-width-col4"> 
        @foreach ($sanpham_dacbiet as $sanpham)
        <div class="item">
          <div class="col-item">
            @if ($sanpham->giamgiasanpham > 0)
            <div class="sale-label sale-top-right">
              {{ phamtramgiamgia($sanpham->giamgiasanpham, $sanpham->giasanpham) }}
            </div>
            @else
              @if (check_sanphammoi($sanpham->created_at))
                <div class="new-label new-top-right">New</div>
              @endif
            @endif
            <div class="product-image-area"> <a class="product-image" title="{{ $sanpham->tensanpham }}" href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"> <img src="{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}" class="img-product" alt="{{ $sanpham->tensanpham }}" /> </a>
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
                    @if ($sanpham->giamgiasanpham > 0)
                      <p class="special-price"> <span class="price"> {{ number_format($sanpham->giamgiasanpham) }} </span> </p>
                      <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ number_format($sanpham->giasanpham) }} </span> </p>
                    @else
                      <p class="special-price"> <span class="price"> {{ number_format($sanpham->giasanpham) }}</span> </p>
                    @endif
                  </div>
                </div>
              </div>
              <div class="actions">
                <button type="button" onclick="cart.add('{{ $sanpham->id }}', false);" title="Thêm vào giỏ hàng" class="button btn-cart"><span>Mua ngay</span></button>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
        </div>
        @endforeach 
      </div>
    </div>
  </div>
</section>