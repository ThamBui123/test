@extends('layouts.admin')
@section('title', 'Danh sách hãng sản xuất | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listHangSanXuat') }}" class="tip-bottom">Hãng sản xuất</a> <a class="tip-bottom">Thùng rác</a></div>
  <h1>Danh sách hãng sản xuất đã xóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả hãng sản xuất {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listHangSanXuat') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Logo</th>
                  <th>Tên hãng</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_hangsanxuat as $hangsanxuat)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $hangsanxuat->id . '_' . 'hangsanxuat'}}" /></td>
                  <td><img src="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}" width="30">
                      <span> &nbsp; <a class="lightbox_trigger" href="{{ asset('uploads/hangsanxuat/'. $hangsanxuat->logohang) }}"><i class="icon-search"></i></a> 
                      </span>
                  </td>
                  <td>{{ $hangsanxuat->tenhang }}</td>
                  <td>Đã xóa</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $hangsanxuat->id . '_' . 'hangsanxuat'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $hangsanxuat->id . '_' . 'hangsanxuat'}}">Xóa</button>
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