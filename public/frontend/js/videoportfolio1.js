var $videoitem = $('.video-item').imagesLoaded(function () {
	$videoitem.isotope({
		itemSelector: '.video',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-sizer'
		}
	});

});
$('.video-portfolio ul button').click(function () {
	$('.video-portfolio ul button').removeClass('active');
	$(this).addClass('active');

	var selector = $(this).attr('data-filter');
	$('.video-item').isotope({
		filter: selector
	});
	return false;
});

// $(window).load(function () {
// 	var $videoitem = $('.video-item').isotope({
// 		itemSelector: '.video',
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
// 	var $videoitem = $('.video-item').isotope({
// 		itemSelector: '.video',
// 		layoutMode: 'masonry'
// 	});

// 	$grid.imagesLoaded().progress(function () {
// 		setTimeout(function () {
// 			$grid.isotope('layout');
// 		}, 200);
// 	});
// });
