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
        <legend>Bạn đã có tài khoản</legend>
        <div class="col-1 new-users"><strong>Đăng nhập hệ thống</strong>
          <div class="content">
          @if (!Auth::check())
            <form action="{{ route('postDangNhap') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <p>Nếu bạn có tài khoản vui lòng đăng nhập để có thể xem tình trang đơn hàng.</p>
              <ul class="form-list">
                <li>
                  <label for="email">Email <span class="required">*</span></label>
                  <br>
                  <input type="text" class="input-text" id="email" name="email" placeholder="Email" data-validation="email">
                </li>
                <li>
                  <label for="pass">Mật khẩu <span class="required">*</span></label>
                  <br>
                  <input type="password" class="input-text" name="password" placeholder="Mật khẩu" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập mật khẩu từ 5 ký tự">
                </li>
                <li>
                <div class="checkbox">
                  <label><input type="checkbox" value="true" name="remember">Ghi nhớ đăng nhập</label>
                </div>
              </li>
              </ul>
              <div class="buttons-set">
                <button name="send" type="submit" class="btn btn-info"><span>Đăng nhập</span></button>
                <button class="btn btn-success" onclick="window.location='{{ route('getLoginFacebook') }}';">Đăng nhập bằng facebook</button>
                <a class="forgot-word" href="{{ url('password/reset') }}">Quên mật khẩu?</a> 
              </div>
              <hr>
              <div class="buttons-set">
                <button onclick="window.location='{{ route('home') }}';" class="button create-account" type="button"><span>Đăng ký tài khoản</span></button>
              </div>
            </form>
            @else
            Bạn đã đăng nhập
            @endif
          </div>
        </div>
        <div class="col-2">
        <strong>Mua hàng không cần đăng ký</strong>
        <div class="content">
          @include('partials.myform_error')
          <form action="{{ route('postStep1') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <p>Vui lòng nhập số điện thoại.</p>
            <ul class="form-list">
              <li>
                <label for="sodienthoai">Số điện thoại <span class="required">*</span></label>
                <br>
                <input type="text" class="input-text" name="sodienthoai" placeholder="Số điện thoại" value="{{ session('psty_sodienthoai') }}" data-validation="custom" data-validation-regexp="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" data-validation-error-msg="Số điện thoại không hợp lệ">
                <span class="help-block form-error">{{ $errors->first('sodienthoai') }}</span>
              </li>
            @if (session('psty_damuahang') && session('psty_damuahang')['sodienthoaikh'] === session('psty_sodienthoai'))
              <li>
                <p class="required">Bạn đã mua hàng trước đó bạn có muốn lấy lại thông tin này không</p>
              </li>
              <li>
                <label for="hovaten">Họ và tên người nhận :</label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['hovaten'] }}</p>
              </li>
              <li>
                <label for="sodienthoai">Số điện thoại người nhận:</label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['sodienthoaikh'] }}</p>
              </li>
              <li>
                <label for="diachi">Địa chỉ người nhận:</label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['diachi'] }}</p>
              </li>
              @if (session('psty_damuahang')['email'])
              <li>
                <label for="email">Email:</label>
                <br>
                <p class="info-account">{{ session('psty_damuahang')['email'] }}</p>
              </li>
              @endif
            @endif
            </ul>
            <div class="buttons-set">
              @if (session('psty_damuahang') && session('psty_damuahang')['sodienthoaikh'] === session('psty_sodienthoai'))
              <button type="button" onclick="window.location='{{ route('getStep1Y') }}'" class="button"><span>Đồng ý</span></button>
              <button type="button" onclick="window.location='{{ route('getStep1N') }}'" class="button"><span>Không</span></button>
              <button name="send" type="submit" class="button"><span>Nhập lại số điện thoại</span></button>
              <button type="button" onclick="location='{{ route('getCart') }}'" class="button"><span>Quay lại</span></button>
              @else
              <button name="send" type="submit" class="button"><span>Gửi đi</span></button>
              <button type="button" onclick="location='{{ route('getCart') }}'" class="button"><span>Quay lại</span></button>
              @endif
            </div>
          </form>
        </div>
      </div>
      </fieldset>
    </div>
  </div>
</section>
@endsection