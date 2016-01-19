<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
//	$to_disable[] = 'some_other_shortcode';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_shortcodes');


add_action( 'init', 'naked_masonry_image_setup' );
function naked_masonry_image_setup() {
   add_image_size( 'masonry', 800, 500, false );
}

add_filter('next_posts_link_attributes', 'naked_posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'naked_posts_link_attributes_prev');

function naked_posts_link_attributes_next() {
    return 'class="next-post"';
}
function naked_posts_link_attributes_prev() {
    return 'class="prev-post"';
}

/**
 * Disables built in Unyson shortcodes
 */
/*
function _filter_theme_disable_default_shortcodes($to_disable) {
    $to_disable[] = 'accordion';
    $to_disable[] = 'button';

    return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_theme_disable_default_shortcodes');
*/
