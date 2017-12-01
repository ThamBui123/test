@extends('layouts.site')
@section('title', 'Giỏ hàng của bạn')
@section('content')
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
      <div class="cart wow bounceInUp animated">
        <div class="page-title">
          <h2>Giỏ hàng</h2>
        </div>
        @if(session('dattruoc'))
        <div class="panel panel-info">
          <div class="panel-heading">{{ session('thongbao') }}</div>
          <div class="panel-body">
            <form class="form-inline" action="{{ route('postUpdateCartDatTruoc') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="rowid" value="{{ session('rowid') }}">
              <input type="hidden" name="qty" value="{{ session('soluongmua') }}">
              <input type="hidden" name="dattruoc" value="{{ session('dattruoc') }}">
              <div class="form-group">
                <label for="exampleInputName2">Nếu bạn đặt trước thì quá trình giao hàng có thể sẽ chậm hơn so với quy định (Số sản phẩm đặt trước là {{ session('dattruoc') }}) &nbsp;&nbsp;&nbsp;</label>
              </div>
              <button type="submit" class="btn btn-success">Tôi đồng ý</button>
              <button type="button" class="btn btn-danger" onclick="window.location='{{ route('getCart') }}'">Hủy bỏ</button>
            </form>
          </div>
        </div>
        @endif
      </div>
      <div id="ajax-giohang">
      @include('site.giohang.form-cart')
      </div>
    </div>
  </div>
</section>
@endsection