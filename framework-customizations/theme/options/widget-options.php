<?php
/**
 * Contains post elements options for the widget
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'image_options' => array(
		'title' => _('Image Options', 'thshpr'),
		'options' => array(

			'opt_small_image_ratio' => array(
				'label'   => __( 'Normal Image Ratio', 'thshpr' ),
				'type'    => 'short-select',
				'value'   => '0.75',
				'desc'    => __( 'Please select the ratio of the normal sized images for this block (if the thumbnail post element is added above)The above maximum width is used and the height is automatically calculated. You must ensure the image is of sufficient original size.','thshpr' ),
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
			),

			'opt_show_hover_effects' => array(
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

		),
	),


	'component_options' => array(
		'title' => _('Component Options', 'thshpr'),
		'options' => array(

			'opt_widget_functionality'=> array(
				'type' =>'addable-box',
				'label' => __('Add Title Elements', 'thshpr'),
				'template' => '{{- opt_widget_rows }}',
				'popup-title' => null,
				'help' => __( 'Add and order (drag and drop) the title elements to be displayed for the post widgets.', 'thshpr'  ),
				'size' =>'small', // small, medium, large
				'limit' => 0, // limit the number of popup`s that can be added
				'box-options' => array(
					'opt_widget_rows' => array(
						'label' => __( 'Row Type', 'thshpr' ),
						'type' => 'select',
						'choices' => array(
							'Thumbnail' => 'Thumbnail',
							'Title' => 'Title',
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

			'opt_widget_number_categories' => array(
				'label' => __( 'Number of Categories / Tags', 'thshpr' ),
				'type' => 'short-select',
				'value' => '2',
				'help' => __( 'Please choose the maximum number of categories / tags you wish to display in this title area. Only needed if category or tag meta elements are selected above', 'thshpr'  ),
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				),
			),

			'opt_widget_divider_type' => array(
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




		),
	),

);
