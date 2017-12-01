<!-- @extends('layouts.admin')
@section('title', 'Danh sách nhóm sản phẩm')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhomSanPham') }}" class="tip-bottom">nhóm sản phẩm</a></div>
  <h1>Danh sách nhóm sản phẩm</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
        <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listNhomSanPham') }}" method="get">
              <div class="input-append">
               <input type="text" name="tennhomsanpham" class="span12 tip-bottom" title="Tìm theo tên nhóm sản phẩm" placeholder="Tìm theo tên nhóm sản phẩm" value="{{ Request::get('tennhomsanpham') }}">
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listHangSanXuat') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
      <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả nhóm sản phẩm {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacNhomSanPham') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemNhomSanPham') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Tên nhóm sản phẩm</th>
                  <th>Giới thiệu</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @php
              admin_list_nhomsanpham($all_nhomsanpham, 0, $str = '');
              @endphp
              </tbody>
            </table>
          </div>
          <center>
            {{ $all_nhomsanpham->appends(Request::except('page'))->links('partials.admin_phantrang') }}
          </center>
        </form>
      </div>
  </div>
</div>
</div>
@endsection -->