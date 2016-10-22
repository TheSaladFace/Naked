<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	/*fullscreen header image options*/

	'fullscreen_header_image_box' => array(
		'type' => 'box',
		'title' => __('Full Width Header (Parallax) Image Options', 'thshpr'),
		'options' => array(

			'opt_parallax_image' => array(
				'label' => __('Optional Full Width Parallax Image', 'thshpr'),
				'desc' => __('Please select the optional full width parallax image', 'thshpr'),
				'help' =>__( 'Only required if the "Show Full Width Header (Parallax) Image" is switched on either in the customiser or below if override options is selected', 'thshpr'  ),
				'type' => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
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
