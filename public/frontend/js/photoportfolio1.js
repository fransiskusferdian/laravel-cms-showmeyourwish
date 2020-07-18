var $photoitem = $('.photo-item').imagesLoaded(function () {
	$photoitem.isotope({
		itemSelector: '.photo',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-sizer'
		}
	});

});

$('.photo-portfolio ul button').click(function () {
	$('.photo-portfolio ul button').removeClass('active');
	$(this).addClass('active');

	var selector = $(this).attr('data-filter');
	$('.photo-item').isotope({
		filter: selector
	});
	return false;
});

// $(window).load(function () {
// 	var $photoitem = $('.photo-item').isotope({
// 		itemSelector: '.photo',
// 		percentPosition: true,
// 		masonry: {
// 			columnWidth: '.grid-sizer'
// 		}
// 	});
// 	// layout Isotope after each image loads
// 	$grid.imagesLoaded().progress(function () {
// 		$grid.isotope('layout');
// 	});
// });
// jQuery(document).ready(function ($) {
// 	var $photoitem = $('.photo-item').isotope({
// 		itemSelector: '.photo',
// 		layoutMode: 'masonry'
// 	});

// 	$grid.imagesLoaded().progress(function () {
// 		setTimeout(function () {
// 			$grid.isotope('layout');
// 		});
// 	});
// });
