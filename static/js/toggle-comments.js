jQuery(document).on('ready', function() {

  // The script
  jQuery( "#comments-toggle-header" ).click(function() {
    jQuery( "#comments-toggle-contents" ).slideToggle( "slow", function() {
      // Animation complete.
    });
  });
});
