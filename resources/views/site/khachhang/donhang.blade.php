@extends('layouts.site')
@section('title', 'Tài khoản của bạn')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getTaiKhoan') }}">Tài khoản</a><span>&mdash;›</span></li>
        <li class="category13"><strong>Đơn hàng</strong></li>
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
              <div class="title-buttons"><strong>Danh sách đơn hàng đã đặt</strong> <a href="#">&nbsp;</a> </div>
              <div class="table-responsive">
                <table class="data-table" id="my-orders-table">
                  <thead>
                    <tr class="first last">
                      <th>#Mã số</th>
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
                <br>
                <div class="pager">
                  <div class="pages">
                  {{ $donhang_khachhang->links('partials.phantrang') }}
                  </div>
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