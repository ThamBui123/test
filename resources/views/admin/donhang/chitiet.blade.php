@extends('layouts.admin')
@section('title')
Chi tiết đơn hàng | {{ $donhang->madonhang }}
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-editable.css') }}" />
@endsection
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listDonHang') }}" class="tip-bottom">Đơn hàng</a> <a href="#" class="current">Chi tiết đơn hàng (#{{ $donhang->madonhang }})</a> </div>
    <h1>Chi tiết đơn hàng (#{{ $donhang->madonhang }}) 
    @if (!$donhang->check_hoanthanh() && $donhang->tinhtrangdonhang == 2) (Đơn hàng này chưa giao đủ) 
    @elseif($donhang->tinhtrangdonhang == 2) (Đơn hàng đã hoàn thành) 
    @endif 
    @if ($donhang->nhanvien)
      ==> Nhân viên duyệt {{ $donhang->nhanvien->manhanvien }} - {{ $donhang->nhanvien->hovaten }}
    @endif
    </h1>
  </div>
  <div class="container-fluid">
  @include('partials.alert-info')
  @if(session('khongthexoa'))
  <div class="alert alert-danger">
    <div class="panel-heading">{{ session('thongbao') }}</div>
    <div class="panel-body">
      <form class="form-inline" action="{{ route('postChinhSuaDonHang', $donhang->id) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="khongthexoa_istrue" value="true">
        <div class="form-group">
          <label><b>Khi xóa sẽ không thể khôi phục</b></label>
        </div>
        <button type="submit" class="btn btn-success">Tôi đồng ý</button>
        <button type="button" class="btn btn-danger" onclick="window.location='{{ route('getChiTietDonHang', $donhang->id) }}'">Hủy bỏ</button>
      </form>
    </div>
  </div>
  <br>
  @endif
   <form action="{{ route('postCapNhatDonHang', $donhang->id) }}" method="post" class="form-horizontal">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row-fluid" style="margin-top: -20px">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 >Thông tin đặt hàng</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid" style="margin-top: 5px">
              <div class="span5">
                <table class="">
                  <tbody>
                    <tr>
                      <td><h4>{{ $donhang->khachhang->hovaten }}</h4></td>
                    </tr>
                    <tr>
                      <td><b>Địa chỉ: </b>{{ $donhang->khachhang->diachi }}</td>
                    </tr>
                    <tr>
                      <td><b>Số điện thoại: </b>{{ $donhang->khachhang->sodienthoaikh }}</td>
                    </tr>
                    <tr>
                      <td><b>Email: </b>{{ $donhang->khachhang->email }}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
                <button type="button" class="btn btn-success" onclick="window.location='{{ route('getLichSuMuaHang', $donhang->khachhang->id) }}'">Xem lịch sử mua hàng</button>
                @if ($donhang->phuongthuctt_id > 0)
                <hr>
                Phương thức thanh toán: <b>{{ $donhang->phuongthuctt->tenphuongthuc }}</b>
                @else
                <hr>
                Phương thức thanh toán: <b>Mặc định</b>
                @endif

              </div>
              <div class="span7">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                      <td class="width30">Đơn hàng ID:</td>
                      <td class="width70"><strong>#{{ $donhang->madonhang }}</strong></td>
                    </tr>
                    <tr>
                      <td>Ngày đặt:</td>
                      <td><strong>{{ dinh_dang_ngay_gio($donhang->ngaydat) }}</strong></td>
                    </tr>
                    <tr>
                      <td>Ngày nhận:</td>
                      <td><strong>{{ dinh_dang_ngay_gio($donhang->ngaynhan) }}</strong></td>
                    </tr>
                  <tr>
                  <td class="width30">Ghi chú:</td>
                    <td class="width70">
                      <strong>{{ $donhang->ghichukhachhang }}</strong>
                    </td>
                  </tr>
                  @php
                    $option = json_decode($donhang->options);
                    $check_giaohang = true;
                  @endphp
                  <tr>
                    <td class="width30">Phí vận chuyển</td>
                    <td class="width70">
                      <strong>{{ number_format($option->phivanchuyen) }}
                        @if ($donhang->phuongthucvc_id > 0)
                           &nbsp; ({{ $donhang->phuongthucvc->tenvanchuyen }})
                        @endif
                      </strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="width30">Phần trăm giảm giá (%)</td>
                    <td class="width70">
                      <strong>{{ $option->phantramgiamgia }}</strong>
                    </td>
                  </tr>
                </tbody>
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered _chitietdonhang">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Sản phẩm</th>
                      <th>Số lượng</th>
                      <th>Giá bán</th>
                      <th>Thành tiền</th>
                      @if ($donhang->tinhtrangdonhang < 1)
                        <th>Công cụ</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                  @php $stt = 1; $tiendonhang = 0; @endphp
                  @foreach ($donhang->chitietdonhang as $chitietdonhang)
                 <tr>
                     <td>{{ $stt }}</td>
                     <td class="_options">
                      {{ $chitietdonhang->sanpham->tensanpham }}
                      {{-- Options --}}
                      <blockquote style="margin: 0px;">
                        @php
                        $options = json_decode($chitietdonhang->options);
                        $sanpham_ton = $chitietdonhang->sanpham->soluongsanpham;
                        $chuagiao = $chitietdonhang->soluong - $chitietdonhang->dagiao;
                        @endphp
                        @if(!empty($options->dattruoc))
                        <small style="color: blue;">
                         Ghi chú đã đặt trước {{ $options->dattruoc }} sản phẩm
                         </small>
                         @endif
                         @if($chuagiao > 0)
                         <small class="text-info">Còn <b>{{ $chuagiao }}</b> sản phẩm chưa giao
                        </small>
                        @else
                        <small class="text-info">Đã giao hoàn thành</small>
                        @endif
                        @if ($sanpham_ton < $chuagiao)
                         @php
                           $check_giaohang = false;
                         @endphp
                         <small class="text-error">Hiện tại không đủ số lượng để giao hàng chỉ còn lại <b>{{ $sanpham_ton }}</b> sản phẩm trong kho</small>
                         <a href="{{ route('getThemNhapHang') }}?nhaphang_sanpham={{ $chitietdonhang->sanpham->id }}" style="color: blue;" target="_blank"><b>Nhập hàng thêm</b></a> 
                         @if($sanpham_ton > 0)
                         <a href="javascript:;" style="color: blue;" class="_giaotruoc" data-value="{{ $sanpham_ton }}" data-id="{{ $chitietdonhang->sanpham_id }}"><b>| Cho phép giao trước {{ $sanpham_ton }} sản phẩm</b></a>
                         <span class="click_text_sp" style="cursor: pointer;"></span>
                         @endif
                         <input type="hidden" name="soluongmua[]" value="{{ $chitietdonhang->sanpham_id }}_0">
                         @else
                         <input type="hidden" name="soluongmua[]" value="{{ $chitietdonhang->sanpham_id }}_{{ $chuagiao }}">
                       @endif
                      </blockquote>
                       {{-- Options --}}
                     </td>
                     <td class="right">
                     @if ($donhang->tinhtrangdonhang < 1)
                      <a href="#" class="soluong_mua" data-type="number" data-pk="{{ $donhang->id }}" data-sanphamid="{{ $chitietdonhang->sanpham->id }}" data-value="{{ $chitietdonhang->soluong }}" data-url="{{ route('postChinhSuaDonHang', $donhang->id) }}">{{ $chitietdonhang->soluong }}</a>
                     @else
                      {{ $chitietdonhang->soluong }}
                     @endif
                     </td>
                     <td class="right">{{ number_format($chitietdonhang->giaban) }}</td>
                     <td class="right _thanhtien"><strong>{{ $chitietdonhang->thanhtien() }}</strong></td>
                     @if ($donhang->tinhtrangdonhang < 1)
                     <td>
                       <button type="button" class="btn btn-mini btn-info xacnhan" data-action="{{ route('postChinhSuaDonHang', $donhang->id) }}" data-value="{{ $chitietdonhang->sanpham->id }}" name="xoasanpham_dh">Xóa</button>
                     </td>
                     @endif
                  </tr>
                  @php 
                  $stt++; 
                  $tiendonhang+= $chitietdonhang->giaban*$chitietdonhang->soluong;
                  @endphp
                  @endforeach
                  </tbody>
                </table>
               <div class="row-fluid">
                <div class="span9">
                  <div class="control-group">
                    <label class="control-label">Tình trạng đơn hàng: </label>
                    <div class="controls">
                      @if($donhang->tinhtrangdonhang < 2)
                       <select name="tinhtrangdonhang">
                         @foreach ($all_tinhtrangdonhang as $tinhtrangdonhang)
                         <option value="{{ $tinhtrangdonhang['id'] }}" @if ($donhang->tinhtrangdonhang == $tinhtrangdonhang['id'])
                          selected="true"
                         @endif 
                         >{{ $tinhtrangdonhang['tinhtrang'] }}</option>
                         @endforeach
                       </select>
                       @elseif (!$donhang->check_hoanthanh())
                         <select name="tinhtrangdonhang">
                           <option value="off" selected="true">Chưa giao đủ sản phẩm</option>
                           <option value="2">Hoàn thành</option>
                         </select>
                       @else
                        <span style="color: blue;line-height: 30px;">Đã hoàn thành</span>
                       @endif
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Ghi chú đơn hàng: </label>
                    <div class="controls">
                      <textarea type="text" name="ghichudonhang" class="span11" placeholder="Thông báo ghi chú đơn hàng nếu cần">{{ $donhang->ghichudonhang }}</textarea>
                    </div>
                  </div>
                </div>
                <div class="span3">
                <br><br>
                 <h4><span>Tổng tiền:</span> <span id="_tongtien">{{ $donhang->tongtien() }} </span></h4>
                </div>
               </div>
               <div class="row-fluid" style="margin-top: 30px;">
                <div class="span12 text-center">
                  {{-- Kiểm tra trạng thái đơn hàng <button> --}}
                  @if($donhang->tinhtrangdonhang < 2)
                    @if ($check_giaohang)
                      <button type="submit" class="btn btn-primary">
                        Cập nhật đơn hàng
                      </button>
                    @else
                      <button class="btn btn-primary _btn-giao-hang" type="submit" disabled>Không đủ số lượng giao hàng</button>
                    @endif
                   @if ($donhang->tinhtrangdonhang != 2)
                   <button class="btn btn-danger xacnhan" type="button" data-action="{{ route('postHuyBoDonHang') }}" name="donhang_id" data-value="{{ $donhang->id }}">Hủy đơn hàng</button>
                   @endif
                 @elseif (!$donhang->check_hoanthanh())
                 <button type="submit" class="btn btn-primary">
                    Giao đủ sản phẩm
                  </button>
                 @else
                 <button type="button" class="btn btn-primary" disabled>
                    Đơn hàng đã hoàn thành
                  </button>
                 @endif
                 <a class="btn btn-success" href="{{ route('listDonHang') }}">Quay lại</a>
                 {{-- Kiểm tra trạng thái đơn hàng <button> --}}
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
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-editable.min.js') }}"></script>
<script src="{{ asset('js/admin/capnhatdonhang.js') }}"></script>
<script type="text/javascript">
  $('select').select2();

  $('._giaotruoc').click(function(){
    html_giaotruoc = this;
    soluongmua = $(this).parents('._options').find("input[name='soluongmua[]']");
    giaotruoc = $(this).data('value');
    id = $(this).data('id');
    click_text_sp = $(this).parents('._options').find(".click_text_sp");
    $.confirm({
        title: 'Cho phép giao trước sản phẩm!',
        content: 'Bạn có chắc chắn giao trước sản phẩm không ?',
        autoClose: 'cancelAction|3000',
        typeAnimated: true,
        boxWidth: '500px',
        useBootstrap: false,
        icon: 'icon-warning-sign',
        type: "red",
        buttons: {
            formSubmit: {
                btnClass: 'btn-red',
                text: 'Đồng ý',
                action: function () {
                  soluongmua.val(id +'_'+ giaotruoc);
                  $('._btn-giao-hang').prop('disabled', false);
                  $('._btn-giao-hang').html('Cập nhật');
                  $(click_text_sp).html("Đã chọn giao trước " +giaotruoc+ " sản phẩm <b>Click để hủy</b>");
                  $(html_giaotruoc).css('display', 'none');
                }
            },
            'Hủy bỏ': {
                btnClass: 'btn-blue',
                action: function () {
                }
            },
            cancelAction:  
            {
              text: 'Tự động hủy sau ',
              btnClass: 'btn-blue',
              action: function () {}
            }
        },
    });
  });

  $('.click_text_sp').click(function(){
      soluongmua = $(this).parents('._options').find("input[name='soluongmua[]']");
      html_giaotruoc = $(this).parents('._options').find("._giaotruoc");
      id = $(html_giaotruoc).data('id');
      soluongmua.val(id +'_0');
      $(html_giaotruoc).css('display', 'inline-table');
      $(this).html('');
  });
</script>
@endsection