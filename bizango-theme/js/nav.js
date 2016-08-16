jQuery(document).ready(function( $ ) {
 //show or hide mobile menu on click of icon
  $(".icon").click(function(){
   	$('#mobile_nav .nav li').slideToggle();
   });

  //show or hide dropdown sub-menu on click of parent menu item
   $(".menu-item-has-children a").click(function(){
   	$('.sub-menu').css("display", "none");
   	$(this).next().slideToggle();
   });

   //Open page at the top on reload
   $(this).scrollTop(0);

});

