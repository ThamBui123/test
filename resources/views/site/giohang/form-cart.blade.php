<div class="cart wow bounceInUp animated">
@if(!Cart::instance('shopping')->content()->isEmpty())
<div class="table-responsive" id="ajax-giohang">
  <form method="post" action="{{ route('updateCart') }}">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <fieldset>
      <table class="data-table cart-table" id="shopping-cart-table">
        <thead>
          <tr class="first last">
            <th rowspan="1">&nbsp;</th>
            <th rowspan="1"><span class="nobr">Sản phẩm</span></th>
            <th colspan="1" class="a-center"><span class="nobr">Giá bán</span></th>
            <th class="a-center" rowspan="1">Số lượng</th>
            <th colspan="1" class="a-center">Thành tiền</th>
            <th class="a-center" rowspan="1">&nbsp;</th>
          </tr>
        </thead>
        <tfoot>
          <tr class="first last">
            <td class="a-right last" colspan="6"><button onclick="location='{{ route('home') }}'" class="button btn-continue" title="Tiếp tục mua hàng" type="button"><span><span>Tiếp tục mua hàng</span></span></button>
              <button class="button btn-update" title="Cập nhật" value="update_qty" name="update_cart_action" type="submit"><span><span>Cập nhật giỏ hàng</span></span></button>
              <a id="empty_cart_button" class="button btn-empty" title="Hủy giỏ hàng" style="cursor: pointer;" onclick="cart.destroy('{{ route('home') }}');"><span><span>Hủy giỏ hàng</span></span></a></td>
          </tr>
        </tfoot>
        <tbody>
         @foreach (Cart::instance('shopping')->content() as $cart)
          <tr class="first odd">
            <td class="image"><a class="product-image" title="{{ $cart->name }}" href="{{ route('getChiTietSanPham', $cart->model->slugsp) }}"><img width="50" alt="{{ $cart->name }}" src="{{ asset('uploads/anhsanpham/' .$cart->model->anhsanpham) }}"></a></td>
            <td><h2 class="product-name"> <a href="{{ route('getChiTietSanPham', $cart->model->slugsp) }}">{{ $cart->name }}</a> </h2>
              @if($cart->options->muatruoc)
              <small style="color: blue;">(Bạn đã đặt trước {{ $cart->options->muatruoc }} sản phẩm)</small>
              @endif
            </td>
            <td class="a-right"><span class="cart-price"> <span class="price">{{ number_format($cart->price) }}</span> </span></td>
            <td class="a-center movewishlist"><input type="text" class="input-text qty" title="Số lượng" style="width: 60px;" value="{{ $cart->qty }}" name="cart[{{ $cart->rowId }}][qty]" data-validation="number" data-validation-allowing="range[1;{{ $cart->model->soluongtoida }}]" data-validation-error-msg="Vui lòng nhập số lượng sản phẩm phải từ 1 đến {{ $cart->model->soluongtoida }}"></td>
            <td class="a-right movewishlist"><span class="cart-price"> <span class="price">{{ number_format($cart->subtotal) }}</span> </span></td>
            <td class="a-center last"><button class="button remove-item" title="Xóa bỏ" type="button" onclick="cart.remove('{{ $cart->rowId }}');"><span><span>Xóa bỏ</span></span></button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </fieldset>
  </form>
</div>
@else
<center>
<b><h3>Bạn chưa có sản phẩm nào trong giỏ hàng</h3></b>
<button title="Tiếp tục mua hàng" style="background-color: #41ade2; color: #fff;" class="button" type="button" onclick="location='{{ route('home') }}'"><span>Tiếp tục mua hàng</span></button>
</center>
@endif
</div>
@if(!Cart::instance('shopping')->content()->isEmpty())
@php
$list_phuongthucvc = App\Models\Phuongthucvc::where('trangthai', 1)
  ->get();
$list_phuongthuctt = App\Models\Phuongthuctt::where('trangthai', 1)
  ->get();
