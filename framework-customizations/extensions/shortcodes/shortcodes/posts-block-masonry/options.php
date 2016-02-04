<?php
/**
 * Options for posts block masonry shortcode. Grouped and reused options found in options
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

			fw()->theme->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('image-shared-options'),

		),
	),

	/* pagination options */
	'pagination_options_box' => array(
    	'type' => 'tab',
		'title' => __('Pagination', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('pagination-shared-options'),

		),
	),

	/* options specific to this shortcode */
	'other_options_box' => array(
    	'type' => 'tab',
		'title' => __('Other', 'thshpr'),
    	'options' => array(

			'opt_posts_block_columns' => array(
				'label'   => __( 'Number of Columns', 'thshpr' ),
				'type'    => 'short-select',
				'value'   => '3',
				'desc'    => __( 'Please select how many columns for this posts block','thshpr' ),
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
			),
			'opt_posts_block_image_size' => array(
				'label'   => __( 'Image Size', 'thshpr' ),
				'type'    => 'short-select',
				'value'   => 'large',
				'help' => __( 'This size can be adjusted in settings -> media ', 'thshpr'  ),
				'desc'    => __( 'Please select which WordPress image size you wish to use for the images in this posts block','thshpr' ),
				'choices' => array(
					'medium' => 'medium',
					'large' => 'large',
				),
			),

		),
	),

);

?>
