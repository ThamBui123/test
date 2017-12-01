@php
  $all_hangsanxuat = DB::table('hangsanxuat')->where('trangthai', 1)->get();
@endphp
<div class="brand-logo ">
  <div class="container">
    <div class="slider-items-products">
      <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col6"> 
          @foreach ($all_hangsanxuat as $hangsanxuat)
          <div class="item"> 
            <a href="{{ route('getHangSanXuat', $hangsanxuat->slughsx) }}" title="{{ $hangsanxuat->tenhang }}">
            <div class="img_logohang" style="background-image: url('{{ asset('uploads/hangsanxuat/' .$hangsanxuat->logohang) }}');"></div>
            </a> 
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>