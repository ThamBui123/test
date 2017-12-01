@section('style')
<link rel="stylesheet" href="{{ asset('css/site/bootstrap-datepicker.min.css') }}" type="text/css">
  <style type="text/css">
    .dropdown-menu{
      border: 1px solid #ddd;
    }
  </style>
@endsection
@extends('layouts.site')
@section('title', 'Tài khoản của bạn')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getTaiKhoan') }}">Tài khoản</a><span>&mdash;›</span></li>
        <li class="category13"><strong>Thông tin cá nhân</strong></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9">
        <div class="my-account">
          <div class="dashboard">
            <div class="box-account">
              <div class="col2-set" style="padding-top: 0px;">
                <div class="col-1">
                  <h5>Thông tin cá nhân</h5>
                  <p> 
                  Họ và tên: &nbsp;{{ $khachhang->hovaten }}<br>
                  Giới tính: &nbsp;{{ ($khachhang->gioitinh == 1 ? 'Nam' : 'Nữ') }}<br> 
                  Ngày sinh: &nbsp;{{ dinh_dang_ngay($khachhang->ngaysinh) }}<br>
                  </p>
                </div>
                <div class="col-2">
                  <h5>Thông tin liên hệ</h5>
                  <p>
                  Số điện thoại: &nbsp;{{ $khachhang->sodienthoaikh }}<br>
                  Địa chỉ: &nbsp;{{ $khachhang->diachi }}<br>
                  Email: &nbsp;{{ $khachhang->email }}<br>
                  </p>
                </div>
              </div>
            </div>
            <div class="box-account">
              <div class="page-title">
                <h2>Chỉnh sửa thông tin cá nhân</h2>
              </div>
              <form action="{{ route('postUpdateThongTin') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col2-set">
                  <div class="col-1">
                    <h5>Thông tin cá nhân</h5>
                    @include('partials.myform_error')
                    <ul class="form-list">
                      <li>
                        <label for="hovaten">Họ và tên: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Họ và tên" class="input-text" value="{{ $khachhang->hovaten }}" name="hovaten" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập họ và tên từ 3 ký tự">
                        <span class="help-block form-error">{{ $errors->first('hovaten') }}</span>
                      </li>
                      <li>
                        <label for="ngaysinh">Ngày sinh: <span class="required">* (Ngày-tháng-năm)</span></label>
                        <br>
                        <input type="text" name="ngaysinh" class="input-text mask-date" value="{{ dinh_dang_ngay($khachhang->ngaysinh) }}" data-validation="birthdate" data-validation-format="dd-mm-yyyy" data-validation-error-msg-birthdate="Vui lòng nhập ngày sinh hợp lệ">
                        <span class="help-block form-error">{{ $errors->first('ngaysinh') }}</span>
                      </li>
                      <li>
                        <label for="gioitinh">Giới tính: <span class="required">*</span></label>
                        <br>
                        <select name="gioitinh" class="form-select" title="Giới tính">
                          @if($khachhang->gioitinh == 1)
                          <option value="1" selected="selected">Nam</option>
                          <option value="0">Nữ</option>
                          @else
                          <option value="1">Nam</option>
                          <option value="0" selected="selected">Nữ</option>
                          @endif
                        </select>
                        <span class="help-block form-error">{{ $errors->first('gioitinh') }}</span>
                      </li>
                    </ul>
                  </div>
                  <div class="col-2">
                    <h5>Thông tin liên hệ</h5>
                    <ul class="form-list">
                      <li>
                        <label for="sodienthoaikh">Số điện thoại: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Số điện thoại" class="input-text" value="{{ $khachhang->sodienthoaikh }}" name="sodienthoaikh" data-validation="length" data-validation-length="min10" data-validation-error-msg-length="Vui lòng nhập số điện thoại từ 10 số">
                        <span class="help-block form-error">{{ $errors->first('sodienthoaikh') }}</span>
                      </li>
                      <li>
                        <label for="diachi">Địa chỉ: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Địa chỉ" class="input-text" value="{{ $khachhang->diachi }}" name="diachi" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 3 ký tự">
                        <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
                      </li>
                      <li>
                        <label for="email">Email: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Email" class="input-text" value="{{ $khachhang->email }}" name="email" data-validation="email">
                        <span class="help-block form-error">{{ $errors->first('email') }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col2-set">
                  <div class="col-1">
                    @if($khachhang->loaikh == 1)
                    <h5>Thay đổi mật khẩu (để trống nếu không thay đổi)</h5>
                    @else
                    <h5>Bạn đang đăng nhập bằng Facebook. Thay đổi mật khẩu nếu muốn</h5>
                    @endif
                    <ul class="form-list">
                      @if($khachhang->loaikh == 1)
                      <li>
                        <label for="matkhaucu">Mật khẩu cũ:</label>
                        <br>
                        <input type="password" title="Số điện thoại" class="input-text" name="matkhaucu">
                        <span class="help-block form-error">{{ $errors->first('matkhaucu') }}</span>
                      </li>
                      @endif
                      <li>
                        <label for="matkhaumoi">Mật khẩu mới: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Số điện thoại" class="input-text" name="matkhaumoi">
                        <span class="help-block form-error">{{ $errors->first('matkhaumoi') }}</span>
                      </li>
                      <li>
                        <label for="nhaplaimatkhau">Nhập lại mật khẩu mới: <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Số điện thoại" class="input-text" value="" name="nhaplaimatkhau" data-validation="confirmation" data-validation-confirm="matkhaumoi" data-validation-error-msg="Nhập lại mật khẩu mới không khớp">
                        <span class="help-block form-error">{{ $errors->first('nhaplaimatkhau') }}</span>
                      </li>
                    </ul>
                  </div>
                  <div class="col-2">
                    <button class="btn btn-success">Lưu lại</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      @include('site.blocks.khachhang.rightbar')
    </div>
  </div>
</div>
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