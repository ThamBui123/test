@extends('layouts.admin')
@section('title', 'Thống kê sản phẩm tồn kho')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.min.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPhamTonKho') }}" class="tip-bottom">Thống kê sản phẩm tồn kho</a></div>
  <h1>Danh sách sản phẩm tồn kho</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
      <div class="myfitter clearfix">
        <div class="input_search">
          <form class="form-inline" action="{{ route('listSanPhamTonKho') }}" method="get">
            <div class="input-append">
             <input type="text" name="masanpham" class="span3 tip-bottom" placeholder="Mã sản phẩm" value="{{ Request::get('masanpham') }}" title="Mã sản phẩm">
             <input type="text" name="tensanpham" class="span6 auto-search-s tip-bottom" placeholder="Tên sản phẩm" value="{{ Request::get('tensanpham') }}" data-url="{{ route('auto-complate-sp') }}" title="Tên sản phẩm">
             <input type="number" min="1" name="soluongton" class="span5 tip-bottom" placeholder="Tìm theo số lượng sản phẩm tồn" value="{{ Request::get('soluongton') }}" title="Tìm theo số lượng sản phẩm tồn">
             <div class="btn-group">
              <button type="submit" class="btn btn-info">Tìm kiếm</button>
              @if (Request::all())
              <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listSanPhamTonKho') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
              @endif
            </div>
          </div>
        </form>
      </div>
      </div>
      <div class="widget-title"> 
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Tất cả sản phẩm hiện đang tồn kho</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Thể loại</th>
              <th>Số lượng tồn kho</th>
              <th>Giá bán</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sanphamtonkho as $sanpham)
            <tr class="gradeX">
              <td>{{ $sanpham->masanpham }}</td>
              <td>{{ $sanpham->tensanpham }}</td>
              <td>{{ $sanpham->tentheloai }}</td>
              <td>{{ number_format($sanpham->soluongsanpham) }}</td>
              <td>{{ number_format($sanpham->giasanpham) }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      <center>
        {{ $sanphamtonkho->links('partials.admin_phantrang') }}
        </center>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/admin/autocompele-data.js') }}"></script>
@endsection