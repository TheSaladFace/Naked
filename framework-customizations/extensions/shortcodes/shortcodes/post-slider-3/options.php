<?php
/**
 * Options for third posts slider shortcode. Grouped and reused options found in options
 * folder in root shortcodes directory
 */

if (!defined('FW')) die('Forbidden');

$options = array(

	/* options that all posts blocks + posts sliders use */
	'general_options_box' => array(
    	'type' => 'tab',
		'title' => __('General', 'thshpr'),
    	'options' => array(

        	fw()->theme->get_options('general-shared-options'),

	    ),
	),

	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'tab',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('slider-post-elements-shared-options'), //uses a different file than regular post types because of the joined title+excerpt

		),
	),

	/* post-elements options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('image-shared-options'),

		),
	),

);

?>
