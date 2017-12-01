@extends('layouts.site')
@section('title', 'Tài khoản của bạn')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getTaiKhoan') }}">Tài khoản</a><span>&mdash;›</span></li>
        <li class="category13"><strong>Trang chính</strong></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow bounceInUp animated">
        <div class="my-account">
          <div class="dashboard">
            <div class="recent-orders">
              <div class="title-buttons"><strong>Danh sách 10 đơn hàng gần đây nhất</strong> <a href="{{ route('getDonHang') }}" style="color: #fdd922;font-weight: bold;">Xem tất cả </a> </div>
              <div class="table-responsive">
                <table class="data-table" id="my-orders-table">
                  <thead>
                    <tr class="first last">
                      <th>#Mã số</th>
                      <th>Ngày đặt</th>
                      <th>Ngày nhận</th>
                      <th>Trạng thái</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($donhang_khachhang as $donhang)
                    <tr>
                      <td>#{{ $donhang->madonhang }}</td>
                      <td>{{ dinh_dang_ngay_gio($donhang->ngaydat) }}</td>
                      <td>{{ dinh_dang_ngay_gio($donhang->ngaynhan) }}</td>
                      <td><em>
                      @php
                      switch ($donhang->tinhtrangdonhang) {
                        case '1':
                          echo "Đã xác nhận";
                          break;
                        case '2':
                          if(!check_donhang_hoanthanh($donhang->id))
                          echo "<b style='color: red;'>Chưa giao đủ</b>";
                        else
                          echo "<b style='color: #fdd922;'>Đã hoàn thành</b>";
                          break;  
                        default:
                          echo "<b style='color: red;'>Đang chờ duyệt</b>";
                          break;
                      }
                      @endphp
                  </em></td>
                      <td class="a-center last"><span class="nobr"> <a href="{{ route('getChiTietDonHangKH', $donhang->madonhang) }}">Chi tiết</a></span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="box-account" style="margin-top: 10px;">
              <div class="page-title">
                <h2>Thông tin chi tiết <a href="{{ route('getThongTin') }}" style="color: #fdd922;font-weight: bold;">Chỉnh sửa </a></h2>
              </div>
              <div class="col2-set">
                <div class="col-1">
                  <h5>Thông tin cá nhân</h5>
                  <p> 
                  Họ và tên: &nbsp;{{ Auth::user()->hovaten }}<br>
                  Giới tính: &nbsp;{{ (Auth::user()->gioitinh == 1 ? 'Nam' : 'Nữ') }}<br> 
                  Ngày sinh: &nbsp;{{ dinh_dang_ngay(Auth::user()->ngaysinh) }}<br>
                  </p>
                </div>
                <div class="col-2">
                  <h5>Thông tin liên hệ</h5>
                  <p>
                  Số điện thoại: &nbsp;{{ Auth::user()->sodienthoaikh }}<br>
                  Địa chỉ: &nbsp;{{ Auth::user()->diachi }}<br>
                  Email: &nbsp;{{ Auth::user()->email }}<br>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @include('site.blocks.khachhang.rightbar')
    </div>
  </div>
</div>
@endsection