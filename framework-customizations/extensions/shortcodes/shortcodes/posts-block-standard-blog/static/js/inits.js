jQuery( document ).ready(function() {
  	  // Shift the greyed pagination prev and next into the pagination div
  	 
  	  jQuery( ".page-nav" ).each( function( index, element ){
  	  		  var navigation=jQuery( this ).find( ".nav-links" );
  	  		  var next=jQuery( this ).find('.page-numbers-faded.next');
  	  		  var prev=jQuery( this ).find('.page-numbers-faded.prev');
  	  		  
  	  		navigation.prepend( prev );
  	  		navigation.append( next );
    	  });
    	  
	//jQuery( ".nav-links" ).prepend( jQuery(".page-numbers-faded.prev") );
	//jQuery( ".nav-links" ).append( jQuery(".page-numbers-faded.next") );
	     jQuery.strapPoint.on('xs', function () {
		 jQuery('.eq-height').matchHeight('remove');
	     });
	
	jQuery.strapPoint.on('sm', function () {
		 jQuery('.eq-height').matchHeight('remove');
	     });
	 jQuery.strapPoint.on('md', function () {
		 jQuery('.eq-height').matchHeight();
	     });
		
	  jQuery.strapPoint.on('lg', function () {
		  jQuery('.eq-height').matchHeight();
		});
});

jQuery(window).load(function() {
		
	   
	   jQuery('.eq-height').matchHeight();
	  
	 
      
});

