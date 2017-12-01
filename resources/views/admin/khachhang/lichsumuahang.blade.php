@extends('layouts.admin')
@section('title')
Lịch sữ mua hàng của khách hàng | {{ $khachhang->hovaten }}
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listKhachHang') }}" class="tip-bottom">Khách hàng</a></div>
  <h1>Danh sách lịch sử mua hàng</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> 
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Lịch sử mua hàng của khách hàng #{{ $khachhang->hovaten }}</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Mã đơn hàng</th>
              <th>Ngày đặt</th>
              <th>Ngày nhận</th>
              <th>Trạng thái</th>
              <th>Công cụ</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($donhang_khachhang as $donhang)
            <tr>
              <td>#{{ $donhang->madonhang }}</td>
              <td>{{ $donhang->ngaydat }}</td>
              <td>{{ $donhang->ngaynhan }}</td>
              <td>
                @php
                    switch ($donhang->tinhtrangdonhang) {
                      case '1':
                        echo "<b style='color: #ec657d;'>Đã xác nhận</b>";
                        break;
                      case '2':
                        echo "<b style='color: blue;'>Hoàn thành</b>";
                        break; 
                      default:
                        echo "<b style='color: red;'>Chưa xem</b>";
                        break;
                    }
                  @endphp
              </td>
              <td class="center">
                <a href="{{ route('getChiTietDonHang', $donhang->id) }}" class="btn btn-mini btn-info" target="_bank">Chi tiết</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <center>{{ $donhang_khachhang->links('partials.admin_phantrang') }}</center>
      </div>
    </div>
  </div>
</div>
</div>
@endsection