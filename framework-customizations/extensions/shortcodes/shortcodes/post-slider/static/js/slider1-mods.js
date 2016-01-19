jQuery(document).ready(function(){


	/**
	**slider prev / next arrow stuff
	*/
	function updateMinimalArrows(arrow,sliderIdentifier)
	{
		//step 1) set width of image container to 0 in case there is no image for this slide
		arrow.find(".next-preview-container" ).css("width", "0px");

		//remove any cloned images, to prevent them building up
		arrow.find(".next-img-clone" ).remove();

		//remove cloned description
		arrow.find(".next-desc-clone" ).remove();

		//find the hidden thumbnail from within the slide, duplicate it, place it in the next arrow
		sliderIdentifier.find(".slick-active:last").next().find( ".hidden-thumb img" ).clone().addClass("next-img-clone").appendTo(arrow.find(".next-preview-container" ));

		//find the hidden description from within the slide, duplicate it, place it in the next arrow
		sliderIdentifier.find(".slick-active:last").next().find( ".hidden-desc" ).clone().addClass("next-desc-clone").appendTo(arrow.find(".next-preview-container .title" ));

		//set the parent of the duplicated image to 100. This will override step 1), but only if the image has been duplicated ;)
		arrow.find(".next-img-clone" ).parent().css("width", "100px");

		//repeat for previous
		arrow.find(".prev-preview-container" ).css("width", "0px");
		arrow.find(".prev-img-clone" ).remove();
		arrow.find(".prev-desc-clone" ).remove();
		sliderIdentifier.find(".slick-active:first").prev().find( ".hidden-thumb img" ).clone().addClass("prev-img-clone").appendTo(arrow.find(".prev-preview-container" ));
		sliderIdentifier.find(".slick-active:first").prev().find( ".hidden-desc" ).clone().addClass("prev-desc-clone").appendTo(arrow.find(".prev-preview-container .title" ));
		arrow.find(".prev-img-clone" ).parent().css("width", "100px");
	}

	jQuery(".featured-post-slider-next").each( function() {
		var arrow=jQuery(this).parent();
		var sliderContainer=jQuery(this).closest('.featured-thumbnail-slider');
		//sliderContainer.find(".slick-slider").slick('slickNext');
		updateMinimalArrows(arrow,sliderContainer); //sends the ahref arrow item
	});
	jQuery(".featured-post-slider-prev").each(function() {
		var arrow=jQuery(this).parent();
		var sliderContainer=jQuery(this).closest('.featured-thumbnail-slider');
		//sliderContainer.find(".slick-slider").slick('slickPrev');
		updateMinimalArrows(arrow,sliderContainer);
	});

	// On before slide change
	//deal with auto rotate
	jQuery(".naked-featured-slider").each( function() {
		jQuery(this).on('afterChange', function(event, slick, currentSlide, nextSlide){
			var slider=jQuery(this);
			var sliderContainer=slider.closest('.featured-thumbnail-slider');
			var arrow=sliderContainer.find(".nav-doubleflip");
			updateMinimalArrows(arrow,sliderContainer);
		});
	});

	//Initial setup
	jQuery( ".featured-post-slider-next" ).click(function() {
			var arrow=jQuery(this).parent();
			var sliderContainer=jQuery(this).parent().parent();
			sliderContainer.find(".slick-slider").slick('slickNext');
			updateMinimalArrows(arrow,sliderContainer); //sends the ahref arrow item
	});

	jQuery( ".featured-post-slider-prev" ).click(function() {
			var arrow=jQuery(this).parent();
			var sliderContainer=jQuery(this).parent().parent();
			sliderContainer.find(".slick-slider").slick('slickPrev');
			updateMinimalArrows(arrow,sliderContainer);
	});

});
