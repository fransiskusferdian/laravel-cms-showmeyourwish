var $videoitem = $('.video-item').imagesLoaded(function () {
	$videoitem.isotope({
		itemSelector: '.video',
		layoutMode: 'fitRows',
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
