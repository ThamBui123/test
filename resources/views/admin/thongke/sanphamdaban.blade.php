@extends('layouts.admin')
@section('title', 'Thống kê sản phẩm đã bán')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPhamDaBan') }}" class="tip-bottom">Thống kê sản phẩm đã bán</a></div>
  <h1>Danh sách sản phẩm đã bán 
  (<i>{{ $dieukienloc }}</i>)
  </h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
      <div class="myfitter clearfix">
        <div class="input_search">
          <form class="form-inline">
            <div class="input-append">
             <input type="text" name="masanpham" class="span2 tip-bottom" placeholder="Mã sản phẩm" value="{{ Request::get('masanpham') }}" title="Mã sản phẩm">
             <input type="text" name="tensanpham" class="span5 auto-search-sp tip-bottom" placeholder="Tên sản phẩm" value="{{ Request::get('tensanpham') }}" data-url="{{ route('auto-complate-sp') }}" title="Tên sản phẩm">
             <input type="number" name="sosanpham" class="span4 tip-bottom" placeholder="Số sản phẩm hiện thị trên trang" value="{{ Request::get('sosanpham') }}" title="Số sản phẩm hiện thị trên trang">
             <div class="btn-group">
              <button type="submit" class="btn btn-info">Tìm kiếm</button>
              @if (Request::all())
              <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listSanPhamDaBan') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
              @endif
              <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#adv_search">Nâng cao
              </button>
            </div>
          </div>
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
                  <label class="control-label">Số lượng sản phẩm đã bán ra</label>
                  <div class="controls">
                    <input type="number" min="1" name="sosanphambanra" class="span12" placeholder="Lọc theo số lượng đã bán ra" value="{{ Request::get('sosanphambanra') }}">
                  </div>
                </div>
              </div>
              <div class="span9">
                <div class="control-group">
                  <label class="control-label">Ngày đặt hàng</label>
                  <div class="controls">
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="1" checked>
                      Theo ngày-tháng-năm
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="2" {{ Request::get('typeof') == 2 ? 'checked' : '' }}>
                      Theo Tháng
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="typeof" value="3" {{ Request::get('typeof') == 3 ? 'checked' : '' }}>
                      Theo Năm
                    </label>
                    <label class="radio inline">
                      <input type="text" name="data" class="mask-date tip-bottom" value="{{ Request::get('data') ? Request::get('data') : date('d-m-Y') }}" data-title="Ngày tháng năm" style="width: 200px;">
                    </label>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </form>
      </div>
      </div>
      <div class="alert alert-info" style="margin-bottom: 0px;">
        <h4>Thống kê chi tiết</h4>
        <br>
        <div class="row-fluid">
          <div class="span6">
            <b>Tổng số sản phẩm đã bán là : </b> <span class="badge badge-info"><i>{{ $sanphamdaban['tongso_daban'] }} sản phẩm</i></span>
            <br>
            <b>Tổng doanh thu bán được là : </b> <span class="badge badge-info"><i> {{ number_format($sanphamdaban['tongtien']) }} vnđ</i></span>
          </div>
          <div class="span6">
            
          </div>
        </div>
      </div>
      <div class="widget-title"> 
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Tất cả sản phẩm đã bán</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Số lượng đã bán</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
          @php
            $tongtien = 0;
            $soluongban = 0;
          @endphp
          @foreach ($sanphamdaban['data'] as $sanpham)
            <tr class="gradeX">
              <td>{{ $sanpham->masanpham }}</td>
              <td>{{ $sanpham->tensanpham }}</td>
              <td>{{ $sanpham->total_sales }}</td>
              <td>{{ number_format($sanpham->total_price) }}</td>
            </tr>
          @php
            $tongtien += $sanpham->total_price;
            $soluongban += $sanpham->total_sales;
          @endphp
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2">Tổng tiền</td>
              <td><b>{{ number_format($soluongban) }}</b></td>
              <td><b>{{ number_format($tongtien) }}</b></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <center>
        {{ $sanphamdaban['data']->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/admin/autocompele-data.js') }}"></script>
<script src="{{ asset('js/admin/masked.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script type="text/javascript">
  $(".mask-date").mask("99-99-9999");
  $('.mask-date').datepicker({
    language: 'vi',
    startDate : new Date('2014-01-01'),
    endDate : new Date('{{ date('Y-m-d') }}'),
  });
</script>
@endsection