@endphp
<div class="cart-collaterals row  wow bounceInUp animated">
  <div class="col-sm-4">
    <div class="shipping">
      <h3>Phương thức vận chuyển & Thanh toán</h3>
      <div class="shipping-form">
        <form id="shipping-zip-form" method="post" action="{{ route('postUpdatePhuongthuc') }}">
          <input type="hidden" value="{{ csrf_token() }}" name="_token">
          <ul class="form-list">
            <li>
              <label for="phuongthucvc_id"><u>Chọn cách vận chuyển khác mặc định có thể phát sinh chi phí</u></label>
                @if (Session::has('psty_phuongthucvc'))
                <p><b style="color: red;">
                  Phí vận chuyện phát sinh: {{ number_format(session('psty_phuongthucvc')['phivanchuyen']) }}
                </b></p>
                <p><b style="color: blue;">
                  Thời gian vận chuyển: {{ session('psty_phuongthucvc')['thoigianvanchuyen'] }}
                </b></p>
                @endif
              <div class="input-box">
                <select name="phuongthucvc_id">
                  <option value="df">--Mặc định--</option>
                  @foreach ($list_phuongthucvc as $phuongthucvc)
                    <option value="{{ $phuongthucvc->id }}" @if (Session::has('psty_phuongthucvc') && session('psty_phuongthucvc')['phuongthucvc_id'] == $phuongthucvc->id)
                      {{ 'selected' }}
                    @endif>
                      {{ $phuongthucvc->tenvanchuyen }}
                    </option>
                  @endforeach
                </select>
              </div>
            </li>
            <li>
              <label for="phuongthucvc_id">Phương thức thanh toán</label>
              @if (Session::has('psty_phuongthuctt'))
                <p><b style="color: red;">
                  Bạn đã chọn thanh toán bằng: {{ session('psty_phuongthuctt')['tenphuongthuc'] }}
                </b></p>
                <p><b style="color: blue;">
                  Hướng dẫn: {{ session('psty_phuongthuctt')['huongdan'] }}
                </b></p>
                @endif
              <div class="input-box">
                <select name="phuongthuctt_id">
                  <option value="df">--Mặc định--</option>
                  @foreach ($list_phuongthuctt as $phuongthuctt)
                    <option value="{{ $phuongthuctt->id }}" @if (Session::has('psty_phuongthuctt') && session('psty_phuongthuctt')['phuongthuctt_id'] == $phuongthuctt->id)
                      {{ 'selected' }}
                    @endif>
                      {{ $phuongthuctt->tenphuongthuc }}
                    </option>
                  @endforeach
                </select>
              </div>
            </li>
          </ul>
          <div class="buttons-set11">
            <button class="button get-quote" type="submit"><span>Đồng ý</span></button>
            <br>
          </div>
          <!--buttons-set11-->
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
  </div>
  <div class="col-sm-4">
    <div class="totals">
      <h3>Thống kê đơn hàng</h3>
      <div class="inner">
        <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
          <colgroup>
          <col>
          <col width="1">
          </colgroup>
          <tfoot>
            <tr>
              <td class="a-left" colspan="1"><strong>Tổng tiền phải trả</strong></td>
              @php
                $cart_subtotal = Cart::instance('shopping')->subtotal();
                $tiendonhang = str_replace(',', '', $cart_subtotal);
                $phivanchuyen = 0;
                $tongtien = $tiendonhang;
              @endphp

              @if (Session::has('psty_couponcode'))
                @php
                  $sotien_dagiamgia =  $tiendonhang * (1 - (session('psty_couponcode')['phantram']/100));
                  $sotiengiamgia = $tiendonhang - $sotien_dagiamgia;
                  $tongtien = $sotien_dagiamgia;
                @endphp
              @endif

              @if(Session::has('psty_phuongthucvc'))
                @php 
                $phivanchuyen = session('psty_phuongthucvc')['phivanchuyen']; 
                $tongtien += $phivanchuyen;
                @endphp
              @endif

              <td class="a-right"><strong><span class="price">{{ number_format($tongtien) }}</span></strong></td>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td class="a-left" colspan="1"> Tiền đơn hàng </td>
              <td class="a-right"><span class="price">{{ number_format($tiendonhang) }}</span></td>
            </tr>
            @if (Session::has('psty_couponcode'))
            <tr>
              <td class="a-left" colspan="1"> <b>Số tiền giảm giá</b></td>
              <td class="a-right"><span class="price">{{ number_format($sotiengiamgia) }}</span></td>
            </tr>
            @endif
            @if(Session::has('psty_phuongthucvc'))
            <tr>
              <td class="a-left" colspan="1"> <b>Phí vận chuyển phát sinh</b></td>
              <td class="a-right"><span class="price">{{ number_format($phivanchuyen) }}</span></td>
            </tr>
            @endif
          </tbody>
        </table>
        <ul class="checkout">
          @if (Auth::check())
          <li>
            <button title="Thanh toán giỏ hàng này" class="button btn-proceed-checkout" onclick="location='{{ route('getThanhToanGioHang') }}'"><span>Thanh toán</span></button>
          </li>
          @else
          <li>
            <button title="Thanh toán giỏ hàng này" class="button btn-proceed-checkout" onclick="location='{{ route('getStep1') }}'"><span>Thanh toán</span></button>
          </li>
          @endif
          <br>
        </ul>
      </div>
    </div>
  </div> 
</div>
@endif