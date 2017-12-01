@extends('layouts.admin')
@section('title', 'Thêm trang mới')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPages') }}" class="tip-bottom">Trang</a> <a href="#" class="current">Thêm mới</a> </div>
  <h1>Thêm trang</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postThemPages') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin trang</h5>
        </div>
        <div class="widget-content nopadding">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
            <label class="control-label">Tiêu đề trang:</label>
            <div class="controls">
              <input type="text" name="tieude" class="span11" value="{{ old('tieude') }}" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tiêu đề trang từ 3 ký tự">
              <span class="help-block form-error">{{ $errors->first('tieude') }}</span>
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
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Nội dung trang</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="form-control">
                <span class="help-block form-error">{{ $errors->first('noidung') }}</span> <br>
                <textarea class="textarea_editor span12" name="noidung" rows="6" placeholder="Nội dung trang">{{ old('noidung') }}</textarea>
              </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listPages') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/admin/editor.js') }}"></script> 
<script type="text/javascript">
  $.validate({
     lang: 'vi',
     scrollToTopOnError : false
  });
</script>
@endsection