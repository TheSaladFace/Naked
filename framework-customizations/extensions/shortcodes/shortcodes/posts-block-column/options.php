<?php
/**
 * Options for posts block column shortcode. Grouped and reused options found in options
 * folder in root shortcodes directory
 */

if (!defined('FW')) die('Forbidden');

$options = array(

	/* options that all posts blocks + posts sliders use */
	'general_options_box' => array(
    	'type' => 'tab',
		'title' => __('General', 'thshpr'),
    	'options' => array(

        	fw_ext('shortcodes')->get_options('general-shared-options'),

	    ),
	),


	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'tab',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('image-shared-options'),

		),
	),

	/* options specific to this shortcode */
	'other_options_box' => array(
    	'type' => 'tab',
		'title' => __('Other', 'thshpr'),
    	'options' => array(

			'opt_posts_block_large_top'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Show Large Top Post', 'thshpr'),
				'desc'  => __('Shows a larger image at the top of the posts column)', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),

			'opt_posts_block_number_posts'=> array(
				'label' => __( 'Maximum Number of Posts Per Page', 'thshpr' ),
				'type'  => 'text',
				'value' => '10',
				'desc'  => __( 'Please enter the maximum number of posts per page','thshpr' ),
				'help'  => __( 'Enter 0 for unlimited posts if pagination is turned off', 'thshpr' ),
			),

		),
	),
);

?>
