<section class="middle-slider container wow bounceInUp animated">
  @php
    $dem = 0;
    $all_theloai = \App\Models\Theloai::where('trangthai', 1)->get();
  @endphp
  @foreach ($all_theloai as $theloai)
    @if(!empty($theloai->sanpham->toArray()))
      @if ($dem%2 ==0)
      <div class="row">
      @endif
        <div class="col-md-6">
          <div class="bag-product-slider small-pr-slider cat-section">
            <div class="slider-items-products">
              <div class="new_title center">
                <h2>{{ $theloai->tentheloai }}</h2>
              </div>
              <div id="bag-seller-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col3"> 
                  @foreach ($theloai->sanpham->where('trangthai', 1) as $sanpham)
                  <!-- Item -->
                  <div class="item">
                    <div class="col-item">
                      <div class="product-image-area"> 
                        <a class="product-image" title="{{ $sanpham->tensanpham }}" href="{{ route('getChiTietSanPham', $sanpham->slugsp) }}"> <img src="{{ asset('uploads/anhsanpham/' .$sanpham->anhsanpham) }}" class="img-product" alt="a" /> 
                        </a>
                        <div class="actions-links"><span class="add-to-links"> <a title="magik-btn-quickview" class="magik-btn-quickview" href="quick_view.html"><span>Xem nhanh</span></a> <a title="Add to Wishlist" class="link-wishlist" href="wishlist.html"><span>Ưa thích</span></a> <a title="Add to Compare" class="link-compare" href="compare.html"><span>So sánh</span></a></span> </div>
                      </div>
                      <div class="info">
                        <div class="info-inner">
                          <div class="item-title"> <a title=" {{ $sanpham->tensanpham }}" href="product_detail.html"> {{ $sanpham->tensanpham }} </a> </div>
                          <div class="item-content">
                            <div class="ratings">
                              <div class="rating-box">
                                <div class="rating"></div>
                              </div>
                            </div>
                            <div class="price-box">
                              @if ($sanpham->giamgiasanpham > 0)
                              <p class="special-price"> <span class="price"> {{ number_format($sanpham->giamgiasanpham) }} </span> </p>
                              <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{ number_format($sanpham->giasapham) }} </span> </p>
                            @else
                              <p class="special-price"> <span class="price"> {{ number_format($sanpham->giasapham) }}</span> </p>
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
          </div>
        </div>
      @php
        $dem++;
      @endphp
      @if ($dem%2 ==0)
      </div>
      <div class="pdd_top">
      </div>
      @endif
    @endif
  @endforeach
  </div>
</section>