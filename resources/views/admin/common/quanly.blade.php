@extends('layouts.admin')
@section('title', 'Trang chủ')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('dashboard') }}" class="tip-bottom"><i class="icon-home"></i> Xin chào bạn đến với hệ thống quản lý</a></div>
  </div>
<!--End-breadcrumbs-->
  <div class="container-fluid">   
    @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
    <div class="row-fluid"  style="margin-top: 5px;">
      <div class="widget-box widget-plain">
        <div class="center">
          <ul class="stat-boxes2">
            <li>
              <div class="left peity_line_neutral"><span>
                <span class="bar-list">5,3,9,6,5,9,7,3,5,2</span>
                </span></div>
              <div class="right"> 
                <a href="{{ route('listDonHang') }}">
                  <strong>{{ number_format($tongso_donhang) }}</strong> Đơn hàng 
                </a>
              </div>
            </li>
            <li>
              <div class="left peity_bar_neutral"><span>
                <span class="bar-list">5,3,9,6,5,9,7,3,5,2</span>
                </span></div>
              <div class="right"> 
                <a href="{{ route('listSanPham') }}">
                  <strong>{{ number_format($tongso_sanpham) }}</strong> Sản phẩm 
                </a>
              </div>
            </li>
            <li>
              <div class="left peity_bar_neutral"><span>
               <!--  <span class="bar-list">5,3,9,6,5,9,7,3,5,2</span> -->
                </span></div>
              <div class="right"> 
                <a href="{{ route('listTheLoai') }}">
                  <strong>{{ number_format($tongso_theloai) }}</strong> Thể loại 
                </a>
              </div>
            </li>
            <li>
              <div class="left peity_bar_bad"><span>
                <span class="bar-list">5,3,9,6,5,9,7,3,5,2</span>
                </span></div>
              <div class="right"> 
                <a href="{{ route('listBinhLuan') }}">
                  <strong>{{ number_format($tongso_binhluan) }}</strong> Bình luận
                </a>
              </div>
            </li>
            <li>
              <div class="left peity_line_good"><span>
                <span class="bar-list">5,3,9,6,5,9,7,3,5,2</span>
                </span></div>
              <div class="right"> 
                <a href="{{ route('listKhachHang') }}">
                  <strong>{{ number_format($tongso_khachhang) }}</strong> Khách hàng
                </a> 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @endif
    <div class="row-fluid">
      @if((Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN') || (Auth::guard('nhanvien')->user()->nhomquyen->key === 'NVDH'))
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseDonHang" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Đơn hàng đang chờ ({{ count($all_donhang) }})</h5>
          </div>
          @php
          $collapse_indonhang = '';
          $collapse_inbinhluan = '';
          if(count($all_donhang) > 0)
            $collapse_indonhang = 'in';
          if(count($all_binhluan) > 0)
            $collapse_inbinhluan = 'in';
          @endphp
          <div class="widget-content nopadding updates collapse {{ $collapse_indonhang }}" id="collapseDonHang">
            @foreach ($all_donhang as $donhang)
            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="Chi tiết đơn hàng" href="{{ route('getChiTietDonHang', $donhang->id) }}"><strong>{{ $donhang->khachhang->hovaten }} - {{ $donhang->khachhang->sodienthoaikh }} - 
              &nbsp;(@php
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
                  @endphp)
                </strong></a> <span>{{ $donhang->khachhang->diachi }}</span> </span> <span class="update-date"><span class="update-day">{{ $donhang->sosanpham() }}</span>SP</span> 
            </div>
            @endforeach
            <ul class="recent-posts">
              <li class="clearfix">
                <button class="btn btn-warning btn-mini" onclick="window.location.href='{{ route('listDonHang') }}';">Đơn hàng</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endif
      @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseBinhLuan" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>Bình luận đang chờ duyệt ({{ count($all_binhluan) }})</h5>
          </div>
          <div class="widget-content nopadding updates collapse {{ $collapse_inbinhluan }}" id="collapseBinhLuan">
            @foreach ($all_binhluan as $binhluan)
            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="Chi tiết đơn hàng" href="{{ route('getXemBinhLuan', $binhluan->id) }}"><strong>{{ $binhluan->khachhang->hovaten }} - Xem chi tiết
            </strong></a> <span>{{ str_limit($binhluan->noidung, 100) }}</span> </span> 
            </div>
            @endforeach
            <ul class="recent-posts">
              <li class="clearfix">
                <button class="btn btn-warning btn-mini" onclick="window.location.href='{{ route('listBinhLuan') }}';">Bình luận</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endif
    </div>
    @if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
    <div class="row-fluid">
       <div class="span12">
         <div class="text-right">
           Chọn tháng để xem : <input type="text" class="date_doanhthu" value="{{ date('m-Y') }}">
         </div>
       </div>
    </div>
    <div id="doanhthu_ngay">
    @include('admin.ajax.doanhthu', ['doanhthu_ngay' => $doanhthu_ngay])
    </div>
    @else
    <div class="row-fluid">
      <div class="span12">
        <br>
        <div class="alert alert-info">
          <h1 class="text-center">Chào mừng bạn đến với hệ thống quản lý webiste</h1>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.peity.min.js') }}"></script> 
@if(Auth::guard('nhanvien')->user()->nhomquyen->key === 'ADMIN')
<script>
$('.date_doanhthu').datepicker({
  language: 'vi',
  format: "mm-yyyy",
  viewMode: "months", 
  minViewMode: "months",
  startDate : new Date('2014-01-01'),
  endDate : new Date('{{ date('Y-m-d') }}'),
}).on('changeMonth', function(e){ 
  currMonth = new Date(e.date).getMonth() + 1;
  currYear = new Date(e.date).getFullYear();
  $.ajax({
    url: '{{ route('ajaxDoanhThu') }}',
    dataType: 'text',
    type: 'post',
    data: {
      'thang': currMonth,
      'nam': currYear,
      '_token': token_key
    },
    success: function(data){
      $('#doanhthu_ngay').html(data);
    }
  });
 });
</script>
@endif
<script>
  $(".bar-list").peity("bar");
</script>
@endsection