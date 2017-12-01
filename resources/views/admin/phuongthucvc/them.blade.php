@extends('layouts.admin')
@section('title', 'Thêm phương thức vận chuyển')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPhuongThucVC') }}" class="tip-bottom">Phương thức vận chuyển</a> <a href="#" class="current">Thêm mới</a> </div>
  <h1>Thêm phương thức vận chuyển</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postThemPhuongThucVC') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin phương thức vận chuyển</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="control-label">Tên vận chuyển:</label>
            <div class="controls">
              <input type="text" name="tenvanchuyen" value="{{ old('tenvanchuyen') }}" class="span11" placeholder="Tên vận chuyển" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tên phương thức vận chuyển từ 3 ký tự"/>
              <span class="help-block form-error">{{ $errors->first('tenvanchuyen') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Thời gian vận chuyển:</label>
            <div class="controls">
              <input type="text" name="thoigianvanchuyen" value="{{ old('thoigianvanchuyen') }}" class="span11" placeholder="Thời gian vận chuyển" data-validation="length" data-validation-length="min1" data-validation-error-msg-length="Vui lòng nhập thời gian vận chuyển"/>
              <span class="help-block form-error">{{ $errors->first('thoigianvanchuyen') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Phí vận chuyển:</label>
            <div class="controls">
              <input type="text" name="phivanchuyen" value="{{ old('phivanchuyen') }}" class="span11" id="price_number" data-validation="required" data-validation-error-msg="Vui lòng nhập phí vận chuyển"/>
              <span class="help-block form-error">{{ $errors->first('phivanchuyen') }}</span>
              <input type="hidden" name="hidden_price" id="hidden_price" value="{{ old('phivanchuyen') }}">
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
      <a href="{{ route('listPhuongThucVC') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $('#price_number').number( true, 0 );
  $('#price_number').keyup(function(){
    var val = $('#price_number').val();
    $('#hidden_price').val(val);
  });
</script>
<script type="text/javascript">
  $.validate({
     lang: 'vi',
     scrollToTopOnError : false
  });
</script>
@endsection