<!-- @extends('layouts.admin')
@section('title', 'Danh sách nhóm sản phẩm | thùng rác')
@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listNhomSanPham') }}" class="tip-bottom">Nhóm sản phẩm</a> <a class="tip-bottom">Thùng rác</a></div>
  <h1>Danh sách nhóm sản phẩm đã xóa</h1>
</div>
<div class="container-fluid">
 @include('partials.alert-info')
  <div class="row-fluid">
  <form action="{{ route('postXoaBo') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="widget-box">
        <div class="widget-title"> 
          <span class="icon"><i class="icon-th"></i></span>
          <h5>Tất cả nhóm sản phẩm {!! admin_link_sapxep() !!}</h5>
          <span class="mytool"><button onclick="return xacnhan();" class="btn btn-mini btn-danger"><i class="icon-remove-sign"></i> Xóa bỏ</button></span>
          <span class="mytool"><a class="btn btn-mini btn-info" href="{{ route('listNhomSanPham') }}"><i class="icon-plus-sign"></i> Quay lại</a></span>
        </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table with-check">
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
              @foreach ($all_nhomsanpham as $nhomsanpham)
                <tr class="gradeX">
                  <td><input type="checkbox" name="ckb_dulieu[]" value="{{ $nhomsanpham->id . '_' . 'theloai' }}" /></td>
                  <td>{{ $nhomsanpham->tennhomsanpham }}</td>
                  <td>{{ str_limit($nhomsanpham->gioithieunsp, 50) }}</td>
                  <td>Đã xóa</td>
                  <button type="button" class="btn btn-mini btn-success xacnhan" data-action="{{ route('postKhoiPhuc') }}" name="res_dulieu" data-value="{{ $nhomsanpham->id . '_' . 'nhomsanpham'}}">Khôi phục</button>
                    <button type="button" class="btn btn-mini btn-danger xacnhan" data-action="{{ route('postXoaBo') }}" name="del_dulieu" data-value="{{ $nhomsanpham->id . '_' . 'nhomsanpham'}}">Xóa</button>
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
@endsection -->