<div class="panel-group accordion-faq" id="toolbar-accordion" style="margin-top: 10px;margin-bottom: 0px;">
   <div class="panel">
      <div class="panel-heading"> <a data-toggle="collapse" data-parent="#toolbar-accordion" href="#toolbar" class="collapsed"> <span class="arrow-down">+</span> <span class="arrow-up">&#8211;</span> Lọc kết quả</a> 
      </div>
      @if (Request::all())
      <div id="toolbar" class="panel-collapse collapse in">
      @else
      <div id="toolbar" class="panel-collapse collapse">
      @endif
         <div class="toolbar">
            <div class="row">
               <div class="col-md-12">
                  <form class="form-inline" method="get" action="{{ url()->current() }}" id="loctimkiem">
                     @php
                     $sortby = request()->get('sortby');
                     $orderby = request()->get('orderby');
                     $show = request()->get('show');
                     @endphp
                     <div class="form-group">
                        <select name="sortby" class="form-control" title="Sắp xếp theo">
                           <option value="id">--Sắp xếp theo--</option>
                           <option value="name" {{ $sortby == 'name' ? 'selected' : '' }}>Tên sản phẩm</option>
                           <option value="price" {{ $sortby == 'price' ? 'selected' : '' }}>Giá sản phẩm</option>
                         
                        </select>
                     </div>
                     <div class="form-group">
                        <input type="text" name="price_from" placeholder="Giá từ" class="form-control input_price input-width" value="{{ request()->get('price_from') }}" title="Giá sản phẩm từ">
                     </div>
                     <div class="form-group">
                        <input type="text" name="price_to" value="{{ request()->get('price_to') }}" placeholder="Giá đến" class="form-control input_price input-width" title="Giá sản phẩm đến">
                     </div>
                     <div class="form-group">
                        <select name="orderby" class="form-control" title="Hiển thị (Tăng/ giảm dần)">
                           <option value="desc">--Hiển thị--</option>
                           <option value="desc" {{ $orderby == 'desc' ? 'selected' : '' }}>Mới nhất</option>
                           <option value="asc" {{ $orderby == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <select name="show" class="form-control" title="Số sản phẩm trên trang">
                           <option value="16">--Số sản phẩm--</option>
                           <option value="24" {{ $show == '24' ? 'selected' : '' }}>Hiện thị 24</option>
                           <option value="32" {{ $show == '32' ? 'selected' : '' }}>Hiện thị 32</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-info" id="filler_btn" style="margin-top: -1px;" title="Lọc tìm kiếm"><span class="glyphicon glyphicon-glass"></span> Tìm kiếm</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>