//CAROUSEL
var $item = $('.carousel-item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function () {
	var $src = $(this).attr('src');
	var $color = $(this).attr('data-color');
	$(this).parent().css({
		'background-image': 'url(' + $src + ')',
		'background-color': $color
	});
	$(this).remove();
});

$(window).on('resize', function () {
	$wHeight = $(window).height();
	$item.height($wHeight);
});

$('.carousel').carousel({
	interval: 6000,
	pause: "false"
});

//SCROLL SPY
// event pada saat link di klik
$('.scroller').click(function (e) {

	// ambil isi href
	var tujuan = $(this).attr('href');
	// tangkap elemen ybs
	var elemenTujuan = $(tujuan);
	console.log(elemenTujuan);
	// pindahkan scroll
	$('html, body').animate({
		scrollTop: elemenTujuan.offset().top - 65
	}, 1250, 'easeInOutExpo');

	e.preventDefault();

});

//PHOTO ITEM
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

//VIDEO ITEM
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
