@extends('layouts.admin')
@section('title', 'Cài đặt thông tin cửa hàng')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('getThongTinCaNhan') }}" class="tip-bottom">Thông tin cửa hàng</a></div>
  <h1>Thông tin cửa hàng</h1>
</div>
<div class="container-fluid">
  @include('partials.myform_error')
  @include('partials.alert-info')
 <form action="{{ route('postCaiDat') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Thông tin cửa hàng</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <label class="control-label">Tên cửa hàng:</label>
            <div class="controls">
              <input type="text" name="tencuahang" class="span11" value="{{ $cuahang->tencuahang }}" data-validation="length" data-validation-length="min1" data-validation-error-msg-length="Vui lòng nhập tên cửa hàng hơn 1 ký tự">
              <span class="help-block form-error">{{ $errors->first('tencuahang') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Địa chỉ:</label>
            <div class="controls">
              <input type="text" name="diachi" class="span11" value="{{ $cuahang->diachi }}" data-validation="length" data-validation-length="min5" data-validation-error-msg-length="Vui lòng nhập địa chỉ từ 5 ký tự">
              <span class="help-block form-error">{{ $errors->first('diachi') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Số điện thoại:</label>
            <div class="controls">
              <input type="text" name="sodienthoai" class="span11 mask-phone" value="{{ $cuahang->sodienthoai }}" data-validation="length" data-validation-length="min10" data-validation-error-msg-length="Vui lòng nhập số điện thoại từ 10 số">
              <span class="help-block form-error">{{ $errors->first('sodienthoai') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Email:</label>
            <div class="controls">
              <input type="text" name="email" class="span11" value="{{ $cuahang->email }}" data-validation="email" data-validation-error-msg-email="Email không hợp lệ">
              <span class="help-block form-error">{{ $errors->first('email') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Giới thiệu:</label>
            <div class="controls">
              <input type="text" name="gioithieu" class="span11" value="{{ $cuahang->gioithieu }}">
              <span class="help-block form-error">{{ $errors->first('gioithieu') }}</span>
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
<script>

  $.validate({
     lang: 'vi',
     modules : 'date, security',
     scrollToTopOnError : false
  });
</script>
@endsection