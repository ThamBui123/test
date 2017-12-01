@extends('layouts.admin')
@section('title', 'Danh sách khách hàng | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listKhachHang') }}" class="tip-bottom">Khách hàng</a></div>
  <h1>Danh sách khách hàng bị khóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả khách hàng {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listKhachHang') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox"/></th>
                  <th>Họ và tên</th>
                  <th>Giới tính</th>
                  <th>Ngày sinh</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Loại khách hàng</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_khachhang as $khachhang)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $khachhang->id . '_' . 'khachhang'}}" /></td>
                  <td>{{ $khachhang->hovaten }}</td>
                  <td>{{ $khachhang->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                  <td>{{ $khachhang->ngaysinh }}</td>
                  <td>{{ $khachhang->sodienthoaikh }}</td>
                  <td>{{ $khachhang->diachi }}</td>
                  <td>{{ $khachhang->email }}</td>
                  <td>
                  @php
                  switch ($khachhang->loaikh) {
                      case '0':
                        echo "Chưa đăng ký";
                        break;
                      case '2':
                        echo "Facebook";
                        break;
                      default:
                        echo "Đã đăng ký";
                        break;
                    }  
                  @endphp
                  </td>
                  <td>@php
                    echo (($khachhang->trangthai == 0) ? 'Khóa' : 'Kích hoạt');
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getLichSuMuaHang', $khachhang->id) }}" class="btn btn-mini btn-info" target="_blank">Lịch sử mua hàng</a>
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $khachhang->id . '_' . 'khachhang'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $khachhang->id . '_' . 'khachhang'}}">Xóa</button>
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