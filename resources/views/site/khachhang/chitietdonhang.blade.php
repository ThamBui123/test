@extends('layouts.site')
@section('style')
<style type="text/css">
  .data-table tfoot tr {
  background-color: #fff !important;
}
.data-table tfoot td{
  border: none !important;
}
</style>
@endsection
@section('title', 'Chi tiết đơn hàng của bạn')
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <ul>
        <li class="home"> <a href="{{ route('home') }}" title="Về trang chủ">Trang chủ</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getTaiKhoan') }}">Tài khoản</a><span>&mdash;›</span></li>
        <li><a href="{{ route('getDonHang') }}">Đơn hàng</a><span>&mdash;›</span></li>
        <li class="category13"><strong>Chi tiết đơn hàng</strong></li>
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
              <div class="title-buttons">
                <strong>Chi tiết đơn hàng #{{ $donhang->madonhang }} | @php
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
                </strong> 
                <a href="{{ route('getDonHang') }}" style="color: #fdd922; font-weight: bold;">Quay lại </a>
              </div>
              <div class="table-responsive">
                <table class="data-table">
                  <thead>
                    <tr>
                      <th>Mã sản phẩm</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá bán</th>
                      <th>Số lượng mua</th>
                      <th>Đã giao</th>
                      <th style="text-align: right;">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $tiendonhang = 0;
                    @endphp
                    @foreach ($donhang->chitietdonhang as $chitietdonhang)
                    <tr>
                      <td>{{ $chitietdonhang->sanpham->masanpham }}</td>
                      <td>
                        <a href="{{ route('getChiTietSanPham', $chitietdonhang->sanpham->slugsp) }}">{{ $chitietdonhang->sanpham->tensanpham }}
                        </a>
                      </td>
                      <td>{{ number_format($chitietdonhang->giaban) }}</td>
                      @php
                        $thanhtien = $chitietdonhang->soluong * $chitietdonhang->giaban;
                        $tiendonhang += $thanhtien;
                      @endphp
                      <td>{{  number_format($chitietdonhang->soluong) }}</td>
                      <td>{{ number_format($chitietdonhang->dagiao) }}</td>
                      <td align="right">{{ number_format($thanhtien) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  @php
                  $option = json_decode($donhang->options);
                  $tienphaitra =  $tiendonhang * (1 - ($option->phantramgiamgia/100));
                  $sotiengiamgia = $tiendonhang - $tienphaitra;
                  $tongtien = $tienphaitra  + $option->phivanchuyen;
                  @endphp
                  <tfoot>
                  <tr>
                    <td colspan="6">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left">Tiền đơn hàng</td>
                    <td align="right"><b>{{ number_format($tiendonhang) }}</b></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left">Phí vận chuyển</td>
                    <td align="right"><b>{{ number_format($option->phivanchuyen) }}</b></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left">Tiền giảm giá</td>
                    <td align="right"><b>{{ number_format($sotiengiamgia) }}</b></td>
                  </tr>
                  <tr>
                    <td colspan="5" align="left">Tổng tiền phải trả</td>
                    <td align="right"><b>{{ number_format($tongtien) }}</b></td>
                  </tr>
                  </tfoot>
                </table>
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