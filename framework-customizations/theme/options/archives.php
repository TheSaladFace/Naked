<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'categories_general_options_box' => array(
		'type' => 'box',
		'title' => __('General Options', 'thshpr'),
		'options' => array(

			'opt_show_progress_indicator' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Progress Indicator', 'thshpr'),
				'help' => __( 'This will display a thin bar which reveals the progress of the category being read by the user', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),
			'opt_sidebar_type' => array(
				'label' => __( 'Sidebar Type', 'thshpr' ),
				'type' => 'short-select',
				'value' => 'right',
				'desc' => __( 'Please select the sidebar type you wish to use for this category','thshpr'),
				'choices' => array(
					'right' => 'right',
					'left' => 'left',
					'none' => 'none',
				),
			),
			'opt_sticky_sidebar' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Make Sidebar Sticky', 'thshpr'),
				'help' => __( 'This will make the sidebars sticky on scrolling', 'thshpr'  ),
				'desc' => __( 'Note: this requires the "Make Header Sticky on Scroll" set to sticky in customizer -> header','thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Sticky', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Normal', 'thshpr'),
				),
			),
			'opt_left_right_padding' => array(
				'label' => __( 'Left / Right Padding (if no sidebar above) - large screens only', 'thshpr' ),
				'type'  => 'text',
				'value' => '150',
				'desc'  => __( 'Narrows the body content when only one column is chosen.', 'thshpr' ),
			),

			'opt_posts_block_ordering' => array(
				'label' => __( 'Order Method', 'thshpr' ),
				'type' => 'short-select',
				'value' => 'date',
				'desc' => __( 'Please choose how you wish the posts to be ordered.','thshpr' ),
				'choices' => array(
					'date' => 'date',
					'rand' => 'random',
					'name' => 'name',
					'author' => 'author',
					'parent' => 'parent',
				),
				'help' =>__( 'Determines the order which the posts will be displayed in the archive output', 'thshpr'  ),
			),

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
				'desc' => __( 'Please select the layout you wish to use for the posts (not entire page)','thshpr'),
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

	'categories_title_options_box' => array(
		'type' => 'box',
		'title' => __('Title Options', 'thshpr'),
		'options' => array(
			'opt_categories_title_functionality'=> array(
				'type' =>'addable-box',
				'label' => __('Add Title Elements', 'thshpr'),
				'value' => array(
			    array(
			        'opt_archive_title_rows' => 'Title',
			    ),
					array(
						'opt_archive_title_rows' => 'Divider',
			        ),
					array(
						'opt_archive_title_rows' => 'Breadcrumbs',
			        ),
				),
				'template' => '{{- opt_archive_title_rows }}',
				'popup-title' => null,
				'help' => __( 'Add and order (drag and drop) the title elements to be displayed for the archive.', 'thshpr'  ),
				'size' =>'small', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'box-options' => array(
					'opt_archive_title_rows' => array(
						'label' => __( 'Row Type', 'thshpr' ),
						'type' => 'select',
						'choices' => array(
							'Title' => 'Title',
							'Description' => 'Description',
							'Share Boxes' => 'Share Boxes',
							'Breadcrumbs' => 'Breadcrumbs',
							'Divider' => 'Divider',
							'Spacer 50px' => 'Spacer 50px',
							'Spacer 40px' => 'Spacer 40px',
							'Spacer 30px' => 'Spacer 30px',
							'Spacer 20px' => 'Spacer 20px',
							'Spacer 10px' => 'Spacer 10px',
							'Spacer 5px' => 'Spacer 5px',
							'Spacer 2px' => 'Spacer 2px',
							'Spacer 1px' => 'Spacer 1px',
						),
					),
				),
			),
			'opt_categories_shift_amount' => array(
				'label' => __( 'Vertical Offset Title Area Amount', 'thshpr' ),
				'type'  => 'text',
				'value' => '0',
				'desc'  => __( 'Enter the height to raise the title vertically in pixels. This should only be used when the full width header (parallax) image is enabled. This provides an overlap on the image.', 'thshpr' ),
			),
			'opt_categories_breadcrumbs_shift_amount' => array(
				'label' => __( 'Vertical Offset Breadcrumbs', 'thshpr' ),
				'type'  => 'text',
				'value' => '0',
				'desc'  => __( 'If you have the breadcrumbs first in the title elements list you may wish to shift it upwards slightly', 'thshpr' ),
			),
			'opt_categories_title_bottom_margin_amount' => array(
				'label' => __( 'title Bottom Margin Amount', 'thshpr' ),
				'type'  => 'text',
				'value' => '40',
				'desc'  => __( 'Enter the size of the title bottom margin in pixels. This should be used if you have used a large vertical offset above and wish to shift the rest of the content down.', 'thshpr' ),
			),
			'opt_categories_breadcrumbs_homepage_title' => array(
				'label' => __( 'Homepage Title', 'thshpr' ),
				'type'  => 'text',
				'value' => 'Home',
				'desc'  => __( 'Enter the text you wish to use for the home page in the breadcrumbs', 'thshpr' ),
			),
		),
	),

	'opt_categories_title_divider_type' => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-dotted',
	    'label' => __('Divider Type', 'thshpr'),
	    'choices' => array(
		'divider-stripes' => fw_locate_theme_path_uri('/static/img/divider-stripes.png'),
		'divider-thin-light' =>fw_locate_theme_path_uri('/static/img/divider-thin-light.png'),
		'divider-thin-dark' => fw_locate_theme_path_uri('/static/img/divider-thin-dark.png'),
		'divider-thick-dark' => fw_locate_theme_path_uri('/static/img/divider-thick-dark.png'),
		'divider-dotted' => fw_locate_theme_path_uri('/static/img/divider-dotted.png'),
	    ),
		'help' => __( 'Only needed if the divider element is selected above', 'thshpr'  ),
	    'blank' => false, // (optional) if true, images can be deselected
	),

	/*fullscreen header image options*/
	'categories_fullscreen_header_image_box' => array(
		'type' => 'box',
		'title' => __('Full Width Header Image Options', 'thshpr'),
		'options' => array(

			'opt_categories_header_parallax_image' => array(
				'label' => __('Optional Full Width Parallax Image', 'thshpr'),
				'desc' => __('Please select the optional full width parallax image', 'thshpr'),
				'help' =>__( 'Only required if the "Show Full Width Header (Parallax) Image" is switched on either in the customiser or below if override options is selected', 'thshpr'  ),
				'type' => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),

			'opt_categories_header_fade_image_scroll' =>array(
				'type'  => 'switch',
				'value' => 'Hide',
				'label' => __('Fade Full Width Header (Parallax) Image on Scroll', 'thshpr'),
				'desc'  => __('Fade the full width header (parallax) image out when the user scrolls down, and fade it back in when they scroll up', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Fade', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Dont Fade', 'thshpr'),
				),
			),
			'opt_categories_background_color' => array(
				'label' => __('Background Color', 'thshpr'),
				'desc' => __('Please select the background color', 'thshpr'),
				'type' => 'color-picker',
			),
			'opt_categories_background_position' => array(
				'label' => __( 'Background Image Position', 'thshpr' ),
				'type' => 'select',
				'value' => 'left top',
				'desc' => __( 'Please select the background image position','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/pr_background-position.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'left top' => 'left top',
					'left center' => 'left center',
					'left bottom' => 'left bottom',
					'right top' => 'right top',
					'right center' => 'right center',
					'right bottom' => 'right bottom',
					'center top' => 'center top',
					'center center' => 'center center',
					'center bottom' => 'center bottom',
				),
			),
			'opt_categories_background_repeat'=> array(
				'label'   => __( 'Background Image Repeat', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'no-repeat',
				'desc'    => __( 'Please select the background image repeat','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/pr_background-repeat.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y',
					'no-repeat' => 'no-repeat',
				),
			),
			'opt_categories_background_size' => array(
				'label'   => __( 'Background Size', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'cover',
				'desc'    => __( 'Please select the background image repeat, note this may effectively override the above two options','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/css3_pr_background-size.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'auto' => 'auto',
					'length' => 'length',
					'percentage' => 'percentage',
					'cover' => 'cover',
					'contain' => 'contain',
				),
			),
			'opt_categories_background_parallax_ratio' =>array(
				'type'  => 'text',
				'value' => '',
				'label' => __('Background Parallax Ratio', 'thshpr'),
				'desc'  => __('Enter the number for the background parallax movement on scroll (leave empty to disable). Set this between 0 and 1 to ensure image coverage', 'thshpr'),
			),
			'opt_categories_header_image_height' => array(
				'label' => __( 'Full Width Header (Parallax) Image Area Height', 'thshpr' ),
				'type'  => 'text',
				'value' => '200',
				'desc'  => __( 'Enter the height of the full width header (parallax) image area height in pixels', 'thshpr' ),
				'help' =>__( 'This needs to be smaller than the image height. Because this is applied as a background image.', 'thshpr'  ),
			),
		),
	),

	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'box',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'box',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('image-shared-options'),

		),
	),

	/* pagination options */
	'pagination_options_box' => array(
    	'type' => 'box',
		'title' => __('Pagination', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('pagination-shared-options'),

		),
	),


);
