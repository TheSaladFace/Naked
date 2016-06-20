<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'opt_post_options' => array(
		'type' => 'box',
		'title' => __('Post Options', 'thshpr'),
		'options' => array(

			'opt_post_template_picker' => array(
			    'type'  => 'multi-picker',
			    'label' => false,
			    'desc'  => false,
			    'value' => array(
			        'template' => '1',
			    ),
			    'picker' => array(
			        // '<custom-key>' => option
			        'template' => array(
			            'label'   => __('Choose post template', 'fw'),
			            'type'    => 'select', // or 'short-select'
			            'choices' => array(
			                '1'  => __('1', 'fw'),
			                '2' => __('2', 'fw')
			            ),
			            'desc'    => __('Description', 'fw'),
			            'help'    => __('Help tip', 'fw'),
			        )
			    ),

			    'choices' => array(
			        '1' => array(

						'general_options_box' => array(
					    	'type' => 'tab',
							'title' => __('General Options', 'thshpr'),
					    	'options' => array(
								'opt_subtitle' => array(
									'label' => __( 'Sub Title', 'thshpr' ),
									'type'  => 'textarea',
									'value' => '',
									'desc'  => __( 'An optional field that can be displayed providing more information about the post', 'thshpr' ),
									'help' =>__( 'Leave empty to not display. Will only be displayed if this is added in Appearance->Customize->Posts->Post Title Options->Add Title Elements', 'thshpr'  ),
								),
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
							),
						),

						/*featured image options*/
						'featured_image_box' => array(
					    	'type' => 'tab',
							'title' => __('Featured Image', 'thshpr'),
					    	'options' => array(

								'opt_featured_image_offset_image' => array(
									'type'  => 'switch',
									'value' => 'Yes',
									'label' => __('Offset Featured Image (left)', 'thshpr'),
									'desc'  => __('Offsets the featured image to the left', 'thshpr'),
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
									'desc' => __( 'Enter the featured image maximum width in pixels','thshpr' ),
									'help' =>__( 'This should be set to be at least as large as the largest image needed for this block. A large size might be needed due to responsive resizing. This only applies to blocks with a featured (larger) image', 'thshpr'  ),
								),

								'opt_featured_image_ratio' => array(
									'label' => __( 'Featured Image Ratio', 'thshpr' ),
									'type' => 'short-select',
									'value' => '0.75',
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
									'help' => __('This only applies to blocks with a featured (larger) image', 'thshpr'),
								),

								'opt_featured_image_hover_effects' => array(
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

								'opt_featured_image_hover_item_1' => array(
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

								'opt_featured_image_hover_item_2' => array(
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



						/*fullscreen header options*/

						'fullscreen_header_image_box' => array(
					    	'type' => 'tab',
							'title' => __('Full Width Header Image', 'thshpr'),
					    	'options' => array(
								'opt_header_show_image' =>array(
									'type'  => 'switch',
									'value' => 'Hide',
									'label' => __('Show Full Width Header Image', 'thshpr'),
									'desc'  => __('Show the full width header image', 'thshpr'),
									'left-choice' => array(
										'value' => '1',
										'label' => __('Show', 'thshpr'),
									),
									'right-choice' => array(
										'value' => '0',
										'label' => __('Hide', 'thshpr'),
									),
								),
								'opt_header_shift_title' =>array(
									'type'  => 'switch',
									'value' => 'Offset',
									'label' => __('Offset the title upwards', 'thshpr'),
									'desc'  => __('Offsets the title upwards to slightly overlay the full width header image', 'thshpr'),
									'left-choice' => array(
										'value' => '1',
										'label' => __('Offset', 'thshpr'),
									),
									'right-choice' => array(
										'value' => '0',
										'label' => __('Normal', 'thshpr'),
									),
								),
								'opt_header_fade_image_scroll' =>array(
									'type'  => 'switch',
									'value' => 'Hide',
									'label' => __('Fade Header Image on Scroll', 'thshpr'),
									'desc'  => __('Fade the header image out when the user scrolls down, and fade it back in when they scroll up', 'thshpr'),
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
									'label' => __( 'Header Image Area Height', 'thshpr' ),
									'type'  => 'text',
									'value' => '200',
									'desc'  => __( 'Enter the height of the header image area height in pixels', 'thshpr' ),
									'help' =>__( 'This needs to be smaller than the image height. Because this is applied as a background image scaling will be used.', 'thshpr'  ),
								),
							),
						),


					),
			        '2' => array(
			            'price' => array(
			                'type'  => 'text',
			                'label' => __('Price', 'fw'),
			            ),
			            'webcam' => array(
			                'type'  => 'switch',
			                'label' => __('Webcam', 'fw'),
			            )
			        ),
			    ),
			    /**
			     * (optional) if is true, the borders between choice options will be shown
			     */
			    'show_borders' => false,
			),










		),
	),
);
