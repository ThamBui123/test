@extends('layouts.admin')
@section('title', 'Danh sách khách hàng')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listKhachHang') }}" class="tip-bottom">Khách hàng</a></div>
  <h1>Danh sách khách hàng</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
        <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listKhachHang') }}" method="get">
              <div class="input-append">
               <input type="text" name="hovaten" class="span4 tip-bottom" placeholder="Tìm theo tên khách hàng" value="{{ Request::get('hovaten') }}" title="Tìm theo tên khách hàng">
               <input type="text" name="email" class="span3 tip-bottom" placeholder="Tìm theo email khách hàng" value="{{ Request::get('email') }}" title="Tìm theo email khách hàng">
               <input type="text" name="sodienthoaikh" class="span2 tip-bottom" placeholder="Tìm theo số điện thoại" value="{{ Request::get('sodienthoaikh') }}" title="Tìm theo số điện thoại">
               <select class="span2 tip-bottom" title="Tìm theo loại khách hàng" name="loaikh">
                 <option value="1" {{ Request::get('loaikh') == 1 ? 'selected' : '' }}>Đã đăng ký</option>
                 <option value="0"  {{ Request::get('loaikh') == 0 ? 'selected' : '' }}>Chưa đăng ký</option>
                 <option value="2"  {{ Request::get('loaikh') == 2 ? 'selected' : '' }}>Facebook</option>
               </select>
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listKhachHang') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
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
              <div class="span4">
                <div class="control-group">
                  <label class="control-label">Địa chỉ</label>
                  <div class="controls">
                    <input type="text" name="diachi" class="span12 tip-bottom" value="{{ Request::get('diachi') ? Request::get('diachi') : '' }}" title="Tìm theo địa chỉ">
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
                    <label class="radio inline">
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
          <h5>Tất cả khách hàng {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacKhachHang') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Đã khóa ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Khóa tài khoản</button></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
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
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_khachhang as $khachhang)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $khachhang->id . '_' . 'khachhang'}}" /></td>
                  <td>{{ $khachhang->hovaten }}</td>
                  <td>{{ $khachhang->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                  <td>{{ dinh_dang_ngay($khachhang->ngaysinh) }}</td>
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
                  <td class="center">
                    <a href="{{ route('getLichSuMuaHang', $khachhang->id) }}" class="btn btn-mini btn-info" target="_blank">Lịch sử mua hàng</a>
                    @if($khachhang->loaikh != 0)
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $khachhang->id . '_' . 'khachhang'}}">Khóa</button>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_khachhang->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
        </form>
      </div>
  </div>
</div>
</div>
@endsection