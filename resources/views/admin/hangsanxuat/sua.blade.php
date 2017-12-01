@extends('layouts.admin')
@section('title', 'Sửa hãng sản xuất')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPham') }}" class="tip-bottom">Hãng sản xuất</a> <a href="#" class="current">Chỉnh sửa</a> </div>
  <h1>Chỉnh sửa hãng sản xuất</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postSuaHangSanXuat', $hangsanxuat->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin hãng sản xuất</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="control-label">Tên hãng:</label>
            <div class="controls">
              <input type="text" name="tenhang" value="{{ $hangsanxuat->tenhang }}" class="span11" placeholder="Tên hãng" autofocus data-validation="length" data-validation-length="min2" data-validation-error-msg-length="Tên hãng phải từ 2 ký tự"/>
              <span class="help-block form-error">{{ $errors->first('tenhang') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Logo hãng:</label>
            <div class="controls">
              <input type="file" name="logohang" accept="image/*" onchange="readURL(this);" data-validation="mime" 
     data-validation-allowing="jpg, png, gif" data-validation-error-msg-mime="Vui lòng chọn hình ảnh (jpg, png, gif)"/>
       <span class="help-block form-error">{{ $errors->first('logohang') }}</span>
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <div id ="up_images"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Logo hiện tại:</label>
            <div class="controls">
            <img src="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}" width="40">
              <span> &nbsp; <a class="lightbox_trigger" href="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}"><i class="icon-search"></i></a> 
              </span>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Trạng thái: </label>
              <div class="controls">
                <label>
                  <input type="radio" name="trangthai" value="1" 
                  @php
                    if($hangsanxuat->trangthai == 1) 
                      echo 'checked="true"';
                  @endphp />
                  Hiển thị</label>
                <label>
                  <input type="radio" name="trangthai" value="2" 
                  @php
                    if($hangsanxuat->trangthai == 2) 
                      echo 'checked="true"';
                  @endphp/>
                  Không hiển thị</label>
              </div>
            </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listHangSanXuat') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
  var readURL = function(input) {
      $('#up_images').empty();   
      var number = 0;
      $.each(input.files, function(value) {
          var reader = new FileReader();
          reader.onload = function (e) {
              var id = (new Date).getTime();
              number++;
              $('#up_images').prepend('<img id='+id+' src='+e.target.result+' width="100px" height="100px" data-index='+number+'/>')
          };
          reader.readAsDataURL(input.files[value]);
          }); 
    }

    $.validate({
     lang: 'vi',
     errorMessagePosition : 'top',
     scrollToTopOnError : false
  });
</script>
@endsection