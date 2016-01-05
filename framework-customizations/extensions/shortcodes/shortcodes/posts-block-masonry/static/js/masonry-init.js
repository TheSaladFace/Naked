jQuery( document ).ready(function() {
		var container = jQuery('.masonry-grid');
		container.imagesLoaded(function(){
			container.masonry({
			   itemSelector: '.masonry-grid-item',
			   isAnimated: true,
			   animationOptions: {
				duration: 700,
				easing: 'linear',
				queue: false
			   }
			});
		});
});

