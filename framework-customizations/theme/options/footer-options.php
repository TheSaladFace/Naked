<?php
/**
 * Contains post elements options for the header
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'top_row_options' => array(
		'title' => _('Top Row', 'thshpr'),
		'options' => array(

			'opt_footer_top_row_columns' => array(
				'label' => __( 'Number of Columns', 'thshpr' ),
				'type' => 'short-select',
				'value' => '0',
				'desc' => __( 'Please select the number of columns for this footer row. Choose 0 to disable','thshpr' ),
				'choices' => array(
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
				),
			),
			'opt_footer_top_row_full_width' =>array(
				'type'  => 'switch',
				'value' => '0',
				'label' => __('Full Width', 'thshpr'),
				'help' => __( 'Choose full width or boxed for this footer row', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Full Width', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Boxed', 'thshpr'),
				),
			),
			'opt_footer_top_row_cell_alignment' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Choose either left or center alignment for the columns in this footer row', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Center', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Left', 'thshpr'),
				),
			),
			'opt_footer_top_row_background_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#FFFFFF',
		    'label' => __('Background Color', 'thshpr'),
		    'desc'  => __('Choose a background color for this footer row', 'thshpr'),
		    ),
			'opt_footer_top_row_background_image' => array(
				'label' => __('Background Image', 'thshpr'),
				'desc' => __('Please select the background image', 'thshpr'),
				'type' => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'opt_footer_top_row_background_position' => array(
				'label' => __( 'Background Image Position', 'thshpr' ),
				'type' => 'select',
				'value' => 'left top',
				'desc' => __( 'Please select the background image position for this footer row','thshpr' ),
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
			'opt_footer_top_row_background_repeat'=> array(
				'label'   => __( 'Background Image Repeat', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'no-repeat',
				'desc'    => __( 'Please select the background image repeat for this footer row','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/pr_background-repeat.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y',
					'no-repeat' => 'no-repeat',
				),
			),
			'opt_footer_top_row_background_size' => array(
				'label'   => __( 'Background Size', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'cover',
				'desc'    => __( 'Please select the background image repeat for this footer row, note this may effectively override the above two options','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/css3_pr_background-size.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'auto' => 'auto',
					'length' => 'length',
					'percentage' => 'percentage',
					'cover' => 'cover',
					'contain' => 'contain',
				),
			),


		),
	),


	'main_row_options' => array(
		'title' => _('Main Row', 'thshpr'),
		'options' => array(

			'opt_footer_main_row_columns' => array(
				'label' => __( 'Number of Columns', 'thshpr' ),
				'type' => 'short-select',
				'value' => '3',
				'desc' => __( 'Please select the number of columns for this footer row. Choose 0 to disable','thshpr' ),
				'choices' => array(
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'6' => '6',
				),
			),
			'opt_footer_main_row_full_width' =>array(
				'type'  => 'switch',
				'value' => '0',
				'label' => __('Full Width', 'thshpr'),
				'help' => __( 'Choose full width or boxed for this footer row', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Full Width', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Boxed', 'thshpr'),
				),
			),
			'opt_footer_main_row_cell_alignment' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Choose either left or center alignment for the columns in this footer row', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Center', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Left', 'thshpr'),
				),
			),
			'opt_footer_main_row_background_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#FFFFFF',
		    'label' => __('Background Color', 'thshpr'),
		    'desc'  => __('Choose a background color for this footer row', 'thshpr'),
		    ),
			'opt_footer_main_row_background_position' => array(
				'label' => __( 'Background Image Position', 'thshpr' ),
				'type' => 'select',
				'value' => 'left top',
				'desc' => __( 'Please select the background image position for this footer row','thshpr' ),
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
			'opt_footer_main_row_background_repeat'=> array(
				'label'   => __( 'Background Image Repeat', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'no-repeat',
				'desc'    => __( 'Please select the background image repeat for this footer row','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/pr_background-repeat.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y',
					'no-repeat' => 'no-repeat',
				),
			),
			'opt_footer_main_row_background_size' => array(
				'label'   => __( 'Background Size', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'cover',
				'desc'    => __( 'Please select the background image repeat for this footer row, note this may effectively override the above two options','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/css3_pr_background-size.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'auto' => 'auto',
					'length' => 'length',
					'percentage' => 'percentage',
					'cover' => 'cover',
					'contain' => 'contain',
				),
			),

		),
	),

	'bottom_row_options' => array(
		'title' => _('Bottom Row', 'thshpr'),
		'options' => array(

			'opt_footer_bottom_row_columns' => array(
				'label' => __( 'Number of Columns', 'thshpr' ),
				'type' => 'short-select',
				'value' => '1',
				'desc' => __( 'Please select the number of columns for this footer row. Choose 0 to disable','thshpr' ),
				'choices' => array(
					'0' => '0',
					'1' => '1',
					'2' => '2',
					'3' => '3',
				),
			),
			'opt_footer_bottom_row_full_width' =>array(
				'type'  => 'switch',
				'value' => '0',
				'label' => __('Row Full Width', 'thshpr'),
				'help' => __( 'Choose full width or boxed for this footer row', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Full Width', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Boxed', 'thshpr'),
				),
			),
			'opt_footer_bottom_row_cell_alignment' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Choose either left or center alignment for the columns in this footer row', 'thshpr'),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Center', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Left', 'thshpr'),
				),
			),
			'opt_footer_bottom_row_background_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#FFFFFF',
		    'label' => __('Background Color', 'thshpr'),
		    'desc'  => __('Choose a background color for this footer row', 'thshpr'),
		    ),
			'opt_footer_bottom_row_background_image' => array(
				'label' => __('Background Image', 'thshpr'),
				'desc' => __('Please select the background image', 'thshpr'),
				'type' => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'opt_footer_bottom_row_background_position' => array(
				'label' => __( 'Background Image Position', 'thshpr' ),
				'type' => 'select',
				'value' => 'left top',
				'desc' => __( 'Please select the background image position for this footer row','thshpr' ),
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
			'opt_footer_bottom_row_background_repeat'=> array(
				'label'   => __( 'Background Image Repeat', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'no-repeat',
				'desc'    => __( 'Please select the background image repeat for this footer row','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/pr_background-repeat.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'repeat' => 'repeat',
					'repeat-x' => 'repeat-x',
					'repeat-y' => 'repeat-y',
					'no-repeat' => 'no-repeat',
				),
			),
			'opt_footer_bottom_row_background_size' => array(
				'label'   => __( 'Background Size', 'thshpr' ),
				'type'    => 'select',
				'value'   => 'cover',
				'desc'    => __( 'Please select the background image repeat for this footer row, note this may effectively override the above two options','thshpr' ),
				'help' =>__( 'See http://www.w3schools.com/cssref/css3_pr_background-size.asp for an explanation of these choices', 'thshpr'  ),
				'choices' => array(
					'auto' => 'auto',
					'length' => 'length',
					'percentage' => 'percentage',
					'cover' => 'cover',
					'contain' => 'contain',
				),
			),

		),
	),

	'back_to_top_options' => array(
		'title' => _('Back To Top Button', 'thshpr'),
		'options' => array(

			'opt_footer_back_to_top_button' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Back To Top Button', 'thshpr'),
				'help' => __( 'Shows a sticky back to top button which appears once the user scrolls beyond a certain point on long pages', 'thshpr'  ),
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
