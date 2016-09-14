jQuery(function($){

	$(document).ready(function(){

		$(".toggle_container").hide();

		$(".toggle-trigger").click(function(){

			$(this).toggleClass("active").next().slideToggle("normal");

		return false; //Prevent the browser jump to the link anchor

		});

	});

});