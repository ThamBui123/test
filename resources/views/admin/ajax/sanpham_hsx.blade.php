<div class="control-group">
  <label class="control-label">Sản phẩm theo hãng:</label>
   <div class="controls">
    <select class="sanpham_id" required>
      <option>---Chọn---</option>
       @foreach ($all_sanpham as $sanpham)
      <option value="{{ $sanpham->tensanpham . '_' . $sanpham->id }}">{{ $sanpham->tensanpham }}
      </option>
       @endforeach
    </select>
 </div>
</div>

<script>
  $(document).on('click', '.xoadongmoi', function(event) {
    var target = $(event.target),
        row = target.closest('.control-group');
      row.remove();
  });

  $(".sanpham_id").change(function() {
      console.log($(this).select2("val"));
      var giatri_chon = $(this).select2("val");
      if(giatri_chon == '---Chọn---')
        return;
      var tensanpham = giatri_chon.split("_")[0];
      var sanpham_id = giatri_chon.split("_")[1];
      var check = true;
      $.each($('.sanpham_id'),function(){
        if($(this).val() == sanpham_id)
          check = false;
      });

      if(check ==  true)
      {
        $('#append_sanpham').append('<div class="control-group"> <label class="control-label">'+tensanpham+':</label><div class="controls controls-row"> <input type="hidden" name="sanpham_id[]" class="sanpham_id" value="'+sanpham_id+'"/> <input type="hidden" name="tensanpham[]" class="tensanpham" value="'+tensanpham+'"/> <input type="text" name="soluongnhap[]"  class="span2 txt_number" placeholder="Số lượng nhập" title="Số lượng nhập" data-validation="required"/> <input type="text" name="gianhap[]" class="span3 price_number" placeholder="Đơn giá nhập" title="Đơn giá nhập" data-validation="required"/> <input type="text" name="ghichuchitiet[]" class="span3" placeholder="Ghi chú sản phẩm nhập" title="Ghi chú sản phẩm nhập" /> <label class="span2"><input type="checkbox" name="doigiaban[]" id="checkbox_doigiaban_'+sanpham_id+'"/>Đổi giá bán</label><button class="span1 btn btn-danger xoadongmoi" type="button"><i class="icon-remove-sign"></i></button></div></div>');

          $('.price_number').number( true, 0 );
          $('.txt_number').number( true, 0 );
          $('.txt_number').focus();
          $('#checkbox_doigiaban_'+sanpham_id).uniform();
      }
      else
      {
        check = false;
      }
  });

</script>