<script type="text/javascript">
   /* Main Slideshow */
   $(window).load(function() {
       $(document).off('mouseenter').on('mouseenter', '.pos-slideshow', function(e){
           $('.ma-banner7-container .timethai').addClass('pos_hover');
       });
       $(document).off('mouseleave').on('mouseleave', '.pos-slideshow', function(e){
           $('.ma-banner7-container .timethai').removeClass('pos_hover');
       });
   });
   $(window).load(function() {
       $('#ma-inivoslider-banner7').nivoSlider({
           effect: 'random',
           slices: 15,
           boxCols: 8,
           boxRows: 4,
           animSpeed: 1000,
           pauseTime: 6000,
           startSlide: 0,
           controlNav: false,
           controlNavThumbs: false,
           pauseOnHover: true,
           manualAdvance: false,
           prevText: 'Prev',
           nextText: 'Next',
           afterLoad: function(){
               },     
           beforeChange: function(){ 
           }, 
           afterChange: function(){ 
           }
       });
   });
   $(document).ready(function(){
       /* timely-owl */
       $("#timely-owl .owl").owlCarousel({
           autoPlay : false,
           items : 1,
           itemsDesktop : [1199,1],
           itemsDesktopSmall : [991,1],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 1000,
           paginationSpeed : 1000,
           rewindSpeed : 1000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
       /* special-offer slider */
       $("#special-offer .owl").owlCarousel({
           autoPlay : false,
           items : 1,
           itemsDesktop : [1199,1],
           itemsDesktopSmall : [991,1],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 3000,
           paginationSpeed : 3000,
           rewindSpeed : 3000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
       /* latest-news slider */
       $("#latest-news .owl").owlCarousel({
           autoPlay : false,
           items : 1,
           itemsDesktop : [1199,1],
           itemsDesktopSmall : [991,1],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 1000,
           paginationSpeed : 1000,
           rewindSpeed : 1000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
       /* clients-say slider */
       $("#clients-say .owl").owlCarousel({
           autoPlay : false,
           items : 1,
           itemsDesktop : [1199,1],
           itemsDesktopSmall : [991,1],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 3000,
           paginationSpeed : 3000,
           rewindSpeed : 3000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
       /* featured-products slider */
       $("#featured-products .owl").owlCarousel({
           autoPlay : false,
           items : 4,
           itemsDesktop : [1199,3],
           itemsDesktopSmall : [991,2],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 3000,
           paginationSpeed : 3000,
           rewindSpeed : 3000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
       /* new-products slider */
       $("#new-products .owl").owlCarousel({
           autoPlay : false,
           items : 4,
           itemsDesktop : [1199,3],
           itemsDesktopSmall : [991,2],
           itemsTablet: [767,2],
           itemsMobile : [480,1],
           slideSpeed : 3000,
           paginationSpeed : 3000,
           rewindSpeed : 3000,
           navigation : true,
           stopOnHover : true,
           pagination : false,
           scrollPerPage:true,
       });
   });
</script>

<!-- Hot Deals Timer 1-->
<script type="text/javascript">
   var dthen1 = new Date("12/25/33 11:59:00 PM");
   start = "08/04/15 03:02:11 AM";
   start_date = Date.parse(start);
   var dnow1 = new Date(start_date);
   if(CountStepper>0)
       ddiff= new Date((dnow1)-(dthen1));
   else
       ddiff = new Date((dthen1)-(dnow1));
   gsecs1 = Math.floor(ddiff.valueOf()/1000);
   
   var iid1 = "countbox_1";
   CountBack_slider(gsecs1,"countbox_1", 1);
</script>
<!-- Hot Deals Timer 2-->
<script type="text/javascript">
   var dthen2 = new Date("05/21/26 11:59:00 PM");
   start = "08/04/15 03:02:11 AM";
   start_date = Date.parse(start);
   var dnow2 = new Date(start_date);
   if(CountStepper>0)
       ddiff= new Date((dnow2)-(dthen2));
   else
       ddiff = new Date((dthen2)-(dnow2));
   gsecs2 = Math.floor(ddiff.valueOf()/1000);
   
   var iid2 = "countbox_2";
   CountBack_slider(gsecs2,"countbox_2", 2);
</script>
<!-- Hot Deals Timer 3-->
<script type="text/javascript">
   var dthen3 = new Date("05/21/33 11:59:00 PM");
   start = "08/04/15 03:02:11 AM";
   start_date = Date.parse(start);
   var dnow3 = new Date(start_date);
   if(CountStepper>0)
       ddiff= new Date((dnow3)-(dthen3));
   else
       ddiff = new Date((dthen3)-(dnow3));
   gsecs3 = Math.floor(ddiff.valueOf()/1000);
   
   var iid3 = "countbox_3";
   CountBack_slider(gsecs3,"countbox_3", 3);
</script>