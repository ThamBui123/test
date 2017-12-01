@extends('layouts.admin')
@section('title', 'Sửa sản phẩm')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPham') }}" class="tip-bottom">Sản phẩm</a> <a href="#" class="current">Chỉnh sửa</a> </div>
  <h1>Chỉnh sửa sản phẩm</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
 <form action="{{ route('postSuaSanPham', $sanpham->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> 
        <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin sản phẩm</h5>
        </div>
        <div class="widget-content nopadding">
            <div class="control-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label class="control-label">Mã sản phẩm:</label>
              <div class="controls">
                <input type="text" name="masanpham" value="{{ $sanpham->masanpham }}" class="span11" placeholder="Mã sản phẩm" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập mã sản phẩm từ 3 ký tự"/>
                <span class="help-block form-error">{{ $errors->first('masanpham') }}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tên sản phẩm:</label>
              <div class="controls">
                <input type="text" name="tensanpham" value="{{ $sanpham->tensanpham }}" class="span11" placeholder="Tên sản phẩm" autofocus data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập tên sản phẩm từ 3 ký tự"/>
                <span class="help-block form-error">{{ $errors->first('tensanpham') }}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hãng sản xuất: </label>
              <div class="controls">
                 <select name="hangsanxuat_id">
                   @foreach ($all_hangsanxuat as $hangsanxuat)
                   <option value="{{ $hangsanxuat->id }}" @if ($hangsanxuat->id == $sanpham->hangsanxuat_id)
                    selected="true" 
                   @endif>{{ $hangsanxuat->tenhang }}</option>
                   @endforeach
                 </select>
                 <span class="help-block form-error">{{ $errors->first('hangsanxuat_id') }}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Thể loại</label>
              <div class="controls">
                <select name="theloai_id">
                  <option value="df">Vui lòng chọn thể loại</option>
                  @foreach ($all_theloai as $theloai)
                   <option value="{{ $theloai->id }}" @if ($theloai->id == $sanpham->theloai_id)
                    selected="true"
                   @endif>{{ $theloai->tentheloai }}</option>
                   @endforeach
                </select>
                <span class="help-block form-error">{{ $errors->first('theloai_id') }}</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Giá sản phẩm:</label>
              <div class="controls">
                <input type="text" name="giasanpham" class="span11" id="price_number" value="{{ $sanpham->giasanpham }}" data-validation="length" data-validation-length="min1" data-validation-error-msg-length="Vui lòng nhập giá sản phẩm">
                <span class="help-block form-error">{{ $errors->first('giasanpham') }}</span>
              </div>
            </div>
        
            <div class="control-group">
              <label class="control-label">Số lượng sản phẩm:</label>
              <div class="controls">
                {{-- <input type="number" min="0" name="soluongsanpham" value="{{ $sanpham->soluongsanpham }}" class="span11" required/> --}}
                <span style="color: blue;line-height: 30px;">{{ number_format($sanpham->soluongsanpham) }} sản phẩm trong kho</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Số lượng tối đa:</label>
              <div class="controls">
                {{-- <input type="number" min="0" name="soluongtoida" value="{{ $sanpham->soluongtoida }}" class="span11" required/> --}}
                <span style="color: blue;line-height: 30px;">{{ number_format($sanpham->soluongtoida) }} sản phẩm trong kho</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Sản phẩm liên quan</label>
              <div class="controls">
                <input class="select2_sanpham" name="sanpham_lienquan" value="{{ $sanpham->sanphamlienquan }}" data-href="{{ route('getListSanPhamAjax') }}" multiple>
                <span class="help-block form-error">{{ $errors->first('sanpham_lienquan') }}</span>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label">Ảnh đại diện</label>
              <div class="controls">
                <input type="file" name="anhsanpham" accept="image/*" onchange="readURL(this);" data-validation="mime" 
     data-validation-allowing="jpg, png, gif" data-validation-error-msg-mime="Vui lòng chọn hình ảnh (jpg, png, gif)"/>
             <span class="help-block form-error">{{ $errors->first('anhsanpham') }}</span>
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
                <a> <img src="{{ asset('uploads/anhsanpham/'. $sanpham->anhsanpham) }}"> </a>

                  <div class="actions"> <a class="lightbox_trigger" href="{{ asset('uploads/anhsanpham/'. $sanpham->anhsanpham) }}"><i class="icon-search"></i></a> 
                  </div>
                </li>
              </ul>
            </div>
            <div class="control-group">
              <label class="control-label">Sản phẩm đặc biệt: </label>
              <div class="controls">
                <label>
                  <input type="radio" name="sanphamdacbiet" value="0" 
                  @php
                    if($sanpham->sanphamdacbiet == 0) 
                      echo 'checked="true"';
                  @endphp />
                  Không</label>
                <label>
                  <input type="radio" name="sanphamdacbiet" value="1" 
                  @php
                    if($sanpham->sanphamdacbiet == 1) 
                      echo 'checked="true"';
                  @endphp/>
                  Có</label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Trạng thái: </label>
              <div class="controls">
                <label>
                  <input type="radio" name="trangthai" value="1" 
                  @php
                    if($sanpham->trangthai == 1) 
                      echo 'checked="true"';
                  @endphp />
                  Hiển thị</label>
                <label>
                  <input type="radio" name="trangthai" value="2" 
                  @php
                    if($sanpham->trangthai == 2) 
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
            <h5>Hình ảnh sản phẩm</h5>
          </div>
        <div class="widget-content nopadding">
          <div class="control-group">
            <label class="control-label">Chọn để thêm hình ảnh: </label>
            <div class="controls">
              <input type="file" name="danhsachhinhanh[]" multiple="true" accept="image/*" onchange="readURL(this, 'list_up_images');" data-validation="mime" 
     data-validation-allowing="jpg, png, gif" data-validation-error-msg-mime="Vui lòng chọn hình ảnh (jpg, png, gif)"/> 
          <span class="help-block form-error">{{ $errors->first('danhsachhinhanh') }}</span>
            </div>
            <ul class="thumbnails" style="margin-left: 0 !important">
            @foreach ($all_hinhsanpham as $hinhanh)
              <li class="span2"> <a> <img src="{{ asset('uploads/hinhanhsanpham/'. $hinhanh->lienket) }}"> </a>
                <div class="actions"> 
                <a title="Xóa ảnh này" href="javascript:;" onclick="return xacnhan_redirect('{{ route('getXoaHinhAnh', $hinhanh->id) }}');"><i class="icon-pencil"></i></a>
                <a class="lightbox_trigger" title="Xem ảnh lớn hơn" href="{{ asset('uploads/hinhanhsanpham/'. $hinhanh->lienket) }}"><i class="icon-search"></i></a> 
                </div>
              </li>
            @endforeach
            </ul>
          </div>
          <div class="control-group">
            <label class="control-label list_up_images"></label>
            <div class="controls">
              <div id ="list_up_images"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Giới thiệu ngắn</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="form-control">
                <span class="help-block form-error">{{ $errors->first('gioithieungan') }}</span> <br>
                <textarea class="span12" name="gioithieungan" rows="6" placeholder="Giới thiệu ngắn cho sản phẩm" data-validation="length" data-validation-length="min3" data-validation-error-msg-length="Vui lòng nhập giới thiệu ngắn cho sản phẩm từ 3 ký tự">{{ $sanpham->gioithieungan }}</textarea>
              </div>
          </div>
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Giới thiệu chi tiết</h5>
        </div>
        <div class="widget-content">
          <div class="control-group">
              <div class="form-control">
                <span class="help-block form-error">{{ $errors->first('gioithieusanpham') }}</span> <br>
                <textarea class="textarea_editor span12" name="gioithieusanpham" rows="6" placeholder="Giới thiệu chi tiết sản phẩm">{!! $sanpham->gioithieusanpham !!}</textarea>
              </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success">Lưu lại</button>
      <a href="{{ route('listSanPham') }}" class="btn btn-danger">Quay lại</a>
   </center>
  </div>
</form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/masked.js') }}"></script> 
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/select-sanpham.js') }}"></script>  
<script src="{{ asset('js/admin/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/admin/editor.js') }}"></script> 
<script>
  $('select').select2();
</script>

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
</script>
<script type="text/javascript">
  $('#price_number').number( true, 0 );

  $('#price_number_giamgia').number( true, 0 );

  $.validate({
     lang: 'vi',
     errorMessagePosition : 'top',
     modules : 'file',
     scrollToTopOnError : false
  });
</script>
@endsection