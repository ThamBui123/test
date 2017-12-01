@extends('layouts.site')
@section('title', 'Thanh toán giỏ hàng')
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="page-form">
      <div class="page-title">
        <h2>Thanh toán giỏ hàng</h2>
      </div>
      <fieldset class="col2-set">
        <legend>Thống kê đơn hàng</legend>
        <div class="col-1 new-users">
          <div class="content">
            <div class="totals">
              <h3 style="margin-top: 0px;">Thống kê đơn hàng</h3>

              <div class="inner">
               @if(Session::has('psty_phuongthuctt'))
                <p><b style="color: red;">Bạn đã chọn hình thức thanh toán:  {{ session('psty_phuongthuctt')['tenphuongthuc'] }}
                </b></p>
                <p><b style="color: blue;">
                {{ session('psty_phuongthuctt')['huongdan'] }}
                </b></p>
                @endif
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Tên sản phẩm</th>
                      <th>Giá bán</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach (Cart::instance('shopping')->content() as $cart)
                    <tr>
                      <td>{{ $cart->name }}</td>
                      <td>{{ number_format($cart->price) }}</td>
                      <td>{{ $cart->qty }}</td>
                      <td>{{ number_format($cart->subtotal) }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>

              <div class="inner">
                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  @php
                    $cart_subtotal = Cart::instance('shopping')->subtotal();
                    $tiendonhang = str_replace(',', '', $cart_subtotal);
                    $phivanchuyen = 0;
                    $tongtien = $tiendonhang;
                  @endphp
                  <tfoot>
                    <tr>
                      <td class="a-left" colspan="1"><strong>Tổng tiền phải trả</strong></td>
                      
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
              </div>
               
            </div>
        <div class="content">
        <strong><h4>Mua hàng không cần đăng ký</h4></strong>
        <div class="content">
          @include('partials.myform_error')
          <form action="{{ route('postStep2') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="form-list">
            @if (session('psty_damuahang') && session('psty_checkdamua') && session('psty_damuahang')['sodienthoaikh'] === session('psty_sodienthoai'))
              <li>
                <b>Thông tin đặt hàng của bạn</b>
              </li>
              <li>
                <label for="hovaten">Họ và tên người nhận<span class="required">*</span></label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['hovaten'] }}</p>
              </li>
              <li>
                <label for="sodienthoai">Số điện thoại người nhận<span class="required">*</span></label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['sodienthoaikh'] }}</p>
              </li>
              <li>
                <label for="diachi">Địa chỉ giao hàng<span class="required">*</span></label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['diachi'] }}</p>
              </li>
              @if (session('psty_damuahang')['email'])
              <li>
                <label for="email">Email </label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['email'] }}</p>
              </li>
              @endif
            @else
              <li>
                <label for="sodienthoai">Số điện thoại người nhận<span class="required">*</span></label>
                <br>
                <input type="text" class="input-text" placeholder="Họ và tên" name="sodienthoai" value="{{ session('psty_sodienthoai') }}" data-validation="custom" data-validation-regexp="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" data-validation-error-msg="Số điện thoại không hợp lệ">
                <span class="help-block form-error">{{ $errors->first('sodienthoai') }}</span>
              </li>
              <li>
                <label for="hovaten">Họ và tên người nhận<span class="required">*</span></label>
                <br>
                <input type="text" class="input-text" placeholder="Họ và tên" name="hovaten" value="{{ old('hovaten') }}" autofocus autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập họ và tên từ 3 ký tự">
                <span class="help-block form-error">{{ $errors->first('hovaten') }}</span>
              </li>
              <li>
                <label for="diachi">Địa chỉ giao hàng<span class="required">*</span></label>
                <br>
                <input type="text" class="input-text" name="diachi" placeholder="Địa chỉ" value="{{ old('diachi') }}" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 3 ký tự">
                <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
              </li>
              <li>
                <label for="email">Email </label>
                <br>
                <input type="text" class="input-text" name="email" placeholder="Email" value="{{ old('email') }}">
                <span class="help-block form-error">{{ $errors->first('email') }}</span>
              </li>
              @endif
              <li>
                <label for="hovaten">Ghi chú mua hàng</label>
                <br>
                <textarea name="ghichu" placeholder="Ghi chú đặt hàng" style="width: 100%;" rows="4"></textarea>
              </li>
              <p class="required">Dấu * Là bắt buộc</p>
            </ul>
            <div class="buttons-set">
              <button name="send" type="submit" class="button"><span>Thanh toán</span></button>
              <button name="send" type="button" onclick="location='{{ route('getStep1') }}'" class="button"><span>Quay lại</span></button>
            </div>
          </form>
        </div>
      </div>
      </fieldset>
    </div>
  </div>
</section>
@endsection