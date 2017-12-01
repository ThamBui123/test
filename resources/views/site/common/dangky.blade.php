@section('style')
<link rel="stylesheet" href="{{ asset('css/site/bootstrap-datepicker.min.css') }}" type="text/css">
<style type="text/css">
  .dropdown-menu{
    border: 1px solid #ddd;
  }
</style>
@endsection
@extends('layouts.site')
@section('title', 'Đăng ký tài khoản')
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="account">
      <div class="page-title">
        <h2>Đăng ký tài khoản mới</h2>
      </div>
      <fieldset class="col2-set">
        <legend>Tạo tài khoản mới</legend>
        <div class="col-1 new-users"><strong>Bạn chưa có tài khoản</strong>
          <div class="content">
            <p>Bằng cách tạo một tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều hơn nữa.</p>
            <button class="btn btn-success" onclick="window.location='{{ route('getLoginFacebook') }}';">Đăng nhập bằng facebook</button>
          </div>
        </div>
        <div class="col-2 registered-users"><strong>Đăng ký</strong>
          <div class="content">
            <form action="{{ route('postDangKy') }}" method="post">
              <p>Vui lòng nhập đầy đủ thông tin.</p>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <ul class="form-list">
                <li>
                  <label for="hovaten">Họ và tên: <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Họ và tên" class="input-text" value="{{ old('hovaten') }}" name="hovaten" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập họ và tên từ 3 ký tự">
                  <span class="help-block form-error">{{ $errors->first('hovaten') }}</span>
                </li>
                <li>
                  <label for="diachi">Địa chỉ: <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Địa chỉ" class="input-text" value="{{ old('diachi') }}" name="diachi" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 3 ký tự">
                  <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
                </li>
                <li>
                  <label for="gioitinh">Giới tính: <span class="required">*</span></label>
                  <br>
                  <select name="gioitinh" class="form-select" title="Giới tính">
                    <option value="1" selected="selected">Nam</option>
                    <option value="0">Nữ</option>
                  </select>
                  <span class="help-block form-error">{{ $errors->first('gioitinh') }}</span>
                </li>
                <li>
                  <label for="ngaysinh">Ngày sinh: <span class="required">* </span><span>(Ngày-tháng-năm)</span></label>
                  <br>
                  <input type="text" name="ngaysinh" class="input-text mask-date" value="{{ old('ngaysinh') }}" data-validation="birthdate" data-validation-format="dd-mm-yyyy" data-validation-error-msg-birthdate="Vui lòng nhập ngày sinh hợp lệ">
                  <span class="help-block form-error">{{ $errors->first('ngaysinh') }}</span>
                </li>
                <li>
                  <label for="email">Email: <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Email" class="input-text" value="{{ old('email') }}" name="email" data-validation="email" data-validation-error-msg="Vui lòng nhập một email">
                  <span class="help-block form-error">{{ $errors->first('email') }}</span>
                </li>
                <li>
                  <label for="sodienthoaikh">Số điện thoại: <span class="required">*</span></label>
                  <br>
                  <input type="text" title="Số điện thoại" class="input-text" value="{{ old('sodienthoaikh') }}" name="sodienthoaikh" data-validation="length" data-validation-length="min10" data-validation-error-msg-length="Vui lòng nhập số điện thoại từ 10 số">
                  <span class="help-block form-error">{{ $errors->first('sodienthoaikh') }}</span>
                </li>
                <li>
                  <label for="pass">Mật khẩu: <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Mật khẩu" id="pass" class="input-text" name="password" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập mật khẩu từ 5 ký tự">
                  <span class="help-block form-error">{{ $errors->first('password') }}</span>
                </li>
                <li>
                  <label for="repass">Lập lại mật khẩu: <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Lập lại mật khẩu" id="pass" class="input-text" name="repassword" data-validation="confirmation" data-validation-confirm="password" data-validation-error-msg="Mật khẩu không khớp">
                  <span class="help-block form-error">{{ $errors->first('repassword') }}</span>
                </li>
              </ul>
              <p class="required">Dấu * Là bắt buộc</p>
              <div class="buttons-set">
                <button id="send2" name="send" type="submit" class="button login"><span>Đăng ký</span></button>
              </div>
            </form>
          </div>
        </div>
      </fieldset>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/site/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/site/bootstrap-datepicker.vi.min.js') }}" charset="UTF-8"></script>
<script type="text/javascript">
  $('.mask-date').datepicker({
    language: 'vi',
    format : 'dd-mm-yyyy'
  });
</script>
@endsection