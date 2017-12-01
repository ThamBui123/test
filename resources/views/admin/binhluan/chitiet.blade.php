@extends('layouts.admin')
@section('title', 'Chi tiết bình luận')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('admin') }}" title="Trang chủ" class="tip-bottom"><i class="icon-home"></i> Trang chủ</a> <a href="{{ route('listBinhLuan') }}" class="tip-bottom">Bình luận</a> <a href="#" class="current">Chi tiết bình luận</a> </div>
    <h1>Chi tiết bình luận</h1>
  </div>
  <div class="container-fluid">
  @include('partials.alert-info')
   <form method="post" class="form-horizontal">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row-fluid" style="margin-top: -20px">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 >Chi tiết bình luận</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid" style="margin-top: 5px">
              <div class="span5">
                <table class="">
                  <tbody>
                    <tr>
                      <td><h4>{{ $binhluan->khachhang->hovaten }}</h4>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Địa chỉ: </b>{{ $binhluan->khachhang->diachi }}</td>
                    </tr>
                    <tr>
                      <td><b>Số điện thoại: </b>{{ $binhluan->khachhang->sodienthoaikh }}</td>
                    </tr>
                    <tr>
                      <td><b>Email: </b>{{ $binhluan->khachhang->email }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="span7">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                      <td>Ngày gửi:</td>
                      <td><strong>{{ $binhluan->created_at }}</strong></td>
                    </tr>
                    <tr>
                      <td>Trạng thái:</td>
                      <td>
                        <strong>
                        @if ($binhluan->daxem == 0)
                          Chưa xem
                        @else
                          Đã xem
                        @endif
                        </strong>
                      </td>
                    </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
              <br>
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Nội dung</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $binhluan->noidung }}</td>
                    </tr>
                  </tbody>
                </table>
                {{-- <div class="row-fluid">
                  <div class="span9">
                    <div class="control-group">
                      <label class="control-label">Trả lời bình luận: </label>
                      <div class="controls">
                        <textarea type="text" name="noidungtraloi" class="span11" placeholder="Trả lời bình luận nếu muốn"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="span3">
                    <button class="btn btn-info" type="submit" style="margin-top: 20px">Trả lời</button>
                  </div>
                </div> --}}
               <div class="row-fluid">
                <div class="span12">
                 <button formmethod="post" formaction="{{ route('postDuyetBinhLuan', $binhluan->id) }}" onclick="return xacnhan();" class="btn btn-primary pull-right" @if ($binhluan->daxem == 1)
                  disabled="disabled" 
                 @endif>@if ($binhluan->daxem == 1) Đã xem @endif</button>
                 <a class="btn btn-success" href="{{ route('listBinhLuan') }}">Quay lại</a>
                 <button class="btn btn-danger" formmethod="post" formaction="{{ route('postHuyBoBinhLuan', $binhluan->id) }}" onclick="return xacnhan();">Xóa bình luận này</button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </form>
  </div>
</div>
@endsection