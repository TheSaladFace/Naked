<?php if (!defined('FW')) die('Forbidden');

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

	/* pagination options */
	'pagination_options_box' => array(
    	'type' => 'tab',
		'title' => __('Pagination', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('pagination-shared-options'),

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

		),
	),

);

?>
