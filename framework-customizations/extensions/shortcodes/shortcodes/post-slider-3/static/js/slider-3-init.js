jQuery('.naked-featured-slider-4').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	infinite: true,
	autoplay: false,
	autoplaySpeed: 3000,
	centerMode: false,
	variableWidth: false,
	dots: true,
	arrows:false,
	responsive: [
	{
		breakpoint: 1440,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 3000,
		centerMode: false,
		dots: true,
	}
	},
	{
		breakpoint: 992,
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
