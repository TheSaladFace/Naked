jQuery( document ).ready(function() {
    jQuery.stellar({
	horizontalScrolling: false,
    	verticalOffset: 40});

});

jQuery(window).scroll(function(i){
    var scrollVar = (jQuery(window).scrollTop())/3;
    jQuery('.parallax-fade').css({'opacity':( 100-scrollVar )/100});
})
