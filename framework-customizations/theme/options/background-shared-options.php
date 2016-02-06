<?php
/**
 * Contains background shared options
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_background_color' => array(
		'label' => __('Background Color', 'thshpr'),
		'desc' => __('Please select the background color', 'thshpr'),
		'type' => 'color-picker',
	),
	'opt_background_image' => array(
		'label' => __('Background Image', 'thshpr'),
		'desc' => __('Please select the background image', 'thshpr'),
		'type' => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
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

);
