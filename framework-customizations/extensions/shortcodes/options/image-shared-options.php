<?php
/**
 * Contains post block shortcode image options
 */

/** Dont run without thshpr plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_small_image_ratio' => array(
		'label'   => __( 'Normal Image Ratio', 'thshpr' ),
		'type'    => 'short-select',
		'value'   => '4:3',
		'desc'    => __( 'Please select the ratio of the normal sized images for this block (if the thumbnail post element is added above)','thshpr' ),
		'choices' => array(
			'21:9' => '21:9',
			'16:9' => '16:9',
			'3:2' => '3:2',
			'4:3' => '4:3',
			'1:1' => '1:1',
			'3:4' => '3:4',
			'2:3' => '2:3',
			'9:16' => '9:16',
		),
	),

	'opt_small_image_max_width' => array(
		'label' => __( 'Normal Maximum Image Width', 'thshpr' ),
		'type' => 'text',
		'value' => '900',
		'desc' => __( 'Enter the normal image maximum width in pixels','thshpr' ),
		'help' =>__( 'This should be set to be at least as large as the largest image needed for this block. A large size might be needed due to responsive resizing', 'thshpr'  ),
	),

	'opt_large_image_ratio' => array(
		'label' => __( 'Featured Image Ratio', 'thshpr' ),
		'type' => 'short-select',
		'value' => '3:2',
		'desc' => __( 'Please select the ratio of the large (featured) image for this block (if the thumbnail post element is added above)','thshpr'),
		'choices' => array(
			'16:9' => '16:9',
			'3:2' => '3:2',
			'4:3' => '4:3',
			'1:1' => '1:1',
			'3:4' => '3:4',
			'2:3' => '2:3',
			'9:16' => '9:16',
		),
		'help' => __('This only applies to blocks with a featured (larger) image', 'thshpr'),
	),

	'opt_large_image_max_width' => array(
		'label' => __( 'Featured Maximum Image Width', 'thshpr' ),
		'type' => 'text',
		'value' => '1120',
		'desc' => __( 'Enter the featured image maximum width in pixels','thshpr' ),
		'help' =>__( 'This should be set to be at least as large as the largest image needed for this block. A large size might be needed due to responsive resizing. This only applies to blocks with a featured (larger) image', 'thshpr'  ),
	),

	'opt_posts_block_hover_effects' => array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Show Hover Effects', 'thshpr'),
		'desc'  => __('Shows the hover effects on images (if the thumbnail element is added above)', 'thshpr'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),

	'opt_image_hover_item_1' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'template' => array(
				'label' => __( 'Small Image Hover Upper Item', 'thshpr' ),
				'type' => 'select',
				'choices' => array(
					'0' => __('None', 'thshpr'),
					'1' => __('Text', 'thshpr'),
					'2' => __('Icon', 'thshpr'),
					'3' => __('Image Upload', 'thshpr'),
				),
				'desc' => __( 'Choose an option for the upper hover item  (if the thumbnail post element is added above)','thshpr'
				),
			)
		),
		'choices' => array(
			//Single column
			'1'  => array(
				'opt_image_hover_item_text' =>array(
				    'type' => 'text',
				    'value' => 'N',
				    'attr' => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				    'label' => __('', 'thshpr'),
				    'desc' => __('Enter the text you wish to use for this hover', 'thshpr'),
				    'help' => __('', 'thshpr'),
				)
			),
			//2 col content left choice
			'2' => array(
					'opt_image_hover_item_icon'                =>array(
					'type' => 'icon',
					'value' => 'fa-smile-o',
					'attr' => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					'label' => __('Image Hover Icon', 'thshpr'),
					'desc' => __('Choose an icon for the image hover effect', 'thshpr'),
					'help' => __('', 'thshpr'),
				),
			),
			//2 col content right choice
			'3' => array(
					'opt_image_hover_item_image'             => array(
					'label' => __( '', 'thshpr' ),
					'desc' => __( 'Please upload the image you wish to use','thshpr' ),
					'type' => 'upload',
					'help' => __( 'Upload an image either in the .png .jpg or .gif file formats','thshpr' ),
				),
			),
		),
		'show_borders' => false,
	),

	'opt_image_hover_item_2' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'template' => array(
				'label' => __( 'Small Image Hover Lower Item', 'thshpr' ),
				'type' => 'select',
				'choices' => array(
					'0' => __('None', 'thshpr'),
					'1' => __('Text', 'thshpr'),
					'2' => __('Icon', 'thshpr'),
					'3' => __('Image Upload', 'thshpr'),
				),
				'desc' => __( 'Choose an option for the lower hover item (if the thumbnail post element is added above)','thshpr'
				),
			)
		),
		'choices' => array(
			//Single column
			'1' => array(
				'opt_image_hover_item_text' =>array(
				    'type' => 'text',
				    'value' => 'N',
				    'attr' => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
				    'label' => __('', 'thshpr'),
				    'desc' => __('Enter the text you wish to use for this hover', 'thshpr'),
				    'help' => __('', 'thshpr'),
				)
			),
			//2 col content left choice
			'2' => array(
					'opt_image_hover_item_icon'                =>array(
					'type' => 'icon',
					'value' => 'fa-smile-o',
					'attr' => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					'label' => __('', 'thshpr'),
					'desc' => __('Choose an icon for the image hover effect', 'thshpr'),
					'help' => __('', 'thshpr'),
				),
			),
			//2 col content right choice
			'3' => array(
					'opt_image_hover_item_image'             => array(
					'label' => __( '', 'thshpr' ),
					'desc'  => __( 'Please upload the image you wish to use',
						'thshpr' ),
					'type'  => 'upload',
					'help'  => __( 'Upload an image either in the .png .jpg or .gif file formats','thshpr' ),
				),
			),
		),
		'show_borders' => false,
	),
);