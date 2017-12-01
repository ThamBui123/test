@extends('layouts.admin')
@section('title', 'Danh sách bình luận')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listBinhLuan') }}" class="tip-bottom">Bình luận</a></div>
  <h1>Danh sách bình luận</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
    <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listBinhLuan') }}" method="get">
              <div class="input-append">
               <input type="text" name="tenkhachhang" class="span5 tip-bottom" title="Tìm theo tên khách hàng" placeholder="Tìm theo tên khách hàng" value="{{ request()->get('tenkhachhang') }}">
               <input type="text" name="tensanpham" class="span5 tip-bottom" placeholder="Tìm theo tên sản phẩm" title="Tìm theo tên sản phẩm" value="{{ request()->get('tensanpham') }}">
               <select name="daxem" class="span3 tip-bottom" title="Đã xem hay không">
                 <option value="all">Tất cả</option>
                 <option value="1" {{ request()->get('daxem') == 1 ? 'selected' : '' }}>Đã xem</option>
                 <option value="0" {{ request()->get('daxem') == 0 ? 'selected' : '' }}>Chưa xem</option>
               </select>
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (request()->has('tensanpham') || request()->has('tenkhachhang') || request()->has('daxem'))
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listBinhLuan') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
                @endif
              </div>
            </div>
          </form>
          </div>
        </div>
        <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả thể loại {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacBinhLuan') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a> </span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Khách hàng</th>
                  <th>Sản phẩm</th>
                  <th>Nội dung ngắn</th>
                  <th>Ngày gửi</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_binhluan as $binhluan)
                @php
                  $style_row = '';
                  switch ($binhluan->daxem) {
                    case '0':
                      $style_row = 'rgba(255, 0, 0, 0.12)';
                      break;
                    default:
                      $style_row = 'f9f9f9';
                    break;
                  }  
                @endphp
                <tr class="gradeX" style="background-color: {{ $style_row }}">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $binhluan->id . '_' . 'binhluan'}}" /></td>
                  <td>{{ $binhluan->hovaten }}</td>
                  <td>{{ $binhluan->tensanpham }}</td>
                  <td>{{ str_limit($binhluan->noidung, 30) }}</td>
                  <td>{{ dinh_dang_ngay_gio($binhluan->created_at) }}</td>
                  <td>@php
                    echo (($binhluan->daxem == 0) ? "Chưa xem" : "Đã xem");
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getXemBinhLuan', $binhluan->id) }}" class="btn btn-mini btn-info">Xem</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $binhluan->id . '_' . 'binhluan'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_binhluan->appends(request()->except('page'))->links('partials.admin_phantrang') }}
        </center>
        </form>
      </div>
  </div>
</div>
</div>
@endsection