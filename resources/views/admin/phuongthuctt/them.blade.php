@extends('layouts.admin')
@section('title', 'Thêm phương thức thanh toán')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPhuongThucTT') }}" class="tip-bottom">Phương thức thanh toán</a> <a href="#" class="current">Thêm mới</a> </div>
  <h1>Thêm phương thức thanh toán</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postThemPhuongThucTT') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin phương thức thanh toán</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="control-label">Tên phương thức:</label>
            <div class="controls">
              <input type="text" name="tenphuongthuc" value="{{ old('tenphuongthuc') }}" class="span11" placeholder="Tên phương thức thanh toán" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tên phương thức từ 3 ký tự"/>
              <span class="help-block form-error">{{ $errors->first('tenphuongthuc') }}</span>
            </div>
          </div>
          <div class="control-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="control-label">Hướng dẫn:</label>
            <div class="controls">
              <textarea class="span11" name="huongdan" rows="6" placeholder="Hướng dẫn thanh toán cho khách hàng" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập hướng dẫn thanh toán cho khách hàng từ 10 ký tự">{{ old('huongdan') }}</textarea>
              <span class="help-block form-error">{{ $errors->first('huongdan') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Trạng thái: </label>
            <div class="controls">
              <label>
                <input type="radio" name="trangthai" value="1" 
                @php
                  if(old('trangthai') == 1) 
                    echo 'checked="true"';
                @endphp />
                Hiển thị</label>
              <label>
                <input type="radio" name="trangthai" value="2" 
                @php
                  if(old('trangthai') == 2) {
                    echo 'checked="true"';
                  }else {echo 'checked="true"';};
                @endphp/>
                Không hiển thị</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listPhuongThucTT') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $.validate({
     lang: 'vi',
     scrollToTopOnError : false
  });
</script>
@endsection