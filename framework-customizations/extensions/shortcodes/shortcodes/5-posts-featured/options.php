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
		'title' => __('Post Element ', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('post-elements-shared-options'),

		),
	),

	/* post-elements options */
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

			'opt_posts_block_featured_placement' => array(
				'label'   => __( 'Featured Post Placement', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'center',
				'desc'    => __( 'Please select the placement of the featured post','thshpr' ),
				'choices' => array(
					'left' => 'left',
					'center' => 'center',
					'right' => 'right',
				),
				'help' => __( 'The featured (larger) post can be aligned left middle or right', 'thshpr'  ),
			),
		),
	),

);

?>
