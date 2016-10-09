<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'general_options_box' => array(
		'type' => 'box',
		'title' => __('General Options', 'thshpr'),
		'options' => array(

			'opt_show_progress_indicator' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Article Progress Indicator', 'thshpr'),
				'help' => __( 'This will display a thin bar which reveals the progress of the article being read by the user', 'thshpr'  ),
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
				'desc' => __( 'Please select the sidebar you wish to use for this post','thshpr'),
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

			'opt_show_fancy_prev_next' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Fancy Prev / Next Buttons', 'thshpr'),
				'help' => __( 'This will show the fancy prev and next buttons that stick to the edges of the screen', 'thshpr'  ),
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

	/*title options box*/
	'title_options_box' => array(
		'type' => 'box',
		'title' => __('Title Options', 'thshpr'),
		'options' => array(
			'opt_single_title_functionality'=> array(
				'type' =>'addable-box',
				'label' => __('Add Title Elements', 'thshpr'),
				'value' => array(
			        array(
			            'opt_single_title_rows' => 'Title',
			        ),
					array(
						'opt_single_title_rows' => 'Spacer 10px',
			        ),
					array(
						'opt_single_title_rows' => 'Spacer 5px',
			        ),
					array(
						'opt_single_title_rows' => 'Divider',
			        ),
					array(
						'opt_single_title_rows' => 'Subtitle',
			        ),
					array(
						'opt_single_title_rows' => 'Divider',
			        ),
					array(
						'opt_single_title_rows' => 'Date+Comments+Author',
			        ),
					array(
						'opt_single_title_rows' => 'Divider',
			        ),
					array(
						'opt_single_title_rows' => 'Tags',
			        ),
					array(
						'opt_single_title_rows' => 'Spacer 20px',
			        ),
					array(
						'opt_featured_image' => 'Featured Image',
			        ),
			    ),
				'template' => '{{- opt_single_title_rows }}',
				'popup-title' => null,
				'help' => __( 'Add and order (drag and drop) the title elements to be displayed for this post.', 'thshpr'  ),
				'size' =>'small', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'box-options' => array(
					'opt_single_title_rows' => array(
						'label' => __( 'Row Type', 'thshpr' ),
						'type' => 'select',
						'choices' => array(
							'Title' => 'Title',
							'Subtitle' => 'Subtitle',
							'Featured Image' => 'Featured Image',
							'Categories' => 'Categories',
							'Tags' => 'Tags',
							'Date' => 'Date',
							'Author' => 'Author',
							'Comments' => 'Comments',
							'Date+Comments' => 'Date+Comments',
							'Comments+Author' => 'Comments+Author',
							'Date+Author' => 'Date+Author',
							'Date+Comments+Author' => 'Date+Comments+Author',
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

			'opt_single_title_number_categories' => array(
				'label' => __( 'Number of Categories / Tags', 'thshpr' ),
				'type' => 'short-select',
				'value' => '20',
				'help' => __( 'Please choose the maximum number of categories / tags you wish to display in this title area. Only needed if category or tag meta elements are selected above', 'thshpr'  ),
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
					'9' => '9',
					'10' => '10',
					'11' => '11',
					'12' => '12',
					'13' => '13',
					'14' => '14',
					'15' => '15',
					'16' => '16',
					'17' => '17',
					'18' => '18',
					'19' => '19',
					'20' => '20',
				),
			),

			'opt_single_title_show_author_image' =>array(
				'type'  => 'switch',
				'value' => 'Show',
				'label' => __('Show Image for Author', 'thshpr'),
				'help' => __( 'This only applies if the author element is selected above', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),

			'opt_single_title_divider_type' => array(
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
			'opt_title_shift_amount' => array(
				'label' => __( 'Vertical Offset Title Area Amount', 'thshpr' ),
				'type'  => 'text',
				'value' => '0',
				'desc'  => __( 'Enter the height to raise the title vertically in pixels. This should only be used when the full width header (parallax) image is enabled. This provides an overlap on the image.', 'thshpr' ),
			),
			'opt_breadcrumbs_shift_amount' => array(
				'label' => __( 'Vertical Offset Breadcrumbs', 'thshpr' ),
				'type'  => 'text',
				'value' => '0',
				'desc'  => __( 'If you have the breadcrumbs first in the title elements list you may wish to shift it upwards slightly', 'thshpr' ),
			),
			'opt_breadcrumbs_homepage_title' => array(
				'label' => __( 'Homepage Title', 'thshpr' ),
				'type'  => 'text',
				'value' => 'Home',
				'desc'  => __( 'Enter the text you wish to use for the home page in the breadcrumbs', 'thshpr' ),
			),
			'opt_title_bottom_margin_amount' => array(
				'label' => __( 'title Bottom Margin Amount', 'thshpr' ),
				'type'  => 'text',
				'value' => '40',
				'desc'  => __( 'Enter the size of the title bottom margin in pixels. This should be used if you have used a large vertical offset above and wish to shift the rest of the content down.', 'thshpr' ),
			),

		),
	),

	/*general images options box*/
	'general_images_options_box' => array(
		'type' => 'box',
		'title' => __('General Image Options', 'thshpr'),
		'options' => array(

			'opt_offset_images' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Left / Right Offset Images', 'thshpr'),
				'desc' => __( 'This will offset mages slightly outside the flow of text (left aligned, right aligned and featured images).','thshpr' ),
				'help' => __( 'The offset will only apply at higher resolutions, and will be intelligently automatically applied depending on sidebar status.', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Offset', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('No Offset', 'thshpr'),
				),
			),

			'opt_left_aligned_image_max_width' => array(
				'label' => __( 'Left Aligned Embedded Image Width', 'thshpr' ),
				'type' => 'text',
				'value' => '400',
				'desc' => __( 'Enter the left aligned desktop sized embedded image width in pixels. Please use "Small Responsive" size image when embedding. Image ratio will be maintained.','thshpr' ),
				'help' =>__( 'The preset Small and Large Responsive sizes will be wide enough to fill the screen on smaller devices', 'thshpr'  ),
			),

			'opt_right_aligned_image_max_width' => array(
				'label' => __( 'Right Aligned Embedded Image Width', 'thshpr' ),
				'type' => 'text',
				'value' => '400',
				'desc' => __( 'Enter the right aligned desktop sized embedded image width in pixels. Please use "Small Responsive" size image when embedding. Image ratio will be maintained.','thshpr' ),
				'help' =>__( 'The preset Small and Large Responsive sizes will be wide enough to fill the screen on smaller devices', 'thshpr'  ),
			),

			'opt_center_aligned_image_max_width' => array(
				'label' => __( 'Center Aligned Embedded Image Width', 'thshpr' ),
				'type' => 'text',
				'value' => '1200',
				'desc' => __( 'Enter the center aligned desktop sized embedded image width in pixels. Please use "Small Responsive" or "Large Responsive" size image when embedding (the latter if you want it to fill the editor area in a single column post). Image ratio will be maintained.','thshpr' ),
				'help' =>__( 'The preset Small and Large Responsive sizes will be wide enough to fill the screen on smaller devices', 'thshpr'  ),
			),

			'opt_non_aligned_image_max_width' => array(
				'label' => __( 'No Alignment Image Maximum Image Width', 'thshpr' ),
				'type' => 'text',
				'value' => '400',
				'desc' => __( 'Enter the no alignment desktop sized embedded image width in pixels. Please use "Small Responsive" or "Large Responsive" size image when embedding (the latter if you want it to fill the editor area). Image ratio will be maintained.','thshpr' ),
				'help' =>__( 'The preset Small and Large Responsive sizes will be wide enough to fill the screen on smaller devices', 'thshpr'  ),
			),

		),


	),




	/*featured image options*/
	'featured_image_box' => array(
		'type' => 'box',
		'title' => __('Featured Image Options', 'thshpr'),
		'options' => array(

			'opt_featured_image_show' => array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show or Hide Featured Image', 'thshpr'),
				'desc'  => __('Show or hide the featured image', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),

			'opt_featured_image_link_to_full' => array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Link to Fullsize Featured Image', 'thshpr'),
				'desc'  => __('Link to the fullsize featured image via a lightbox', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('No', 'thshpr'),
				),
			),

			'opt_featured_image_max_width' => array(
				'label' => __( 'Featured Maximum Image Width', 'thshpr' ),
				'type' => 'text',
				'value' => '1120',
				'desc' => __( 'Enter the featured image maximum width in pixels. This needs to cover the entire width at lower resolutions, either 768 (for 2 columns) or 1200 for single columns','thshpr' ),
			),

			'opt_featured_image_ratio' => array(
				'label' => __( 'Featured Image Ratio', 'thshpr' ),
				'type' => 'select',
				'value' => '0.5625',
				'desc' => __( 'Please select the ratio of the featured image for this post. The above maximum width is used and the height is automatically calculated. You must ensure the image is of sufficient original size.','thshpr'),
				'choices' => array(
					'0.25' => '4 to 1',
					'0.33' => '3 to 1',
					'0.4285714285714286' => '2.33 to 1 (21:9)',
					'0.5' => '2 to 1',
					'0.5625' => '1.7 to 1 (16:9)',
					'0.6666666666666667' => '1.5 to 1 (3:2)',
					'0.75' => '1.25 to 1 (4:3)',
					'1.0' => '1 to 1',
					'1.333333333333333' => '0.75 to 1 (3:4)',
					'1.5' => '0.66 to 1 (2:3)',
					'1.777777777777778' => '0.56 to 1 (9:16)',
					'2.0' => '0.5 to 1',
				),
				'help' => __('This is the ratio of width to height of the featured image', 'thshpr'),
			),

		),
	),





	/*fullscreen header image options*/

	'fullscreen_header_image_box' => array(
		'type' => 'box',
		'title' => __('Full Width Header (Parallax) Image Options', 'thshpr'),
		'options' => array(

			'opt_header_show_image' =>array(
				'type'  => 'switch',
				'value' => '0',
				'label' => __('Show Full Width Header (Parallax) Image', 'thshpr'),
				'desc'  => __('Show Full Width Header (Parallax) Image', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),


			'opt_header_fade_image_scroll' =>array(
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
			'opt_background_color' => array(
				'label' => __('Background Color', 'thshpr'),
				'desc' => __('Please select the background color', 'thshpr'),
				'type' => 'color-picker',
			),
			'opt_background_position' => array(
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
			'opt_background_repeat'=> array(
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
			'opt_background_size' => array(
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
			'opt_background_parallax_ratio' =>array(
				'type'  => 'text',
				'value' => '',
				'label' => __('Background Parallax Ratio', 'thshpr'),
				'desc'  => __('Enter the number for the background parallax movement on scroll (leave empty to disable). Set this between 0 and 1 to ensure image coverage', 'thshpr'),
			),
			'opt_header_image_height' => array(
				'label' => __( 'Full Width Header (Parallax) Image Area Height', 'thshpr' ),
				'type'  => 'text',
				'value' => '200',
				'desc'  => __( 'Enter the height of the full width header (parallax) image area height in pixels', 'thshpr' ),
				'help' =>__( 'This needs to be smaller than the image height. Because this is applied as a background image.', 'thshpr'  ),
			),
		),
	),
);
