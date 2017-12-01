@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listDonHang') }}" class="tip-bottom">Đơn hàng</a>
  </div>
  <h1>Danh sách đơn hàng</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
      <div class="myfitter clearfix">
        <div class="input_search">
          <form class="form-inline">
            <div class="input-append">
             <input type="text" name="tenkhachhang" class="span5 tip-bottom" title="Tìm theo tên khách hàng" placeholder="Tìm theo tên khách hàng" value="{{ Request::get('tenkhachhang') }}">
             <input type="text" name="madonhang" class="span5 tip-bottom" title="Tìm mã số đơn" placeholder="Tìm mã số đơn" value="{{ Request::get('madonhang') }}">
             <div class="btn-group">
              <button type="submit" class="btn btn-info">Tìm kiếm</button>
              @if (Request::all())
              <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listDonHang') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
              @endif
              <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#adv_search">Nâng cao
              </button>
            </div>
          </div>
            @php
              $collapse_in = '';
              if(Request::all())
              {
                $collapse_in = 'in';
              }
            @endphp
           <div id="adv_search" class="collapse {{ $collapse_in }}">
            <div class="row-fluid">
              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Tình trạng đơn hàng</label>
                  <div class="controls">
                    <select name="tinhtrangdonhang" class="span12">
                      <option value="all" selected>Tất cả</option>
                      <option value="0" {{ Request::get('tinhtrangdonhang') == 0 ? 'selected' : '' }}>Chưa xem</option>
                      <option value="1" {{ Request::get('tinhtrangdonhang') == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                      <option value="2" {{ Request::get('tinhtrangdonhang') == 2 ? 'selected' : '' }}>Hoàn thành</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="span9">
                <div class="control-group">
                  <label class="control-label">Ngày đặt hàng</label>
                  <div class="controls">
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="1" checked>
                      Theo ngày
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="2" {{ Request::get('typeof') == 2 ? 'checked' : '' }}>
                      Theo Tháng
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="3" {{ Request::get('typeof') == 3 ? 'checked' : '' }}>
                      Theo Năm
                    </label>
                    <label class="radio inline">
                      <input type="text" name="data" class="mask-date tip-bottom" value="{{ Request::get('data') ? Request::get('data') : date('d-m-Y') }}" data-title="Ngày tháng năm" style="width: 100px;">
                    </label>
                    <label class="radio inline">
                      <button type="submit" class="btn btn-mini btn-info my-btn"><i class="icon-plus-sign"></i> Lọc đơn hàng</button>
                    </label>
                    @if(Request::has('typeof'))
                    <label class="radio inline">
                      <button type="button" class="btn btn-mini btn-danger" onclick="window.location='{{ route('listDonHang') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
                    </label>
                    @endif
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </form>
      </div>
      </div>
      <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả đơn hàng {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacDonHang') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a> </span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          {{-- <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getXuatKho') }}"><i class="icon-remove-sign"></i> Xuất kho</a></span> --}}
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                 <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Mã đơn hàng</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Ngày đặt</th>
                  <th>Tình trạng</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_donhang as $donhang)
                @php
                  $style_row = '';
                  switch ($donhang->tinhtrangdonhang) {
                    case '1':
                      $style_row = 'rgba(0, 0, 255, 0.12)';
                      break;
                    case '2':
                      if(!check_donhang_hoanthanh($donhang->id))
                        $style_row = 'rgba(255, 0, 0, 0.16)';
                      else
                        $style_row = '#f9f9f9';
                      break;
                    default:
                      $style_row = 'rgba(255, 0, 0, 0.12)';
                    break;
                  }  
                @endphp
                <tr class="gradeX" style="background-color: {{ $style_row }}" >
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $donhang->id . '_' . 'donhang'}}" /></td>
                  <td>{{ $donhang->madonhang }}</td>
                  <td>{{ $donhang->hovaten }}</td>
                  <td>{{ $donhang->sodienthoaikh }}</td>
                  <td>{{ $donhang->diachi }}</td>
                  <td>{{ dinh_dang_ngay_gio($donhang->ngaydat) }}</td>
                  <td>@php
                    switch ($donhang->tinhtrangdonhang) {
                      case '1':
                        echo "Đã xác nhận";
                        break;
                      case '2':
                        if(!check_donhang_hoanthanh($donhang->id))
                          echo "Chưa giao đủ";
                        else
                          echo "Hoàn thành";
                        break; 
                      default:
                        echo "Chưa xem";
                        break;
                    }
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getChiTietDonHang', $donhang->id) }}" class="btn btn-mini btn-info">Xem</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $donhang->id . '_' . 'donhang'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>{{ $all_donhang->appends(Request::except('page'))->links('partials.admin_phantrang') }}
            </center>
      </div>
    </form>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/masked.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script type="text/javascript">
  $(".mask-date").mask("99-99-9999");
  $('.mask-date').datepicker({
    language: 'vi'
  });
</script>
@endsection