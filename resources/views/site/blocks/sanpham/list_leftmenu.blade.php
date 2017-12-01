@php
if(isset($all_hangsanxuat))
$list_hangsanxuat = \App\Models\Hangsanxuat::where('trangthai', 1)->whereIn('id', $all_hangsanxuat)->get();
else
$list_hangsanxuat = \App\Models\Hangsanxuat::where('trangthai', 1)->get();

@endphp
<aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
  <div class="side-nav-categories">
  </div>
  <div class="block block-layered-nav">
    <div class="block-title">Có thể bạn chọn</div>
    <div class="block-content">
      <dl id="narrow-by-list">
        <dt class="odd"><h4>Giá bán</h4></dt>
        <dd class="odd">
          <ol>
            <li> <a href="{{ url()->current() }}?price_from=50.000&price_to=100.000"><span class="price">50.000</span> - <span class="price">100.000</span></a></li>
            <li> <a href="{{ url()->current() }}?price_from=100.000&price_to=200.000"><span class="price">100.000</span> - <span class="price">200.000</span></a></li>
            <li> <a href="{{ url()->current() }}?price_from=200.000"><span class="price">200.000</span> trở lên</a></li>
          </ol>
        </dd>
        <dt class="even"><h4>Tất cả hãng sản xuất</h4></dt>
        <dd class="even">
          <ol>
            @foreach ($list_hangsanxuat as $hangsanxuat)
            <li> 
              <a href="{{ route('getHangSanXuat', $hangsanxuat->slughsx) }}">
                {{ $hangsanxuat->tenhang }}
              </a> ({{ $hangsanxuat->sosanpham() }}) 
            </li>
            @endforeach
          </ol>
        </dd>
      </dl>
    </div>
  </div>
 
  <div class="block block-cart">
    <div class="block-title ">Đang khuyến mãi</div>
   
    </div>
  </div>
 
</aside>