@extends('layouts.admin')
@section('title', 'Danh sách bình luận | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listBinhLuan') }}" class="tip-bottom">Bình luận</a></div>
  <h1>Danh sách bình luận</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả bình luận {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listBinhLuan') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Khách hàng</th>
                  <th>Sản phẩm</th>
                  <th>Nội dung</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_binhluan as $binhluan)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $binhluan->id . '_' . 'binhluan'}}" /></td>
                  <td>{{ $binhluan->khachhang->hovaten }}</td>
                  <td>{{ $binhluan->sanpham->tensanpham }}</td>
                  <td>{{ str_limit($binhluan->noidung, 30) }}</td>
                  <td>Đã xóa</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $binhluan->id . '_' . 'binhluan'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $binhluan->id . '_' . 'binhluan'}}">Xóa</button>
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