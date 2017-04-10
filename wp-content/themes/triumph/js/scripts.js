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
		$('.sub-menu' ,this).toggleClass('menu-expanded');
	});



	$('.event-when--to').prev('.event-when').addClass('two-events');

// 	if ($('table').length){
// 		var column_count = $(this).find('tr')[0].cells.length;
// 		var row_count = $(this).find('tr').length;
// 		var $first_row = $(this).find('tr:first');
// 		console.log(row_count);


// 	for (i=1; i < row_count; i++){

// 		var $add_row = $(this).find('tr:nth-child('+i+')')

// 		$first_row.after($add_row);

// 		console.log (column_count);

// 	}
// }
	var maxheight = 0;

	$('.slider-content-text').each(function(){
		maxheight = $(this).height() > maxheight ? $(this).height() : maxheight;
		$(this).css('min-height',maxheight)
	});


});
