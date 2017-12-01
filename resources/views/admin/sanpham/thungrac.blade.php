@extends('layouts.admin')
@section('title', 'Danh sách sản phẩm | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSanPham') }}" class="tip-bottom">Sản phẩm</a> <a class="tip-bottom">Thùng rác</a></div>
  <h1>Danh sách sản phẩm đã xóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả sản phẩm {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listSanPham') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
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
                  <th>Số lượng</th>
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
                  <td>{{ $sanpham->soluongsanpham }}</td>
                  <td>Đã xóa</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $sanpham->id . '_' . 'sanpham'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $sanpham->id . '_' . 'sanpham'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection