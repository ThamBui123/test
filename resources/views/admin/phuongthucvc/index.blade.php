@extends('layouts.admin')
@section('title', 'Danh sách phương thức vận chuyển')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}" />
@endsection
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listPhuongThucVC') }}" class="tip-bottom">Phương thức vận chuyển</a></div>
  <h1>Danh sách phương thức vận chuyển</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postThungRac') }}" method="post" id="dulieu_check_multi">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả phương thức vận chuyển</h5>
          <span class="mytool"><a href="{{ route('listThungRacPhuongThucVC') }}" class="btn btn-mini btn-danger"><i class="icon-trash"></i> Thùng rác ({{ $da_xoa }})</a></span>
          <span class="mytool"><button class="btn btn-mini btn-danger xacnhan_multi" type="button"><i class="icon-plus-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('getThemPhuongThucVC') }}"><i class="icon-plus-sign"></i> Thêm mới</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox" /></th>
                  <th>Tên phương thức vận chuyển</th>
                  <th>Thời gian</th>
                  <th>Chi phí</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_phuongthucvc as $phuongthucvc)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $phuongthucvc->id . '_' . 'phuongthucvc'}}" /></td>
                  <td>{{ $phuongthucvc->tenvanchuyen }}</td>
                  <td>{{ $phuongthucvc->thoigianvanchuyen }}</td>
                  <td>{{ number_format($phuongthucvc->phivanchuyen) }}</td>
                  <td>@php
                    echo (($phuongthucvc->trangthai == 0) ? 'Nháp' : 'Hiển thị');
                  @endphp</td>
                  <td class="center">
                    <a href="{{ route('getSuaPhuongThucVC', $phuongthucvc->id) }}" class="btn btn-mini btn-info">Sửa</a>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postThungRac') }}" name="del_dulieu" data-value="{{ $phuongthucvc->id . '_' . 'phuongthucvc'}}">Xóa</button>
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
@section('script')
<script src="{{ asset('js/admin/select2.min.js') }}"></script> 
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
  $('.data-table').dataTable({
    "language": {
      "lengthMenu": "Hiển thị trên trang _MENU_",
      "zeroRecords": "Không tìm thấy dữ liệu",
      "info": "Hiển thị (_PAGE_ / _PAGES_) trang",
      "infoEmpty": "Không có dữ liệu",
      "infoFiltered": "(Tìm kiếm từ _MAX_ dòng)",
      "search":         "Tìm kiếm: ",
      "paginate": {
          "first":      "Trang đầu",
          "last":       "Trang cuối",
          "next":       "Trang kế",
          "previous":   "Trang trước"
          },
      },
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "sDom": '<""l>t<"F"fp>'
  });
   $('select').select2();
</script>
@endsection