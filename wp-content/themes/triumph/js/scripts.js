$(document).ready(function(){



	$('#menu-toggle').click(function(){
		$('.mobile-nav').toggleClass('expanded');
		$(this).toggleClass('expanded');
	})


	if (screen.width > 780){
		if ( $('.entry-content')) {
			$('.post-thumbnail').siblings('.entry-content').css('max-width','72.5%');
			
		}};
		

	$('.menu-item-has-children').click(function(){

		// $('.sub-menu').slideToggle('fast');
		$('.sub-menu').toggleClass('menu-expanded');
	});


});