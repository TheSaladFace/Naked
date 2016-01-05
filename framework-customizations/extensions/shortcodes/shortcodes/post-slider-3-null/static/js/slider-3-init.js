jQuery('.naked-featured-slider-3').slick({
	slidesToShow: 2,
	slidesToScroll: 1,
	infinite: true,
	autoplay: false,
	autoplaySpeed: 3000,
	centerMode: false,
	variableWidth: false,
	dots: false,
	prevArrow: '<button type="button" data-role="none" class="slick-prev"><i class="icon-left-open-big"></i></button>',
	nextArrow: '<button type="button" data-role="none" class="slick-next"><i class="icon-right-open-big"></i></button>',
	responsive: [
	{
		breakpoint: 1440,
		settings: {
		slidesToShow: 2,
		slidesToScroll: 1,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
	}
	},
	{
		breakpoint: 992,
		settings: {
		slidesToShow: 2,
		slidesToScroll: 1,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
	}
	},
	{
		breakpoint: 768,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
	}
	},
	{
		breakpoint: 560,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
	}
	}
	]
});
