  function appendtxt(msg)
  {
   return "<span class='help-block form-error'>" +msg+ "</span>";
  }

  function shareSanPham() {
   $('.form-error').remove();
   $('.form-group').removeClass('has-error');
   var emainguoinhan = $('#emainguoinhan');
   var hovatennguoigui = $('#hovatennguoigui');
   var hovatennguoinhan = $('#hovatennguoinhan');
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   if(hovatennguoigui.val() == '')
   {
      hovatennguoigui.parents('.form-group').addClass('has-error');
      hovatennguoigui.parents('.form-group').append(appendtxt('Vui lòng nhập họ và tên bạn'));
      return false;
   }

   else if(hovatennguoigui.val().length < 3){
      hovatennguoigui.parents('.form-group').addClass('has-error');
      hovatennguoigui.parents('.form-group').append(appendtxt('Vui lòng nhập họ và tên bạn hơn 3 ký tự'));
      return false;
   }

   else if(emainguoinhan.val() == ''){
      emainguoinhan.parents('.form-group').addClass('has-error');
      emainguoinhan.parents('.form-group').append(appendtxt('Vui lòng nhập email người nhận'));
      return false;
   }

   else if(!emainguoinhan.val().match(emailReg)){
      emainguoinhan.parents('.form-group').addClass('has-error');
      emainguoinhan.parents('.form-group').append(appendtxt('Vui lòng nhập email hợp lệ'));
      return false;
   }

   else if(hovatennguoinhan.val() == '')
   {
      hovatennguoinhan.parents('.form-group').addClass('has-error');
      hovatennguoinhan.parents('.form-group').append(appendtxt('Vui lòng nhập họ và tên người nhận'));
      return false;
   }

   else if(hovatennguoinhan.val().length < 3){
      hovatennguoinhan.parents('.form-group').addClass('has-error');
      hovatennguoinhan.parents('.form-group').append(appendtxt('Vui lòng nhập họ và tên người nhận hơn 3 ký tự'));
      return false;
   }

   else
   {
      return true;
   }

  }