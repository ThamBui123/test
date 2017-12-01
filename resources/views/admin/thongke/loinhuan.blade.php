@extends('layouts.admin')
@section('title', 'Thống kê lợi nhuận')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('getLoiNhuan') }}" class="tip-bottom">Thống kê lợi nhuận</a></div>
  <h1>Thống kê lợi nhuận</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
      <div class="myfitter clearfix">
        <div class="input_search">
          <form class="form-inline" action="{{ route('getLoiNhuan') }}" method="get">
            <input type="hidden" name="none_filter" value="on">
            <div class="input-append">
              @php
                $select_thang = Request::get('data_thang');
              @endphp
             <span class="add-on">Tháng</span>
             <select name="data_thang" class="span2">
              <option value="">Tất cả</option>
              @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}" {{ $select_thang == $i ? 'selected' : '' }}>Tháng {{ $i }}</option>
              @endfor
             </select>
              @php
                $select_nam = Request::get('data_nam');
              @endphp
             <span class="add-on">Năm</span>
             <select name="data_nam" class="span2">
              <option value="">Tất cả</option>
              @for ($i = 2014; $i <= date('Y'); $i++)
              <option value="{{ $i }}" {{ $select_nam == $i ? 'selected' : '' }}>Năm {{ $i }}</option>
              @endfor
             </select>
             <span class="add-on">Từ năm</span>
              @php
                $data_tunam_select = Request::get('data_tunam');
              @endphp
              <select name="data_tunam" class="span2">
              <option value="">-----</option>
              @for ($i = 2014; $i <= date('Y'); $i++)
              <option value="{{ $i }}" {{ $data_tunam_select == $i ? 'selected' : '' }}>Năm {{ $i }}</option>
              @endfor
             </select>
             <span class="add-on">Đến năm</span>
              @php
                $data_dennam_select = Request::get('data_dennam');
              @endphp
              <select name="data_dennam" class="span2">
              <option value="">-----</option>
              @for ($i = 2014; $i <= date('Y'); $i++)
              <option value="{{ $i }}" {{ $data_dennam_select == $i ? 'selected' : '' }}>Năm {{ $i }}</option>
              @endfor
             </select>
             <div class="btn-group">
              <button type="submit" class="btn btn-info">Thống kê</button>
              @if (Request::all())
              <button type="button" class="btn btn-danger" onclick="window.location='{{ route('getLoiNhuan') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
              @endif
              <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#adv_search">Nâng cao
              </button>
            </div>
          </div>
          <div class="two-search clearfix">
            <span class="add-on pull-left">Theo sản phẩm</span>
            <input class="select2_motsanpham pull-left" name="sanpham" value="{{ request()->sanpham }}" data-href="{{ route('getListSanPhamAjax') }}" style="width: 500px;">
          </div>
        </form>
         @php
          $collapse_in = '';
          if (request()->dgv_filter)
          {
            $collapse_in = 'in';
          }
        @endphp
        <form action="{{ route('getLoiNhuan') }}" method="get" class="form-inline">
        <input type="hidden" name="dgv_filter" value="on">
         <div id="adv_search" class="collapse {{ $collapse_in }}">
           <div class="row-fluid">
            <div class="input-append">
              <span class="add-on">Từ tháng</span>
              @php
                $data_tuthang_select = Request::get('data_tuthang');
              @endphp
              <select name="data_tuthang" class="span3">
              <option value="">-----</option>
              @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}" {{ $data_tuthang_select == $i ? 'selected' : '' }}>Tháng {{ $i }}</option>
              @endfor
             </select>
              <span class="add-on">Đến tháng</span>
              @php
                $data_denthang_select = Request::get('data_denthang');
              @endphp
              <select name="data_denthang" class="span3">
              <option value="">-----</option>
              @for ($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}" {{ $data_denthang_select == $i ? 'selected' : '' }}>Tháng {{ $i }}</option>
              @endfor
             </select>
              <span class="add-on">Năm</span>
              <select name="data_nam" class="span3">
              <option value="">-----</option>
              @for ($i = 2014; $i <= date('Y'); $i++)
              <option value="{{ $i }}" {{ $select_nam == $i ? 'selected' : '' }}>Năm {{ $i }}</option>
              @endfor
             </select>
              <button type="submit" class="btn btn-success">Thống kê</i>
              </button>
            </div>
            <div class="two-search clearfix">
            <span class="add-on pull-left">Theo sản phẩm</span>
            <input class="select2_motsanpham pull-left" name="sanpham" value="{{ request()->sanpham }}" data-href="{{ route('getListSanPhamAjax') }}" style="width: 500px;">
          </div>
          </div>
        </div>
      </form>
      </div>
    </div>
      <div class="widget-title"> 
        <span class="icon"><i class="icon-th"></i></span>
        <h5>Thống kê lợi nhuận | (<a href="#" id="_luu_img" style="color: blue">Lưu lại biểu đồ</a>)</h5>
      </div>
      <div class="widget-content nopadding">
        <div class="alert alert-info" style="margin-bottom: 0px;">
        <h4>Thống kê chi tiết doanh thu ( {{ $loai_thongke }} )</h4>
        <br>
        <div class="row-fluid">
          <div class="span6">
             <b>Tổng số sản phẩm đã nhập hàng là : </b> <span class="badge badge-info"><i>{{ $nhaphang['tongso_nhaphang'] }} sản phẩm</i></span>
            <br>
            <b>Tổng tiền nhập hàng là : </b> <span class="badge badge-info"><i> {{ number_format($nhaphang['tongtien']) }} vnđ</i></span>
            <br>
            <b>Số sản phẩm tồn trong kho là : </b> <span class="badge badge-info"><i> {{ number_format($soluongtonkho) }} sản phẩm</i></span>
          </div>
          <div class="span6">
            <b>Tổng số sản phẩm đã bán là : </b> <span class="badge badge-info"><i>{{ $doanhthu['tongso_daban'] }} sản phẩm</i></span>
            <br>
            <b>Tổng doanh thu bán được là : </b> <span class="badge badge-info"><i> {{ number_format($doanhthu['tongtien']) }} vnđ</i></span>
          </div>
        </div>
        <br>
        <div class="row-fluid">
          <div class="span6">
            @if ($nhaphang['tongtien'] > $doanhthu['tongtien'] && $nhaphang['tongso_nhaphang'] == 0)
              @php
                $loinhuan = $nhaphang['tongtien'] - $doanhthu['tongtien'];
              @endphp
            @else
              @php
                $loinhuan = $doanhthu['tongtien'] - $nhaphang['tongtien'];
              @endphp
            @endif
            <b>Tổng lợi nhuận thu được là (Tạm tính): </b> <span class="badge badge-info"><i> {{ number_format($loinhuan) }} vnđ</i></span>
          </div>
          <div class="span6">
            @if ($loinhuan > 0)
              <b>Kết luận: </b> <span class="badge badge-warning"><i> Bán có lời</i></span>
            @elseif ($loinhuan == 0)
              <b>Kết luận: </b> <span class="badge badge-warning"><i> Chưa xác định</i></span>
            @elseif ($nhaphang['tongtien'] == $doanhthu['tongtien'])
              <b>Kết luận: </b> <span class="badge badge-warning"><i> Thu hồi được vốn</i></span>
            @else
              <b>Kết luận: </b> <span class="badge badge-warning"><i> Chưa thu hồi được vốn</i></span>
            @endif
          </div>
        </div>
      </div>
        <canvas id="myChart" width="400" height="200" style="padding: 10px"></canvas>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/select-sanpham.js') }}"></script> 
