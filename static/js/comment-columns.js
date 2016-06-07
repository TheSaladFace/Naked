jQuery(document).on('ready', function() {

    if( jQuery('.comment-form-author').length ) {


        jQuery('.comment-form').prepend( '<div class="fw-row comment-row">' );
        jQuery('.comment-row').prepend( '<div class="fw-col-sm-6 comment-left" />' );
  		jQuery('.comment-row').prepend( '<div class="fw-col-sm-6 comment-right" />' );

        jQuery('.comment-form-comment').prependTo( '.comment-form' );
        jQuery('.comment-notes').prependTo( '.comment-form' );

        jQuery('.comment-form-url').appendTo( '.comment-form' );

        jQuery('.form-submit').appendTo( '.comment-form' );
  		jQuery('.comment-form-author').appendTo( '.comment-left' );
  		jQuery('.comment-form-email').appendTo( '.comment-right' );

        // move reply link outside h3 title so proper font can be applied
        jQuery( "#cancel-comment-reply-link" ).insertAfter( jQuery( ".comment-reply-title" ) );
        jQuery( "#comments ol.comment-list .comment .comment-body" ).last().css( "border-bottom", "0px" );




  	}

});
