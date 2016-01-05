jQuery('.naked-featured-slider').slick({
	slidesToShow: 4,
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
		breakpoint: 1200,
		settings: {
		slidesToShow: 4,
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
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: false,
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
		autoplay: false,
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
		autoplay: false,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: false,
	}
	}
	]
});
