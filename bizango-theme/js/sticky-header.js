$(window).scroll(function() {
	
if($(window).width() > 1149){
	if ($(this).scrollTop() > 1){  
	    $('#hero_frame').addClass("sticky");
	    $('#logo').css("background", "url(/wp-content/themes/bizango-theme/images/small-logo.gif) no-repeat"); 
	  }
	else{
	    $('#hero_frame').removeClass("sticky");
	    $('#logo').css("background", "url(/wp-content/themes/bizango-theme/images/logo.gif) no-repeat"); 

	  }
}
	

});