<?php
/**
 * Options for second (full screen) posts slider shortcode. Grouped and reused options found in options
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

			'opt_posts_block_initial'=> array(
				'type'  => 'switch',
				'value' => 'Show',
				'label' => __('Show Initial Slide Info Rows', 'thshpr'),
				'desc'  => __('Displays the initial slide info rows', 'thshpr'),
				'left-choice' => array(
				'value' => '1',
				'label' => __('Show', 'fw'),
				),
				'right-choice' => array(
				'value' => '0',
				'label' => __('Hide', 'fw'),
				),
				'help'  => __( 'This slider containes two sets of post elements. This lets you hide the default and only use the hover (below)', 'thshpr' ),
			),

			'opt_posts_block_functionality_hover' => array(
				'type' => 'addable-box',
				'label' => __('Add Hover Post Elements', 'thshpr'),
				'desc'  => __('Add / remove / reorder elements to be displayed on thumbnail hover in each post', 'thshpr'),
				'template' => '{{- opt_posts_block_rows }}',
				'popup-title' => null,
				'size' => 'small', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'box-options' => array(
					'opt_posts_block_rows' => array(
						'label'   => __( 'Row Type', 'thshpr' ),
						'type'    => 'select',
						'choices' => array(
							'Title' => 'Title',
							'Title+Excerpt' => 'Title+Excerpt',
							'Categories' => 'Categories',
							'Tags' => 'Tags',
							'Read More' => 'Read More',
							'Date' => 'Date',
							'Author' => 'Author',
							'Comments' => 'Comments',
							'Date+Comments' => 'Date+Comments',
							'Comments+Author' => 'Comments+Author',
							'Date+Author' => 'Date+Author',
							'Date+Comments+Author' => 'Date+Comments+Author',
							'Share Boxes' => 'Share Boxes',
						),
					),
				),
				'help'  => __( 'These are the post elements for the hover state on each thumbnail', 'thshpr' ),
			),

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
