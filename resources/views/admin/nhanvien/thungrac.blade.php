@extends('layouts.admin')
@section('title', 'Danh sách nhân viên | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhanVien') }}" class="tip-bottom">Nhân viên</a></div>
  <h1>Danh sách nhân viên bị khóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả nhân viên {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listNhanVien') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox"/></th>
                  <th>Mã số</th>
                  <th>Họ và tên</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_nhanvien as $nhanvien)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $nhanvien->id . '_' . 'nhanvien'}}" /></td>
                  <td>{{ $nhanvien->manhanvien }}</td>
                  <td>{{ $nhanvien->hovaten }}</td>
                  <td>{{ $nhanvien->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                  <td>{{ dinh_dang_ngay($nhanvien->ngaysinh) }}</td>
                  <td>{{ $nhanvien->sodienthoainv }}</td>
                  <td>{{ $nhanvien->diachi }}</td>
                  <td>{{ $nhanvien->email }}</td>
                  <td>@php
                    echo (($nhanvien->trangthai == 0) ? 'Khóa' : 'Kích hoạt');
                  @endphp</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $nhanvien->id . '_' . 'nhanvien'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $nhanvien->id . '_' . 'nhanvien'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection