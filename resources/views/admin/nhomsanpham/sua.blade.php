<!-- @extends('layouts.admin')
@section('title', 'Sửa nhóm sản phẩm')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhomSanPham') }}" class="tip-bottom">Nhóm sản phẩm</a> <a href="#" class="current">Chỉnh sửa</a> </div>
  <h1>Chỉnh sửa nhóm sản phẩm</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postSuaNhomSanPham', $nhomsanpham->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin nhóm sản phẩm</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label class="control-label">Tên nhóm sản phẩm:</label>
            <div class="controls">
              <input type="text" name="tennhomsanpham" value="{{ $nhomsanpham->tennhomsanpham }}" class="span11" placeholder="Tên nhóm sản phẩm" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tên nhóm sản phẩm từ 3 ký tự"/>
              <span class="help-block form-error">{{ $errors->first('tennhomsanpham') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Thuộc nhóm sản phẩm</label>
            <div class="controls">
              <select name="parent_id">
                <option value="0">--Không thuộc nhóm sản phẩm nào--</option>
                 @php admin_select_nhomsanpham($all_nhomsanpham, 0, $str = ' ', $nhomsanpham->parent_id); @endphp
              </select>
              <span class="help-block form-error">{{ $errors->first('parent_id') }}</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Giới thiệu:</label>
            <div class="controls">
              <textarea name="gioithieunsp" class="textarea_editor span11" rows="3">{{ $nhomsanpham->gioithieunsp }}</textarea>
              <span class="help-block form-error">{{ $errors->first('gioithieunsp') }}</span>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Trạng thái: </label>
              <div class="controls">
                <label>
                  <input type="radio" name="trangthai" value="1" 
                  @php
                    if($nhomsanpham->trangthai == 1) 
                      echo 'checked="true"';
                  @endphp />
                  Hiển thị</label>
                <label>
                  <input type="radio" name="trangthai" value="2" 
                  @php
                    if($nhomsanpham->trangthai == 2) 
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
      <a href="{{ route('listNhomSanPham') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script type="text/javascript">
  $('select').select2();
  $.validate({
     lang: 'vi',
     scrollToTopOnError : false
  });
</script>
@endsection -->