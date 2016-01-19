<?php if (!defined('FW')) die('Forbidden');

$options = array(

	'id'    => array( 'type' => 'unique' ),
	'opt_posts_block_categories' => array(
		'type'       => 'multi-select',
		'label'      => __( 'Population Categories', 'unyson' ),
		'population' => 'taxonomy',
		'source'     => 'category',
		'desc'       => __( 'Please type the categories you wish to draw posts from for the featured thumbnail block.',
		'unyson' ),
		'help'       =>__( 'Begin typing and the field will search the categories, select the ones you require', 'unyson'  ),
	),

	'opt_posts_block_number_posts'                      => array(
		'label' => __( 'Number of Posts', 'unyson' ),
		'type'  => 'text',
		'value' => '10',
		'desc'  => __( 'Please enter the maximum number of posts you wish to use for the featured thumbnail block',
		'unyson' ),
		'help'  => __( 'The block will only use up to the number you choose to populate', 'unyson' ),
	),
	'opt_posts_block_number_slides'              => array(
		'label'   => __( 'Number of Slides', 'unyson' ),
		'type'    => 'select',
		'value'   => '5',
		'desc'    => __( 'Please choose the number of slides to be displayed for this block',
		'unyson' ),
		'choices' => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
		),
	),
	'opt_posts_block_ordering'              => array(
		'label'   => __( 'Order Method', 'unyson' ),
		'type'    => 'short-select',
		'value'   => '1',
		'desc'    => __( 'Please choose how you wish the posts in the block to be ordered.',
		'unyson' ),
		'choices' => array(
			'date' => 'date',
			'rand' => 'random',
			'name' => 'name',
			'author' => 'author',
			'parent' => 'parent',
		),
	),
	'opt_posts_block_prev_next_position'                      => array(
		'label' => __( 'Previous / Next Button Vertical Position', 'unyson' ),
		'type'  => 'text',
		'value' => '20',
		'desc'  => __( 'Please enter the vertical position of the previous and next buttons (in pixels).',
		'unyson' ),
	),
	'opt_posts_block_buttons'              =>array(
		'type'  => 'switch',
		'value' => 'Show',
		'label' => __('Show Prev / Next Buttons', 'fw'),
		'desc'  => __('Shows the fancy previous and next buttons. If enabled, this will require the section containing the block to be set to full width.', 'fw'),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'fw'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'fw'),
		),
	),
	'opt_posts_block_functionality' =>array(
		'type' => 'addable-box',
		'label' => __('Add Post Elements', 'unyson'),
		'desc'  => __('Add / remove / reorder elements to be displayed in each post', 'unyson'),
		'template' => '{{- opt_posts_block_rows }}',
		'popup-title' => null,
		'size' => 'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'box-options' => array(
			'opt_posts_block_rows' => array(
				'label'   => __( 'Row Type', 'unyson' ),
				'type'    => 'select',
				'choices' => array(
					'Thumbnail' => 'Thumbnail',
					'Title' => 'Title',
					'Title+Excerpt' => 'Title+Excerpt',
					'Categories' => 'Categories',
					'Tags' => 'Tags',
					'Read More' => 'Read More',
					'Date' => 'Date',
					'Author' => 'Author',
					'Comments' => 'Comments',
					'Date+Comments' => 'Date+Comments',
					'Comments+Author' => 'Comments+Author',
					'Date+Author' => 'Date+Author',
					'Date+Comments+Author' => 'Date+Comments+Author',
					'Share Boxes' => 'Share Boxes',
					'Divider' => 'Divider',
				),

			),
		),
	),

	'opt_posts_block_number_categories'              => array(
		'label'   => __( 'Number of Categories / Tags', 'unyson' ),
		'type'    => 'short-select',
		'value'   => '2',
		'desc'    => __( 'Please choose how many categories / tags you wish to display in the block (if this is enabled)',
		'unyson' ),
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
		'help'    => __( 'This will only be necessary if you choose to display the category or tags of the posts below each slide' ),
	),
	'opt_posts_block_excerpt_length'                      => array(
		'label' => __( 'Excerpt Length', 'unyson' ),
		'type'  => 'text',
		'value' => '11',
		'desc'  => __( 'Enter the length of the automatic excerpt in words (If added below)',
		'unyson' ),
		'help'       =>__( '', 'unyson'  ),
	),
	'opt_small_image_ratio'              => array(
		'label'   => __( 'Featured Image Ratio', 'unyson' ),
		'type'    => 'short-select',
		'value'   => '4:3',
		'desc'    => __( 'Please select the ratio of the small images for this posts block  (if the thumbnail post element is added above)',
		'unyson' ),
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
	'opt_posts_block_hover_effects'              =>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Show Hover Effects', 'unyson'),
		'desc'  => __('Shows the hover effects on images  (if the thumbnail post element is added above)', 'unyson'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),

	'opt_image_hover_item_1'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'template' => array(
				'label'   => __( 'Small Image Hover Upper Item', 'unyson' ),
				'type'    => 'select',
				'choices' => array(
					'0' => __('None', 'unyson'),
					'1' => __('Text', 'unyson'),
					'2' => __('Icon', 'unyson'),
					'3' => __('Image Upload', 'unyson'),
				),
				'desc'    => __( 'Choose an option for the upper hover item  (if the thumbnail post element is added above)',
				'unyson'
			),
			)
		),
		'choices'      => array(
			//Single column
			'1'  => array(
				'opt_image_hover_item_text'       =>array(
					'type'  => 'text',
					'value' => 'N',
					'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
					'label' => __('', 'fw'),
					'desc'  => __('Enter the text you wish to use for this hover', 'fw'),
					'help'  => __('', 'fw'),
					)
				),
				//2 col content left choice
				'2'  => array(
					'opt_image_hover_item_icon'                =>array(
						'type'  => 'icon',
						'value' => 'fa-smile-o',
						'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
						'label' => __('Image Hover Icon', 'fw'),
						'desc'  => __('Choose an icon for the image hover effect', 'fw'),
						'help'  => __('', 'fw'),
					),
				),
				//2 col content right choice
				'3'  => array(
					'opt_image_hover_item_image'             => array(
						'label' => __( '', 'unyson' ),
						'desc'  => __( 'Please upload the image you wish to use',
						'unyson' ),
						'type'  => 'upload',
						'help'  => __( 'Upload an image either in the .png .jpg or .gif file formats',
						'unyson' ),
					),
				),


			),
			'show_borders' => false,
		),
		'opt_image_hover_item_2'       => array(
			'type'         => 'multi-picker',
			'label'        => false,
			'desc'         => false,
			'picker'       => array(
				'template' => array(
					'label'   => __( 'Small Image Hover Lower Item', 'unyson' ),
					'type'    => 'select',
					'choices' => array(
						'0' => __('None', 'unyson'),
						'1' => __('Text', 'unyson'),
						'2' => __('Icon', 'unyson'),
						'3' => __('Image Upload', 'unyson'),
					),
					'desc'    => __( 'Choose an option for the lower hover item (if the thumbnail post element is added above)',
					'unyson'
				),
				)
			),
			'choices'      => array(
				//Single column
				'1'  => array(
					'opt_image_hover_item_text'       =>array(
						'type'  => 'text',
						'value' => 'N',
						'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
						'label' => __('', 'fw'),
						'desc'  => __('Enter the text you wish to use for this hover', 'fw'),
						'help'  => __('', 'fw'),
						)
					),
					//2 col content left choice
					'2'  => array(
						'opt_image_hover_item_icon'                =>array(
							'type'  => 'icon',
							'value' => 'fa-smile-o',
							'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
							'label' => __('', 'fw'),
							'desc'  => __('Choose an icon for the image hover effect', 'fw'),
							'help'  => __('', 'fw'),
						),
					),
					//2 col content right choice
					'3'  => array(
						'opt_image_hover_item_image'             => array(
							'label' => __( '', 'unyson' ),
							'desc'  => __( 'Please upload the image you wish to use',
							'unyson' ),
							'type'  => 'upload',
							'help'  => __( 'Upload an image either in the .png .jpg or .gif file formats',
							'unyson' ),
						),
					),


				),
				'show_borders' => false,
			),
			'opt_posts_block_read_more_text'                      => array(
				'label' => __( 'Read More Text', 'unyson' ),
				'type'  => 'text',
				'value' => 'Read More',
				'desc'  => __( 'Enter the text to be used for the read more link  (if the read more post element is added above)',
				'unyson' ),
				'help'       =>__( '', 'unyson'  ),
			),
			'opt_divider_type'              => array(
				'type'  => 'image-picker',
				'value' => 'divider-dotted',

				'label' => __('Divider Type', 'unyson'),
				'desc'  => __('Please select the type of divider you wish to use. ', 'unyson'),
				'choices' => array(
					'divider-stripes' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-stripes.png',
					'divider-thin-light' =>fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-light.png',
					'divider-thin-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-dark.png',
					'divider-thick-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thick-dark.png',
					'divider-dotted' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-dotted.png',
				),
				'blank' => false, // (optional) if true, images can be deselected
			),

		);

		?>
