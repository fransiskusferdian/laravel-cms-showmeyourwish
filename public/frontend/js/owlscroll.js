 var owl = $('.owl-carousel');
 $('.owl-carousel').owlCarousel({
 	margin: 10,
 	lazyLoad: true,
 	loop: true,
 	autowidth: true,
 	responsiveClass: true,
 	responsive: {
 		0: {
 			items: 1,
 			nav: true,
 			dots: false
 		},
 		600: {
 			items: 3,
 			nav: false
 		},
 		1000: {
 			items: 4,
 			nav: true,
 			loop: false
 		}
 	}
 });

 owl.on('mousewheel', '.owl-stage', function (e) {
 	if (e.deltaY > 0) {
 		owl.trigger('next.owl');
 	} else {
 		owl.trigger('prev.owl');
 	}
 	e.preventDefault();
 });
