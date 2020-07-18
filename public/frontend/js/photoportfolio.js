var $photoitem = $('.photo-item').imagesLoaded(function () {
	$photoitem.isotope({
		itemSelector: '.photo',
		layoutMode: 'fitRows',
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
