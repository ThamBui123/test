@extends('layouts.admin')
@section('title', 'Danh sách các trang | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPages') }}" class="tip-bottom">Trang</a></div>
  <h1>Danh sách các trang đã xóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả các trang đã xóa</h5>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listPages') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox"/></th>
                  <th>Tiêu đề</th>
                  <th>Ngày tạo</th>
                  <th>Slug</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_page as $page)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $page->id . '_' . 'pages'}}" /></td>
                  <td>{{ $page->tieude }}</td>
                  <td>{{ dinh_dang_ngay($page->created_at) }}</td>
                  <td>{{ $page->slug }}</td>
                  <td>Đã xóa</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $page->id . '_' . 'pages'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $page->id . '_' . 'pages'}}">Xóa</button>
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