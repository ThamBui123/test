@extends('layouts.admin')
@section('title', 'Danh sách nhân viên')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhanVien') }}" class="tip-bottom">Nhân viên</a></div>
  <h1>Danh sách nhân viên</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
        <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listNhanVien') }}" method="get">
              <div class="input-append">
               <input type="text" name="masonhanvien" class="span3 tip-bottom" data-title="Tìm theo mã số nhân viên" placeholder="Tìm theo mã số nhân viên" value="{{ Request::get('masonhanvien') }}">
               <input type="text" name="hovaten" class="span4 tip-bottom" data-title="Tìm theo tên nhân viên" placeholder="Tìm theo tên nhân viên" value="{{ Request::get('hovaten') }}">
               <input type="text" name="email" class="span5 tip-bottom" data-title="Tìm theo email nhân viên" placeholder="Tìm theo email nhân viên" value="{{ Request::get('email') }}">
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listNhanVien') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
                @endif
                <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#adv_search">Nâng cao
              </button>
              </div>
            </div>
          {{-- </form>
          <form class="form-inline"> --}}
            @php
              $collapse_in = '';
              if (Request::all())
              {
                $collapse_in = 'in';
              }
            @endphp
           <div id="adv_search" class="collapse {{ $collapse_in }}">
            <div class="row-fluid">
              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Số điện thoại</label>
                  <div class="controls">
                    <input type="text" name="sodienthoainv" class="span12" value="{{ Request::get('sodienthoainv') ? Request::get('sodienthoainv') : '' }}">
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Địa chỉ</label>
                  <div class="controls">
                    <input type="text" name="diachi" class="span12" value="{{ Request::get('diachi') ? Request::get('diachi') : '' }}">
                  </div>
                </div>
              </div>
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Giới tính</label>
                  <div class="controls">
                    <label class="radio inline">
                      <input type="radio" name="gioitinh" value="all" checked>
                      Tất cả
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="gioitinh" value="1" {{ Request::get('gioitinh') == 1 ? 'checked' : '' }}>
                      Nữ
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="gioitinh" value="2" {{ Request::get('gioitinh') == 2 ? 'checked' : '' }}>
                      Nam
                    </label>
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
          <h5>Tất cả nhân viên {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacNhanVien') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Đã khóa ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Khóa tài khoản</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemNhanVien') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
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
                  <th>Nhóm quyền</th>
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
                  <td>{{ $nhanvien->nhomquyen->tennhomquyen }}</td>
                  <td class="center">
                    @if($nhanvien->nhomquyen->key !== 'ADMIN')
                    <a href="{{ route('getSuaNhanVien', $nhanvien->id) }}" class="btn btn-mini btn-info">Sửa</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $nhanvien->id . '_' . 'nhanvien'}}">Khóa</button>
                    @else
                    <button type="button"class="btn btn-mini btn-info">
                    Administrator</button>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_nhanvien->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
        </form>
      </div>
  </div>
</div>
</div>
@endsection