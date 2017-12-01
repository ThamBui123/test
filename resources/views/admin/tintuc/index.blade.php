@extends('layouts.admin')
@section('title', 'Danh sách tin tức')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}" type="text/css">
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listTinTuc') }}" class="tip-bottom">Tin tức</a></div>
  <h1>Danh sách các tin tức</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
    <div class="widget-box">
       <div class="myfitter clearfix">
          <div class="input_search">
            <form class="form-inline" action="{{ route('listTinTuc') }}" method="get">
              <div class="input-append">
               <input type="text" name="tieude" class="span5 tip-bottom" title="Tìm theo tiêu đề tin tức" placeholder="Tìm theo tiêu đề tin tức" value="{{ Request::get('tieude') }}">
               <input type="text" name="nguoitao" class="span5 tip-bottom" title="Tìm theo người tạo" placeholder="Tìm theo người tạo" value="{{ Request::get('nguoitao') }}">
               <input type="text" name="ngaytao" class="mask-date tip-bottom span3" value="{{ Request::get('ngaytao') ? Request::get('ngaytao') : '' }}" title="Ngày tạo">
               <div class="btn-group">
                <button type="submit" class="btn btn-info">Tìm kiếm</button>
                @if (Request::all())
                <button type="button" class="btn btn-danger" onclick="window.location='{{ route('listTinTuc') }}'"><i class="icon-remove-sign"></i> Hủy lọc</button>
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
          <h5>Tất cả tin tức {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><a href="{{ route('listThungRacTinTuc') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemTinTuc') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox"/></th>
                  <th>Người tạo</th>
                  <th>Tiêu đề</th>
                  <th>Ngày tạo</th>
                  <th>Lượt xem</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_tintuc as $tintuc)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $tintuc->id . '_' . 'tintuc'}}" /></td>
                  <td>{{ $tintuc->hovaten }}</td>
                  <td>{{ $tintuc->tieude }}</td>
                  <td>{{ dinh_dang_ngay($tintuc->created_at) }}</td>
                  <td>{{ number_format($tintuc->luotxem) }}</td>
                  <td>@php
                    echo (($tintuc->trangthai == 2) ? 'Nháp' : 'Hiển thị');
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getSuaTinTuc', $tintuc->id) }}" class="btn btn-mini btn-info">Sửa</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $tintuc->id . '_' . 'tintuc'}}">Xóa</button>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <center>
        {{ $all_tintuc->appends(Request::except('page'))->links('partials.admin_phantrang') }}
        </center>
       </form>
      </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/admin/masked.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-datepicker.vi.min.js') }}"></script>
<script type="text/javascript">
  $(".mask-date").mask("99-99-9999");
  $('.mask-date').datepicker({
    language: 'vi'
  });
</script>
@endsection