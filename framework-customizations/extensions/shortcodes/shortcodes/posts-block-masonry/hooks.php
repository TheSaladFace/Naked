<?php if (!defined('FW')) die('Forbidden');

/**
  * Creates an image for the masonry shortcode
  */
add_action( 'init', 'thshpr_masonry_image_setup' );
function thshpr_masonry_image_setup()
{
	add_image_size( 'masonry', 800, 500, false );
}

?>
