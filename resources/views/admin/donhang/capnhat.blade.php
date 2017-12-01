@extends('layouts.admin')
@section('title', 'Cập nhật đơn hàng')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPhuongThucVC') }}" class="tip-bottom">Nhập hàng</a> <a href="#" class="current">Thêm mới</a> </div>
  <h1>Nhập hàng mới cho sản phẩm</h1>
</div>
<div class="container-fluid">
 @include('partials.myform_error')
 @include('partials.alert-info')
 <form action="{{ route('postThemNhapHang') }}" method="post" class="form-horizontal">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Thông tin nhập hàng</h5>
        </div>
        <div class="widget-content nopadding">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="control-group">
            <label class="control-label">Chọn khách hàng:</label>
            <div class="controls">
              
            </div>
          </div>
          <div id="append_sanpham">
          @if (old('sanpham_id'))
            @for ($i = 0; $i < count(old('sanpham_id')); $i++)
                @php
                  $sanpham_id = old('sanpham_id');
                  $tensanpham = old('tensanpham');
                  $soluongnhap = old('soluongnhap');
                  $gianhap = old('gianhap');
                  $doigiaban = old('doigiaban');
                  $ghichuchitiet = old('ghichuchitiet');
                @endphp
                <div class="control-group"> 
                    <label class="control-label">{{ $tensanpham[$i] }}</label>
                    <div class="controls controls-row">
                      <input type="hidden" name="sanpham_id[]" class="sanpham_id" value="{{ $sanpham_id[$i] }}">
                      <input type="hidden" name="tensanpham[]" class="tensanpham" value="{{ $tensanpham[$i] }}">
                      <input type="text" name="soluongnhap[]" class="span2 txt_number" placeholder="Số lượng nhập" data-validation="required" title="Số lượng nhập" value="{{ $soluongnhap[$i] }}">
                      <input type="text" name="gianhap[]" class="span3 price_number" data-validation="required" placeholder="Đơn giá nhập" title="Đơn giá nhập" value="{{ $gianhap[$i] }}">
                      <input type="text" name="ghichuchitiet[]" class="span3" placeholder="Ghi chú sản phẩm nhập" title="Ghi chú sản phẩm nhập" value="{{ $ghichuchitiet[$i] }}">
                      @if (!empty($doigiaban[$i]))
                      <label class="span2"><input type="checkbox" name="doigiaban[]" id="checkbox_doigiaban_{{ $sanpham_id[$i] }}" checked/>Đổi giá bán</label>
                      @else
                      <label class="span2"><input type="checkbox" name="doigiaban[]" id="checkbox_doigiaban_{{ $sanpham_id[$i] }}"/>Đổi giá bán</label>
                      @endif
                      <button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button>
                    </div>
                </div>
            @endfor
          @endif
          </div>

{{--           <div class="control-group">
          <label class="control-label">Hãng sản xuất:</label>
           <div class="controls">
              <select class="sanpham_hsx" required>
              <option value="0">---Tất cả sản phẩm--</option>
               @foreach ($all_hangsanxuat as $hangsanxuat)
              <option value="{{ $hangsanxuat->id }}">{{ $hangsanxuat->tenhang }}
              </option>
               @endforeach
             </select>
           </div>
          </div> --}}

          <div class="control-group">
          <label class="control-label">Chọn sản phẩm:</label>
           <div class="controls" id="append_sanpham_hsx">
              <select class="sanpham_id" required>
              <option>---Chọn---</option>
               @foreach ($all_sanpham as $sanpham)
              <option value="{{ $sanpham->tensanpham . '_' . $sanpham->id }}">{{ $sanpham->tensanpham }}
              </option>
               @endforeach
              </select>
           </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <button type="submit" class="btn btn-success" id="save_nhaphang">Lưu lại</button>
      <a href="{{ route('listNhapHang') }}" class="btn btn-danger">Quay lại</a>
    </center>
  </div>
  </form>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script>
  $('select').select2();
  $(document).on('click', '.xoadongmoi', function(event) {
    var target = $(event.target),
        row = target.closest('.control-group');
      row.remove();
  });

  $(".sanpham_id").change(function() {
      var giatri_chon = $(this).select2("val");
      if(giatri_chon == '---Chọn---')
        return;
      var tensanpham = giatri_chon.split("_")[0];
      var sanpham_id = giatri_chon.split("_")[1];
      var check = true;
      $.each($('.sanpham_id'),function(){
        if($(this).val() == sanpham_id)
          check = false;
      });

      if(check ==  true)
      {
        $('#append_sanpham').append('<div class="control-group"> <label class="control-label">'+tensanpham+':</label><div class="controls controls-row"> <input type="hidden" name="sanpham_id[]" class="sanpham_id" value="'+sanpham_id+'"/> <input type="hidden" name="tensanpham[]" class="tensanpham" value="'+tensanpham+'"/> <input type="text" name="soluongnhap[]"  class="span2 txt_number" placeholder="Số lượng bán" title="Số lượng bán" data-validation="required"/> <input type="text" name="gianhap[]" class="span3 price_number" placeholder="Đơn giá bán" title="Đơn giá bán" data-validation="required"/> <input type="text" name="ghichuchitiet[]" class="span3" placeholder="Ghi chú sản phẩm bán" title="Ghi chú sản phẩm bán" /> <button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button></div></div>');
          $('.price_number').number( true, 0 );
          $('.txt_number').number( true, 0 );
          $('.txt_number').focus();
      }
      else
      {
        var append_sanpham = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Thông báo!</strong>Sản phẩm này đã có rồi</div>';
        $('#append_sanpham').append(append_sanpham);
        check = false;
      }

       
  });

  $.validate({
     lang: 'vi',
     scrollToTopOnError : false,
  });

  $('.price_number').number( true, 0 );
  $('.txt_number').number( true, 0 );

</script>
@endsection