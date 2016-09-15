jQuery(function($){

	$(document).ready(function(){
		var $expanded = $('.expanded');
		var $more = $(".more");
		var $less = $(".less");

		$expanded.hide();

		$more.click(function(){
		    $expanded.show();
		    $more.hide();

		});
		$less.click(function(){
		    $expanded.hide();
		    $more.show();

		});


	});

});