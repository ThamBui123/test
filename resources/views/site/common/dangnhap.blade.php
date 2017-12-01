@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="account">
      <div class="page-title">
        <h2>Đăng nhập</h2>
      </div>
      <fieldset class="col2-set">
        <legend>Tạo tài khoản mới</legend>
        <div class="col-1 new-users"><strong>Bạn chưa có tài khoản</strong>
          <div class="content">
            <p>Bằng cách tạo một tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều hơn nữa.</p>
            <div class="buttons-set">
              <button onclick="window.location='{{ route('getDangKy') }}';" class="btn btn-info" type="button"><span>Tạo tài khoản mới</span></button>
              <button class="btn btn-success" onclick="window.location='{{ route('getLoginFacebook') }}';">Đăng nhập bằng facebook</button>
            </div>
          </div>
        </div>
        <div class="col-2 registered-users"><strong>Đăng nhập</strong>
          <div class="content">
          <form action="{{ route('postDangNhap') }}" method="post">
            <p>Vui lòng nhập đầy đủ thông tin.</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('partials.alert-info')
            <ul class="form-list">
              <li>
                <label for="email">Email: <span class="required">*</span></label>
                <br>
                <input type="text" title="Email" class="input-text" value="{{ old('email') }}" name="email" data-validation="email" autofocus data-validation-error-msg="Vui lòng nhập một email">
                <span class="help-block form-error">{{ $errors->first('email') }}</span>
              </li>
              <li>
                <label for="pass">Mật khẩu: <span class="required">*</span></label>
                <br>
                <input type="password" title="Mật khẩu" id="pass" class="input-text" name="password" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập mật khẩu từ 5 ký tự">
                <span class="help-block form-error">{{ $errors->first('password') }}</span>
              </li>
              <li>
                <div class="checkbox">
                  <label><input type="checkbox" value="true" name="remember">Ghi nhớ đăng nhập</label>
                </div>
              </li>
            </ul>
            <p class="required">Dấu * Là bắt buộc</p>
            <div class="buttons-set">
              <button name="login" type="submit" class="button login"><span>Đăng nhập</span></button>
              <a class="forgot-word" href="{{ url('password/reset') }}">Quên mật khẩu?</a> </div>
            </form>
          </div>
        </div>
      </fieldset>
    </div>
</section>
@endsection