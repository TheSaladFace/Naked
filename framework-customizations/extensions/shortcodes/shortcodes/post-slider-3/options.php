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

	/* options specific to this shortcode */
	'other_options_box' => array(
    	'type' => 'tab',
		'title' => __('Other', 'thshpr'),
    	'options' => array(

			'opt_posts_block_auto_rotate_speed'=> array(
				'label' => __( 'Autorotate Speed', 'thshpr' ),
				'type'  => 'text',
				'value' => '0',
				'desc'  => __( 'Please enter speed at which you want the slides to autorotate in seconds (leave at 0 to disable)','unyson' ),
			),

		),
	),

);

?>
