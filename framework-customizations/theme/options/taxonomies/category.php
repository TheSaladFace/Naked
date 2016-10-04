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
				'value' => 'Show',
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
							'Share Boxes' => 'Share Boxes',
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

			'opt_subtitle' => array(
				'label' => __( 'Sub Title', 'thshpr' ),
				'type'  => 'textarea',
				'value' => '',
				'desc'  => __( 'An optional field that can be displayed providing more information about the post', 'thshpr' ),
				'help' =>__( 'Only required if the subtitle element is added above', 'thshpr'  ),
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
				'value' => '120',
				'desc'  => __( 'Enter the height to raise the title vertically in pixels. This should only be used when the full width header (parallax) image is enabled. This provides an overlap on the image.', 'thshpr' ),
			),
			'opt_title_bottom_margin_amount' => array(
				'label' => __( 'title Bottom Margin Amount', 'thshpr' ),
				'type'  => 'text',
				'value' => '40',
				'desc'  => __( 'Enter the size of the title bottom margin in pixels. This should be used if you have used a large vertical offset above and wish to shift the rest of the content down.', 'thshpr' ),
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
				'value' => 'Hide',
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
			fw()->theme->get_options('background-shared-options'),
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
