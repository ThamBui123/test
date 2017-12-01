@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/jquery-ui.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPham') }}" class="tip-bottom">Sản phẩm</a></div>
  <h1>Danh sách sản phẩm</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
    <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listSanPham') }}" method="get">
              <div class="input-append">
               <input type="text" name="masanpham" class="span3 tip-bottom" title="Tìm theo mã sản phẩm" placeholder="Tìm theo mã sản phẩm" value="{{ Request::get('masanpham') }}">
               <input type="text" name="tensanpham" class="span5 auto-search-sp tip-bottom" placeholder="Tìm theo tên sản phẩm" title="Tìm theo tên sản phẩm" value="{{ Request::get('tensanpham') }}" data-url="{{ route('auto-complate-sp') }}">
               <input type="text" name="giasanpham" class="span3 price_number tip-bottom" title="Tìm theo giá sản phẩm từ" placeholder="Tìm theo giá sản phẩm từ" value="{{ Request::get('giasanpham') }}">
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listSanPham') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
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
                  <label class="control-label">Hãng sản xuất</label>
                  <div class="controls">
                    <select name="hangsanxuat_id" class="span12">
                      <option value="all">Tất cả</option>
                     @foreach ($all_hangsanxuat as $hangsanxuat)
                     <option value="{{ $hangsanxuat->id }}" @if ($hangsanxuat->id == Request::get('hangsanxuat_id'))
                      selected="true" 
                     @endif>{{ $hangsanxuat->tenhang }}</option>
                     @endforeach
                   </select>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="control-group">
                  <label class="control-label">Thể loại</label>
                  <div class="controls">
                    <select name="theloai_id">
                      <option value="all">Tất cả</option>
                      @foreach ($all_theloai as $theloai)
                       <option value="{{ $theloai->id }}" @if ($theloai->id == Request::get('theloai_id'))
                        selected="true"
                       @endif>{{ $theloai->tentheloai }}</option>
                       @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <!-- <div class="span6">
                <div class="control-group">
                  <label class="control-label">Đang giảm giá</label>
                  <div class="controls">
                    <label class="radio inline">
                      <input type="radio" name="danggiamgia" value="no" checked>
                      Không
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="danggiamgia" value="yes" {{ Request::get('danggiamgia') == 'yes' ? 'checked' : '' }}>
                     Có
                    </label>
                  </div>
                </div>  
              </div> -->
            </div>
          </div>
        </form>
          </div>
        </div>
        <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả sản phẩm {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacSanPham') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a> </span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemSanPham') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                 <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Hãng sản xuất</th>
                  <th>Thể loại</th>
                  <th>Giá bán</th>
                  <!-- <th>Giảm giá</th> -->
                  <th>Số lượng</th>
                  <th>Số lượng tối đa </th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_sanpham as $sanpham)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $sanpham->id . '_' . 'sanpham'}}" /></td>
                  <td>{{ $sanpham->masanpham }}</td>
                  <td>{{ $sanpham->tensanpham }}</td>
                  <td>{{ $sanpham->hangsanxuat->tenhang }}</td>
                  <td>{{ $sanpham->theloai->tentheloai }}</td>
                  <td>{{ number_format($sanpham->giasanpham) }}</td>
                  <!-- <td>{{ number_format($sanpham->giamgiasanpham) }}</td> -->
                  <td>{{ $sanpham->soluongsanpham }}</td>
                  <td>{{ $sanpham->soluongtoida }}</td>
                  <td>@php
                    echo (($sanpham->trangthai == 2) ? 'Nháp' : 'Hiển thị');
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getSuaSanPham', $sanpham->id) }}" class="btn btn-mini btn-info">Sửa</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $sanpham->id . '_' . 'sanpham'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_sanpham->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
        </form>
      </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/admin/autocompele-data.js') }}"></script>
<script src="{{ asset('js/admin/select2.min.js') }}"></script>  
<script type="text/javascript">
  $('.price_number').number( true, 0 );
  $('select').select2();
</script>
@endsection