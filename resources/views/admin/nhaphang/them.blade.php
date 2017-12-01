@extends('layouts.admin')
@section('title', 'Nhập hàng cho sản phẩm')
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
  @if (count($errors) > 0)
  <div class="my-alert">
    <div class="alert alert-danger">
      <button class="close" data-dismiss="alert">×</button>
      @foreach ($errors->all() as $error)
      {{ $error }} <br>
      @endforeach
    </div>
  </div>
  @endif
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
            <label class="control-label">Nhân viên nhập hàng:</label>
            <div class="controls">
              {{ Auth::guard('nhanvien')->user()->hovaten }} - {{ Auth::guard('nhanvien')->user()->email }}

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
                      <input type="text" name="doigiaban[]" class="span2 txt_number_doigiaban" placeholder="Nhập để đổi giá bán" title="Nhập để đổi giá bán" value="{{ $doigiaban[$i] }}" />
                      @else
                      <input type="text" name="doigiaban[]" class="span2 txt_number_doigiaban" placeholder="Nhập để đổi giá bán" title="Nhập để đổi giá bán" />
                      @endif
                      <button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button>
                    </div>
                </div>
            @endfor
          @endif
          @if (!empty($nhaphang_sanpham))
            @foreach($nhaphang_sanpham as $sanpham)
            <div class="control-group"> 
                <label class="control-label">{{ $sanpham['tensanpham'] }}</label>
                <div class="controls controls-row">
                  <input type="hidden" name="sanpham_id[]" class="sanpham_id" value="{{ $sanpham['id'] }}">
                  <input type="hidden" name="tensanpham[]" class="tensanpham" value="{{ $sanpham['tensanpham'] }}">
                  <input type="text" name="soluongnhap[]" class="span2 txt_number" placeholder="Số lượng nhập" data-validation="required" title="Số lượng nhập" value="">
                  <input type="text" name="gianhap[]" class="span3 price_number" data-validation="required" placeholder="Đơn giá nhập" title="Đơn giá nhập" value="">
                  <input type="text" name="ghichuchitiet[]" class="span3" placeholder="Ghi chú sản phẩm nhập" title="Ghi chú sản phẩm nhập" value="">
                  <input type="text" name="doigiaban[]" class="span2 txt_number_doigiaban" placeholder="Nhập để đổi giá bán" title="Nhập để đổi giá bán" />
                  <button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button>
                </div>
            </div>
            @endforeach
          @endif
          </div>

          <div class="control-group">
            <label class="control-label">Ghi chú nhập hàng:</label>
            <div class="controls">
              <textarea name="ghichunhaphang" placeholder="Ghi chú nhập hàng nếu cần" class="span11">{{ old('ghichunhaphang') }}</textarea>
            </div>
          </div>
          
          <div class="control-group">
          <label class="control-label">Tìm kiếm nhanh sản phẩm:</label>
           <div class="controls">
              <input class="select2_sanpham chon_sanpham" name="sanpham_nhaphang" value="{{ old('sanpham_nhaphang') }}" data-href="{{ route('getListSanPhamAjax') }}" multiple>
           </div>
          </div>

          <div class="control-group">
          <label class="control-label">Tìm theo hãng sản xuất:</label>
           <div class="controls">
              <select class="sanpham_hsx" required>
              <option value="0">---Chọn hãng sản xuất--</option>
               @foreach ($all_hangsanxuat as $hangsanxuat)
              <option value="{{ $hangsanxuat->id }}">{{ $hangsanxuat->tenhang }}
              </option>
               @endforeach
             </select>
           </div>
          </div>

          <div id="append_sanpham_hsx">
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
<script src="{{ asset('js/admin/select-sanpham.js') }}"></script> 
<script>
  $('select').select2();
  $(document).on('click', '.xoadongmoi', function(event) {
    var target = $(event.target),
        row = target.closest('.control-group');
      row.remove();
  });

  $(".chon_sanpham").change(function() {
      var giatri_chon = $(this).select2("data");
      new_giatri_chon = $(this).select2("data")[giatri_chon.length-1];
      if(giatri_chon == '---Chọn---')
        return;

      var tensanpham = new_giatri_chon.text;
      var sanpham_id = new_giatri_chon.id;
      var check = true;
      $.each($('.sanpham_id'),function(){
        if($(this).val() == sanpham_id)
          check = false;
      });

      if(check ==  true)
      {
        $('#append_sanpham').append('<div class="control-group"> <label class="control-label">'+tensanpham+':</label><div class="controls controls-row"> <input type="hidden" name="sanpham_id[]" class="sanpham_id" value="'+sanpham_id+'"/> <input type="hidden" name="tensanpham[]" class="tensanpham" value="'+tensanpham+'"/> <input type="text" name="soluongnhap[]"  class="span2 txt_number" placeholder="Số lượng nhập" title="Số lượng nhập" data-validation="required"/> <input type="text" name="gianhap[]" class="span3 price_number" placeholder="Đơn giá nhập" title="Đơn giá nhập" data-validation="required"/> <input type="text" name="ghichuchitiet[]" class="span3" placeholder="Ghi chú sản phẩm nhập" title="Ghi chú sản phẩm nhập" /> <input type="text" name="doigiaban[]" class="span2 txt_number_doigiaban" placeholder="Nhập để đổi giá bán" title="Nhập để đổi giá bán" /><button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button></div></div>');
          $('.price_number').number( true, 0 );
          $('.txt_number').number( true, 0 );
          $('.txt_number_doigiaban').number( true, 0 );
          $('.txt_number').focus();
          $('#checkbox_doigiaban_'+sanpham_id).uniform();
      }
      else
      {
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