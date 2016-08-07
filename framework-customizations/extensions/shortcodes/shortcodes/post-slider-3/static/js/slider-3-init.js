var dataSpeed=parseInt(jQuery('.featured-slider-3').attr('data-speed'));
if(dataSpeed>0)
{
	var autoRotate=true;
	var autoRotateSpeed=dataSpeed*1000;
	var pause=true;
}
else
{
	var autoRotate=false;
	var pause=false;
}

console.log(autoRotate);
jQuery('.naked-featured-slider-4').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	infinite: true,
	autoplay: autoRotate,
	autoplaySpeed: autoRotateSpeed,
	pauseOnFocus:pause,
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
