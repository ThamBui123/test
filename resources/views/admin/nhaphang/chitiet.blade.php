@extends('layouts.admin')
@section('title', 'Chi tiết nhập hàng')
@section('content')
<div id="content">
	<div id="content-header">
	  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhapHang') }}" class="tip-bottom">Nhập hàng</a> <a href="#" class="current">Chi tiết nhập hàng hàng</a>
	</div>
  <div class="container-fluid">
  @include('partials.alert-info')
   <form action="{{ route('postCapNhatDonHang', $nhaphang->id) }}" method="post" class="form-horizontal">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row-fluid" style="margin-top: -20px">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 >Thông tin nhập hàng</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid" style="margin-top: 5px">
              <div class="span5">
                <table class="">
                  <tbody>
                    <tr>
                      <td><b>Nhân viên nhập hàng </b></td>
                    </tr>
                    <tr>
                      <td><h4>{{ $nhaphang->nhanvien->hovaten }}</h4></td>
                    </tr>
                    <tr>
                      <td><b>Địa chỉ: </b>{{ $nhaphang->nhanvien->diachi }}</td>
                    </tr>
                    <tr>
                      <td><b>Số điện thoại: </b>{{ $nhaphang->nhanvien->sodienthoainv }}</td>
                    </tr>
                    <tr>
                      <td><b>Email: </b>{{ $nhaphang->nhanvien->email }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="span7">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                      <td>Ngày nhập:</td>
                      <td><strong>{{ $nhaphang->ngaynhaphang }}</strong></td>
                    </tr>
                    <tr>
                      <td>Số lượng nhập:</td>
                      <td><strong>{{ number_format($nhaphang->soluongnhap()) }}</strong></td>
                    </tr>
                  <tr>
                  <td class="width30">Ghi chú:</td>
                    <td class="width70">
                    	{{ $nhaphang->ghichunhaphang }}
                    </td>
                  </tr>
                </tbody>
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">STT</th>
                      <th class="head1">Sản phẩm</th>
                      <th class="head0 right">Số lượng</th>
                      <th class="head1 right">Giá nhập</th>
                      <th class="head0 right">Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php 
                  $stt = 1; $tongtien = 0; 
                  $soluongnhap = 0;
                  @endphp
                  @foreach ($nhaphang->chitietnhaphang as $chitietnhaphang)
	               <tr>
                     <td>{{ $stt }}</td>
                     <td>{{ $chitietnhaphang->sanpham->tensanpham }}</td>
                     <td class="right">{{ number_format
                      ($chitietnhaphang->soluongnhap) }}</td>
                     <td class="right">
                     {{ number_format($chitietnhaphang->gianhap) }}</td>
                     <td class="right"><strong>{{ number_format($chitietnhaphang->gianhap*$chitietnhaphang->soluongnhap) }}</strong></td>
                  </tr>
                  @php 
                  $stt++; 
                  $tongtien+= $chitietnhaphang->gianhap*$chitietnhaphang->soluongnhap;
                  $soluongnhap += $chitietnhaphang->soluongnhap;
                  @endphp
                  @endforeach
                  </tbody>
                  <tfoot>
                    <td colspan="3">Tổng tiền</td>
                    <td>{{ number_format($soluongnhap) }}</td>
                    <td>{{ number_format($tongtien) }}</td>
                  </tfoot>
                </table>
               <div class="row-fluid">
	              <div class="span12">
                  <a class="btn btn-success" href="{{ route('listNhapHang') }}">Quay lại</a>
	              </div>
	            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </form>
  </div>
</div>
@endsection