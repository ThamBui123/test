@extends('layouts.admin')
@section('title', 'Danh sách hãng sản xuất')
@section('style')
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listHangSanXuat') }}" class="tip-bottom">Hãng sản xuất</a></div>
  <h1>Danh sách hãng sản xuất</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
        <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listHangSanXuat') }}" method="get">
              <div class="input-append">
               <input type="text" name="tenhang" class="span12 tip-bottom" title="Tìm theo tên hãng sản xuất" placeholder="Tìm theo tên hãng sản xuất" value="{{ Request::get('tenhang') }}">
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listHangSanXuat') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
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
          <h5>Tất cả hãng sản xuất {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacHangSanXuat') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemHangSanXuat') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Logo</th>
                  <th>Tên hãng</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_hangsanxuat as $hangsanxuat)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $hangsanxuat->id . '_' . 'hangsanxuat'}}" /></td>
                  <td>
                    <img src="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}" width="30">
                      <span> &nbsp; <a class="lightbox_trigger" href="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}"><i class="icon-search"></i></a> 
                      </span>
                  </td>
                  <td>{{ $hangsanxuat->tenhang }}</td>
                  <td>@php
                    echo (($hangsanxuat->trangthai == 2) ? 'Nháp' : 'Hiển thị');
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getSuaHangSanXuat', $hangsanxuat->id) }}" class="btn btn-mini btn-info">Sửa</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $hangsanxuat->id . '_' . 'hangsanxuat'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </form>
      </div>
  </div>
</div>
</div>
@endsection