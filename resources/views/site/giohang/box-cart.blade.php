@if(!Cart::instance('shopping')->content()->isEmpty())
<form method="post" action="{{ route('updateCart') }}">
  <input type="hidden" value="{{ csrf_token() }}" name="_token">
  <div id="quick-ajax-load-cart">
    @include('site.blocks.giohang.table-box-cart')
  </div>
</form>
@if (Auth::check())
<div id="link_box_thanhtoan" data-link="{{ route('getThanhToanGioHang') }}"></div>
@else
<div id="link_box_thanhtoan" data-link="{{ route('getStep1') }}"></div>
@endif
@else
<b><h4>Bạn chưa có sản phẩm nào trong giỏ hàng</h4></b>
  @if(!Request::ajax())
  <button title="Tiếp tục mua hàng" style="background-color: #41ade2; color: #fff;" class="button" type="button" onclick="location='{{ route('home') }}'"><span>Tiếp tục mua hàng</span></button>
  @endif
  <br>
@endif