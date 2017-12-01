@extends('layouts.admin')
@section('title', 'Chỉnh sửa sliders')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSliders') }}" class="tip-bottom">Trang</a> <a href="#" class="current">Chỉnh sửa</a> </div>
  <h1>Chỉnh sửa slider</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postSuaSliders', $slider->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin slider</h5>
        </div>
        <div class="widget-content nopadding">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
            <label class="control-label">Tiêu đề slider:</label>
            <div class="controls">
              <input type="text" name="tieude" class="span11" value="{{ $slider->tieude }}" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tiêu đề trang từ 3 ký tự">
              <span class="help-block form-error">{{ $errors->first('tieude') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nhập liên kết:</label>
            <div class="controls">
              <input type="text" name="lienket" class="span11 _lienket" value="{{ $slider->lienket }}" data-validation="url" data-validation-error-msg="Vui lòng nhập liên kết hợp lệ">
              <span class="help-block form-error">{{ $errors->first('lienket') }}</span>
            </div>
          </div>
          <div class="control-group">
          <label class="control-label">Hoặc chọn sản phẩm:</label>
           <div class="controls">
              <input class="select2_sanpham chon_sanpham" data-href="{{ route('getListSanPhamAjax') }}">
           </div>
          </div>
          <div class="control-group">
            <label class="control-label">Hình ảnh</label>
            <div class="controls">
              <input type="file" name="hinhanh" accept="image/*" onchange="readURL(this);" data-validation="mime" 
     data-validation-allowing="jpg, png, gif" data-validation-error-msg-mime="Vui lòng chọn hình ảnh (jpg, png, gif)"/>
         <span class="help-block form-error">{{ $errors->first('hinhanh') }}</span>
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
              <a> <img src="{{ asset('uploads/banner/'. $slider->hinhanh) }}"> </a>

                <div class="actions"> <a class="lightbox_trigger" href="{{ asset('uploads/banner/'. $slider->hinhanh) }}"><i class="icon-search"></i></a> 
                </div>
              </li>
            </ul>
          </div>
          <div class="control-group">
            <label class="control-label">Vị trí: </label>
            <div class="controls">
              <label>
                <input type="radio" name="vitri" value="1" 
                @php
                  if($slider->vitri == 1) 
                    echo 'checked="true"';
                @endphp />
                Trái</label>
              <label>
                <input type="radio" name="vitri" value="2" 
                @php
                  if($slider->vitri == 2) 
                    echo 'checked="true"';
                @endphp/>
               Phải</label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Trạng thái: </label>
            <div class="controls">
              <label>
                <input type="radio" name="trangthai" value="1" 
                @php
                  if($slider->trangthai == 1) 
                    echo 'checked="true"';
                @endphp />
                Hiển thị</label>
              <label>
                <input type="radio" name="trangthai" value="2" 
                @php
                  if($slider->trangthai == 2) 
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
      <a href="{{ route('listSliders') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/select-sanpham.js') }}"></script> 
<script type="text/javascript">
  $(".chon_sanpham").change(function() {
    giatri_chon = $(this).select2("data");
    slugsp = giatri_chon.slugsp;
    APP_URL = {!! json_encode(url('/')) !!};
    link = APP_URL + '/san-pham/' +slugsp;
    $('._lienket').val(link);
  });
</script>
<script type="text/javascript">
  readURL = function(input, idclass = 'up_images') {
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
</script>
<script type="text/javascript">
  $.validate({
     lang: 'vi',
     scrollToTopOnError : false,
     errorMessagePosition : 'top',
  });
</script>
@endsection