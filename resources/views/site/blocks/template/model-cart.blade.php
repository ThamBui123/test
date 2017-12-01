<div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="javascript:;" onclick="_load_model_cart()"> <i class="glyphicon glyphicon-shopping-cart"></i>
  <div class="cart-box"><span class="title">Giỏ hàng</span><span id="cart-total">{{ Cart::instance('shopping')->count() }} </span></div>
  </a>
</div>