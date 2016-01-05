<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => __('Full Width', 'fw'),
		'type'         => 'switch',
	),
	'padding_top' => array(
		'label'        => __('Padding Top', 'fw'),
		'value' => 'No',
		'type'         => 'switch',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'padding_bottom' => array(
		'label'        => __('Padding Bottom', 'fw'),
		'value' => 'Yes',
		'type'         => 'switch',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'margin_top' => array(
		'label'        => __('Margin Top', 'fw'),
		'type'         => 'switch',
		'value' => 'No',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'margin_bottom' => array(
		'label'        => __('Margin Bottom', 'fw'),
		'type'         => 'switch',
		'value' => 'No',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'background_color' => array(
		'label' => __('Background Color', 'fw'),
		'desc'  => __('Please select the background color', 'fw'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => __('Background Image', 'fw'),
		'desc'    => __('Please select the background image', 'fw'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'background_position'              => array(
		'label'   => __( 'Background Image Position', 'unyson' ),
		'type'    => 'select',
		'value'   => 'left top',
		'desc'    => __( 'Please select the background image position',
			'unyson' ),
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
	'background_repeat'              => array(
		'label'   => __( 'Background Image Repeat', 'unyson' ),
		'type'    => 'select',
		'value'   => 'no-repeat',
		'desc'    => __( 'Please select the background image repeat',
			'unyson' ),
		'choices' => array(
			'repeat' => 'repeat',
			'repeat-x' => 'repeat-x',
			'repeat-y' => 'repeat-y',
			'no-repeat' => 'no-repeat',
		),
	),
	'background_size'              => array(
		'label'   => __( 'Background Size', 'unyson' ),
		'type'    => 'select',
		'value'   => 'cover',
		'desc'    => __( 'Please select the background image repeat, note this may effectively override the above two options',
			'unyson' ),
		'choices' => array(
			'auto' => 'auto',
			'length' => 'length',
			'percentage' => 'percentage',
			'cover' => 'cover',
			'contain' => 'contain',
		),
	),
	'background_parallax_ratio'              =>array(
		'type'  => 'text',
		'value' => '',
		'label' => __('Background Parallax Ratio', 'unyson'),
		'desc'  => __('Enter the number for the background parallax movement on scroll (leave empty to disable). Set this between 0 and 1 to ensure image coverage', 'unyson'),
	),
	'video' => array(
		'label' => __('Background Video', 'fw'),
		'desc'  => __('Insert Video URL to embed this video', 'fw'),
		'type'  => 'text',
	)
);
