<?php
/**
 * Options for standard blog posts block shortcode. Grouped and reused options found in options
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

			'opt_posts_block_vertical_align_columns'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Vertical Align Columns', 'thshpr'),
				'desc'  => __('Vertically align the two columns', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
				'help' =>__( 'This is an optional divider between each post', 'thshpr'  ),
			),

			'opt_posts_block_right_cell_height' => array(
				'label' => __( 'Right Cell Height', 'thshpr' ),
				'type' => 'text',
				'value' => '300',
				'desc' => __( 'Enter the height in pixels of the right cell (containing text, meta info etc). This is needed for vertical centering.','thshpr' ),
				'help' =>__( '', 'thshpr'  ),
			),

			'opt_posts_block_show_divider'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Show Divider', 'thshpr'),
				'desc'  => __('Show the divider between posts', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
				'help' =>__( 'This is an optional divider between each post', 'thshpr'  ),
			),

			'opt_posts_block_layout' => array(
				'label' => __( 'Layout', 'thshpr' ),
				'type' => 'select',
				'value' => 'image-left-50',
				'desc' => __( 'Please select the layout you wish to use for this posts block','thshpr'),
				'choices' => array(
					'image-left-50' => 'Image Left 1/2 Width',
					'image-left-33' => 'Image Left 1/3 Width',
					'image-right-50' => 'Image Right 1/2 Width',
					'image-right-33' => 'Image Right 1/3 Width',
					'full-width' => 'Full Width',
				),
			),


		),
	),

);
?>
