<?php
/**
 * Options for first posts slider shortcode. Grouped and reused options found in options
 * folder in root shortcodes directory
 */

if (!defined('FW')) die('Forbidden');

$options = array(

	'special notice' => array(
	    'type'  => 'html',
	    'value' => '',
	    'label' => __('Notice', 'thshpr'),
	    'html'  => 'To use the previous and next buttons for this slider you should set its section to full width.',
		'help'  => __( 'This can be done by pressing the edit (cog) icon on the top right hand of the containing section in the drag and drop pagebuilder. This icon will become visible when you hover over the section', 'thshpr' ),
	),

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

			fw_ext('shortcodes')->get_options('slider-post-elements-shared-options'), //uses a different file than regular post types because of the joined title+excerpt

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

			'opt_posts_block_number_slides' => array(
				'label'   => __( 'Number of Visible Slides', 'thshpr' ),
				'type'    => 'select',
				'value'   => '5',
				'desc'    => __( 'Please choose the number of slides to be displayed for this block','thshpr' ),
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
				),
				'help'  => __( 'This number is the number of visible posts on the screen at any one time', 'thshpr' ),
			),

			'opt_posts_block_prev_next_position'=> array(
				'label' => __( 'Previous / Next Button Vertical Position', 'thshpr' ),
				'type'  => 'text',
				'value' => '20',
				'desc'  => __( 'Please enter the vertical position of the previous and next buttons (in pixels).','unyson' ),
				'help'  => __( 'This can be changed to vertically align the buttons depending on the other options chosen', 'thshpr' ),
			),

			'opt_posts_block_buttons' =>array(
				'type'  => 'switch',
				'value' => 'Show',
				'label' => __('Show Prev / Next Buttons', 'thshpr'),
				'desc'  => __('Shows the fancy previous and next buttons. If enabled, this will require the section containing the block to be set to full width.', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),

		),
	),
);

?>
