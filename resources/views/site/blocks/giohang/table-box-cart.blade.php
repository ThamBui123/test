<table class="data-table cart-table" id="shopping-cart-table">
  <thead>
    <tr class="first last">
      <th>Ảnh sản phẩm</th>
      <th><span class="nobr">Tên sản phẩm</span></th>
      <th><span class="nobr">Giá bán</span></th>
      <th>Số lượng</th>
      <th>Thành tiền</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
   @foreach (Cart::instance('shopping')->content() as $cart)
    <tr class="first odd">
      <td class="image"><a class="product-image" title="{{ $cart->name }}" href="{{ route('getChiTietSanPham', $cart->model->slugsp) }}"><img width="50" alt="{{ $cart->name }}" src="{{ asset('uploads/anhsanpham/' .$cart->model->anhsanpham) }}"></a></td>
      <td><h5 class="product-name"> <a href="{{ route('getChiTietSanPham', $cart->model->slugsp) }}">{{ $cart->name }}</a> </h5></td>
      <td class="a-right"><span class="cart-price"> <span class="price">{{ number_format($cart->price) }}</span> </span></td>
      <td class="a-center">{{ $cart->qty }}</td>
      <td class="a-right"><span class="cart-price"> <span class="price">{{ number_format($cart->subtotal) }}</span> </span></td>
      <td>
        <button type="button" class="btn btn-sm btn-danger btn-delete-cart-ajax" data-rowid="{{ $cart->rowId }}">Xóa</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  $('.btn-delete-cart-ajax').click(function(){
    rowid = $(this).data('rowid');
    cart.remove(rowid);
});
</script>