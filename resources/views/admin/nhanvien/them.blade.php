@extends('layouts.admin')
@section('title', 'Thêm nhân viên')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhanVien') }}" class="tip-bottom">Nhân viên</a> <a href="#" class="current">Thêm mới</a> </div>
  <h1>Thêm mới nhân viên</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postThemNhanVien') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin nhân viên</h5>
        </div>
        <div class="widget-content nopadding">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
            <label class="control-label">Mã nhân viên:</label>
            <div class="controls">
              <input type="text" name="manhanvien" class="span11" value="NV{{ time() }}" autofocus data-validation="length" data-validation-length="min2" data-validation-error-msg-length="Vui lòng nhập mã nhân viên từ hai ký tự">
              <span class="help-block form-error">{{ $errors->first('manhanvien') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Họ và tên:</label>
            <div class="controls">
              <input type="text" name="hovaten" class="span11" value="{{ old('hovaten') }}" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tên nhân viên hơn 3 ký tự">
              <span class="help-block form-error">{{ $errors->first('hovaten') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ngày sinh:</label>
            <div class="controls">
              <input type="text" name="ngaysinh" class="span11 mask-date" value="{{ dinh_dang_ngay(old('ngaysinh')) }}"  data-validation="birthdate" data-validation-format="dd-mm-yyyy" data-validation-error-msg-birthdate="Vui lòng nhập ngày sinh hợp lệ">
              <span class="help-block form-error">{{ $errors->first('ngaysinh') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Thuộc nhóm quyền:</label>
            <div class="controls">
              <select name="nhomquyen_id">
                @foreach($all_nhomquyen as $nhomquyen)
                <option value="{{ $nhomquyen->id }}" {{ old('nhomquyen_id') === $nhomquyen->id ? 'selected' : '' }}>
                  {{ $nhomquyen->tennhomquyen }}
                </option>
                @endforeach
              </select>
              <span class="help-block form-error">{{ $errors->first('nhomquyen_id') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mật khẩu:</label>
            <div class="controls">
              <input type="text" name="matkhau" class="span11" value="{{ old('matkhau') }}" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập mật khẩu từ 5 ký tự">
              <span class="help-block form-error">{{ $errors->first('matkhau') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Lập lại mật khẩu:</label>
            <div class="controls">
              <input type="text" name="laplaimatkhau" class="span11" value="{{ old('laplaimatkhau') }}" data-validation="confirmation" data-validation-confirm="matkhau" data-validation-error-msg="Mật khẩu không khớp">
              <span class="help-block form-error">{{ $errors->first('laplaimatkhau') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Giới tính: </label>
            <div class="controls">
              <label>
                <input type="radio" name="gioitinh" value="1" 
                @php
                  if(old('gioitinh') == 1) 
                    echo 'checked="true"';
                @endphp/>
                Nam</label>
              <label>
              <input type="radio" name="gioitinh" value="0" 
              @php
                if(old('gioitinh') == 0) 
                  echo 'checked="true"';
              @endphp />
              Nữ</label>
              <span class="help-block form-error">{{ $errors->first('gioitinh') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Địa chỉ:</label>
            <div class="controls">
              <input type="text" name="diachi" class="span11" value="{{ old('diachi') }}" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 5 ký tự">
              <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Số điện thoại:</label>
            <div class="controls">
              <input type="text" name="sodienthoainv" class="span11 mask-phone" value="{{ old('sodienthoainv') }}" data-validation="length" data-validation-length="min10" data-validation-error-msg-length="Vui lòng nhập số điện thoại từ 10 số">
              <span class="help-block form-error">{{ $errors->first('sodienthoainv') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email:</label>
            <div class="controls">
              <input type="text" name="email" class="span11" value="{{ old('email') }}" data-validation="email" data-validation-error-msg-email="Email không hợp lệ">
              <span class="help-block form-error">{{ $errors->first('email') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listNhanVien') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/masked.js') }}"></script> 
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script>
  $('select').select2();
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