<script src="{{ asset('js/admin/chart.min.js') }}"></script> 
<script src="{{ asset('js/admin/canvas-toBlob.js') }}"></script> 
<script src="{{ asset('js/admin/FileSaver.min.js') }}"></script> 
<script>
var dynamicColors = function() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
}
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
      datasets: [
       @foreach ($doanhthu['data'] as $chitiet)
        {
          label: "Năm {{ $chitiet->namdat }}",
          data: [{{ $chitiet->thang1 }}, {{ $chitiet->thang2 }}, {{ $chitiet->thang3 }}, {{ $chitiet->thang4 }}, {{ $chitiet->thang5 }}, {{ $chitiet->thang6 }}, {{ $chitiet->thang7 }}, {{ $chitiet->thang8 }}, {{ $chitiet->thang9 }}, {{ $chitiet->thang10 }}, {{ $chitiet->thang11 }}, {{ $chitiet->thang12 }}],
          backgroundColor: dynamicColors(),
          useRandomColors: true,
          borderWidth: 0.5,
       },
       @endforeach
      ]
    },
    options: {
      scales: {
          yAxes: [{
              ticks: {
                beginAtZero:true,
                  callback: function(value, index, values) {
                    if(parseInt(value) > 999){
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    } else if (parseInt(value) < -999) {
                        return Math.abs(value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    } else {
                        return value;
                    }
                }
            }
          }]
      },
      title: {
        display: true,
        text: 'Biểu đồ doanh thu'
      },
     tooltips: {
        enabled: true,
        mode: 'single',
        callbacks: {
          title: function (tooltipItems, data) { return "Doanh thu " + tooltipItems[0].xLabel.toLowerCase(); },
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var datasetLabel = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ': ' + addCommas(datasetLabel) ;
          }
        }
      } 
    }
});

function addCommas(nStr)
{
   nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

var url_base64jp = document.getElementById("myChart").toDataURL("image/jpg");
$('#_luu_img').click(function(){
    $("#myChart").get(0).toBlob(function(blob) {
        saveAs(blob, "bieudodoanhthu.png");
    });
});
</script>

@endsection