@if (session('thongbao'))
@php
	$alert = session('danger') ? 'red' : 'blue';
@endphp
<script type="text/javascript">
// $("body").overhang({
//   type: "{{ $alert }}",
//   message: "{{ session('thongbao') }}",
//   duration: 3,
//   closeConfirm: true,
// });
$.confirm({
   title: 'Thông báo',
   content: '{{ session('thongbao') }}',
   autoClose: 'cancelAction|3000',
   type: "{{ $alert }}",
	typeAnimated: true,
   buttons: 
   {
	   'Đóng': function(){
	   },
	 	cancelAction:  {
	 		text: 'Tự động đóng lại sau ',
	 		action: function () {
         }
	   }
   }
 });
</script>
@endif