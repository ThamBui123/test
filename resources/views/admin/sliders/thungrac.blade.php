@extends('layouts.admin')
@section('title', 'Danh sách sliders | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listSliders') }}" class="tip-bottom">Slider</a></div>
  <h1>Danh sách các slider đã xóa</h1>
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
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listSliders') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="title-table-checkbox"/></th>
                  <th>Ảnh</th>
                  <th>Tiêu đề</th>
                  <th>Liên kết</th>
                  <th>Vị trí</th>
                  <th>Trạng thái</th>
                  <th>Công cụ</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($all_slider as $slider)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $slider->id . '_' . 'sliders'}}" /></td>
                  <td>
                    <img src="{{ asset('uploads/banner/'. $slider->hinhanh) }}" width="40">
                      <span> &nbsp; <a class="lightbox_trigger" href="{{ asset('uploads/banner/'. $slider->hinhanh) }}"><i class="icon-search"></i></a> 
                      </span>
                  </td>
                  <td>{{ $slider->tieude }}</td>
                  <td>{{ $slider->lienket }}</td>
                  <td>{{ $slider->vitri == 1 ? 'Trái' : 'Phải' }}</td>
                  <td>Đã xóa</td>
                  <td class="center">
                    <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $slider->id . '_' . 'sliders'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $slider->id . '_' . 'sliders'}}">Xóa</button>
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