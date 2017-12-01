@extends('layouts.admin')
@section('title', 'Danh sách nhập hàng')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhapHang') }}" class="tip-bottom">Nhập hàng</a>
  </div>
  <h1>Danh sách nhập hàng</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả các phiếu nhập hàng {!! admin_link_sapxep() !!}</h5>
          {{-- <span class="mytool"><a href="{{ route('listThungRacNhapHang') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a> </span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span> --}}
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemNhapHang') }}"><i class="icon-plus-sign"></i> Nhập hàng</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                 <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Tên nhân viên nhập hàng</th>
                  <th>Ngày nhập</th>
                
                  <th>Số lượng nhập</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_nhaphang as $nhaphang)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $nhaphang->id . '_' . 'nhaphang'}}" /></td>
                  <td>{{ $nhaphang->nhanvien->hovaten }}</td>
                  <td>{{ dinh_dang_ngay_gio($nhaphang->ngaynhaphang) }}</td>
                  <td>{{ number_format($nhaphang->soluongnhap()) }}</td>
                  <td class="center">
                    <a href="{{ route('getChiTietNhapHang', $nhaphang->id) }}" class="btn btn-mini btn-info">Xem</a>
                    {{-- <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $nhaphang->id . '_' . 'nhaphang'}}">Xóa</button> --}}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_nhaphang->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
      </div>
    </form>
  </div>
</div>
</div>
@endsection