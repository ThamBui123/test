@extends('layouts.admin')
@section('title', 'Sửa tin tức')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listTinTuc') }}" class="tip-bottom">Tin tức</a> <a href="#" class="current">Chỉnh sửa</a> </div>
  <h1>Chỉnh sửa tin tức</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postSuaTinTuc', $tintuc->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin tin tức</h5>
        </div>
        <div class="widget-content nopadding">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
            <label class="control-label">Nhân viên tạo:</label>
            <div class="controls">
              {{ $tintuc->nhanvien->hovaten }}
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tiêu đề tin tức:</label>
            <div class="controls">
              <input type="text" name="tieude" class="span11" value="{{ $tintuc->tieude }}" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tiêu đề tin tức từ 3 ký tự">
              <span class="help-block form-error">{{ $errors->first('tieude') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ảnh đại diện</label>
            <div class="controls">
              <input type="file" name="thumbnail" accept="image/*" onchange="readURL(this);" data-validation="mime" 
     data-validation-allowing="jpg, png, gif" data-validation-error-msg-mime="Vui lòng chọn hình ảnh (jpg, png, gif)"/>
           <span class="help-block form-error">{{ $errors->first('thumbnail') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label up_images"></label>
            <div class="controls">
              <div id ="up_images"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Ảnh hiện tại</label>
            <ul class="thumbnails" style="margin-left: 0 !important">
              <li class="span2">
              <a> <img src="{{ asset('uploads/tintuc/'. $tintuc->thumbnail) }}"> </a>

                <div class="actions"> <a class="lightbox_trigger" href="{{ asset('uploads/tintuc/'. $tintuc->thumbnail) }}"><i class="icon-search"></i></a> 
                </div>
              </li>
            </ul>
          </div>
          <div class="control-group">
            <label class="control-label">Trạng thái: </label>
            <div class="controls">
              <label>
                <input type="radio" name="trangthai" value="1" 
                @php
                  if($tintuc->trangthai == 1) 
                    echo 'checked="true"';
                @endphp />
                Hiển thị</label>
              <label>
                <input type="radio" name="trangthai" value="2" 
                @php
                  if($tintuc->trangthai == 2) 
                    echo 'checked="true"';
                @endphp/>
                Không hiển thị</label>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title">
          <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Nội dung tin tức</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="form-control">
                <span class="help-block form-error">{{ $errors->first('noidung') }}</span> <br>
                <textarea class="textarea_editor span12" name="noidung" rows="6" placeholder="Nội dung tin tức">{{ $tintuc->noidung }}</textarea>
              </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listTinTuc') }}" class="btn btn-danger">Quay lại</a>
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
  var readURL = function(input, idclass = 'up_images') {
      $('#' +idclass+'').empty();   
      $('.' +idclass+'').empty();
      $('.' +idclass+'').prepend('Xem trước: ');
      var number = 0;
      $.each(input.files, function(value) {
          var reader = new FileReader();
          reader.onload = function (e) {
              var id = (new Date).getTime();
              number++;
              $('#' +idclass+'').prepend('<img id='+id+' src='+e.target.result+' width="100px" height="100px" data-index='+number+'/>');
          };
          reader.readAsDataURL(input.files[value]);
      }); 
    }
    $.validate({
     lang: 'vi',
     errorMessagePosition : 'top',
     modules : 'file',
     scrollToTopOnError : false
  });
</script>
@endsection