@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('getThongTinCaNhan') }}" class="tip-bottom">Thông tin cá nhân</a></div>
  <h1>Thông tin cá nhân</h1>
</div>
<div class="container-fluid">
  @include('partials.myform_error')
  @include('partials.alert-info')
 <form action="{{ route('postUpdateThongTinCaNhan') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Thông tin cá nhân</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <label class="control-label">Mã nhân viên:</label>
            <div class="controls">
              <span style="color:#5eaf36;line-height: 30px;">{{ $thongtin->manhanvien }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Họ và tên:</label>
            <div class="controls">
              <input type="text" name="hovaten" class="span11" value="{{ $thongtin->hovaten }}" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập họ và tên hơn 3 ký tự">
              <span class="help-block form-error">{{ $errors->first('hovaten') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ngày sinh:</label>
            <div class="controls">
              <input type="text" name="ngaysinh" class="span11 mask-date" value="{{ dinh_dang_ngay($thongtin->ngaysinh) }}"  data-validation="birthdate" data-validation-format="dd-mm-yyyy" data-validation-error-msg-birthdate="Vui lòng nhập ngày sinh hợp lệ">
              <span class="help-block form-error">{{ $errors->first('ngaysinh') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mật khẩu cũ:</label>
            <div class="controls">
              <input type="password" name="matkhaucu" class="span11" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mật khẩu mới:</label>
            <div class="controls">
              <input type="password" name="matkhaumoi" class="span11" value="">
              <span class="help-block">(Để trống nếu không muốn đổi mật khẩu)</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Lập lại mật khẩu mới:</label>
            <div class="controls">
              <input type="password" name="nhaplaimatkhau" class="span11" value="">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Giới tính: </label>
            <div class="controls">
              <label>
                <input type="radio" name="gioitinh" value="1" 
                @php
                  if($thongtin->gioitinh == 1) 
                    echo 'checked="true"';
                @endphp/>
                Nam</label>
              <label>
              <input type="radio" name="gioitinh" value="0" 
              @php
                if($thongtin->gioitinh == 0) 
                  echo 'checked="true"';
              @endphp />
              Nữ</label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Địa chỉ:</label>
            <div class="controls">
              <input type="text" name="diachi" class="span11" value="{{ $thongtin->diachi }}" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 5 ký tự">
              <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Số điện thoại:</label>
            <div class="controls">
              <input type="text" name="sodienthoainv" class="span11 mask-phone" value="{{ $thongtin->sodienthoainv }}" data-validation="length" data-validation-length="min10" data-validation-error-msg-length="Vui lòng nhập số điện thoại từ 10 số">
              <span class="help-block form-error">{{ $errors->first('sodienthoainv') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email:</label>
            <div class="controls">
              <input type="text" name="email" class="span11" value="{{ $thongtin->email }}" data-validation="email" data-validation-error-msg-email="Email không hợp lệ">
              <span class="help-block form-error">{{ $errors->first('email') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
      <center>
        <button type="submit" class="btn btn-success">Lưu lại</button>
        <button type="button" class="btn btn-info" onclick="window.location='{{ route('dashboard') }}'">Quay lại</button>
      </center>
    </form>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/masked.js') }}"></script> 
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script>
  $(".mask-date").mask("99-99-9999");
  $('.mask-date').datepicker({
    language: 'vi',
    format : 'dd-mm-yyyy'
  });

  $.validate({
     lang: 'vi',
     modules : 'date, security',
     scrollToTopOnError : false
  });
</script>
@endsection