<?php if (!defined('FW')) die('Forbidden');

$options = array(

	/* options that all posts blocks + posts sliders use */
	'general_options_box' => array(
    	'type' => 'tab',
		'title' => __('General', 'thshpr'),
    	'options' => array(

        	fw_ext('shortcodes')->get_options('general-shared-options'),

	    ),
	),

	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'tab',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('image-shared-options'),

		),
	),

	/* pagination options */
	'pagination_options_box' => array(
    	'type' => 'tab',
		'title' => __('Pagination', 'thshpr'),
    	'options' => array(

			fw_ext('shortcodes')->get_options('pagination-shared-options'),

		),
	),

	/* options specific to this shortcode */
	'other_options_box' => array(
    	'type' => 'tab',
		'title' => __('Other', 'thshpr'),
    	'options' => array(

			'opt_posts_block_right_cell_height' => array(
				'label' => __( 'Right Cell Height', 'thshpr' ),
				'type' => 'text',
				'value' => '300',
				'desc' => __( 'Enter the height in pixels of the right cell (containing text, meta info etc). This is needed for vertical centering.','thshpr' ),
				'help' =>__( '', 'thshpr'  ),
			),

			'opt_posts_block_show_divider'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Show Divider', 'thshpr'),
				'desc'  => __('Show the divider between posts', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
				'help' =>__( 'This is an optional divider between each post', 'thshpr'  ),
			),

		),
	),

);
/*
$options = array(

	/* options that all posts blocks + posts sliders use *//*
	'general_options_box' => array(
    	'type' => 'tab',
		'title' => __('General', 'thshpr'),
    	'options' => array(

        	fw_ext('shortcodes')->get_options('general-shared-options'),

	    ),
	),

	'id'    => array( 'type' => 'unique' ),
	'opt_posts_block_number_posts'              =>array(
		'type'  => 'text',
		'value' => '8',
		'label' => __('Number of Posts', 'unyson'),
		'desc'  => __('Enter the number of visible posts in this grid', 'unyson'),
	),
	'opt_posts_block_show_divider'              =>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Show Divider', 'unyson'),
		'desc'  => __('Show the divider between posts', 'unyson'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'opt_posts_block_pagination'              =>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Enable Pagination', 'unyson'),
		'desc'  => __('Enables pagination. Only one block should have pagination per page', 'unyson'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'opt_posts_block_ordering'              => array(
		'label'   => __( 'Order Method', 'unyson' ),
		'type'    => 'short-select',
		'value'   => '1',
		'desc'    => __( 'Please choose how you wish the posts in the slider to be ordered.',
			'unyson' ),
		'choices' => array(
			'date' => 'date',
			'rand' => 'random',
			'name' => 'name',
			'author' => 'author',
			'parent' => 'parent',
		),
	),
	'opt_posts_block_next_post_text'                      => array(
		'label' => __( 'Next Post Text', 'unyson' ),
		'type'  => 'text',
		'value' => 'Next',
		'desc'  => __( 'Enter the text to be used for the next post link ',
		'unyson' ),
		'help'       =>__( '', 'unyson'  ),
	),
	'opt_posts_block_prev_post_text'                      => array(
		'label' => __( 'Next Post Text', 'unyson' ),
		'type'  => 'text',
		'value' => 'Prev',
		'desc'  => __( 'Enter the text to be used for the previous post link ',
		'unyson' ),
		'help'       =>__( '', 'unyson'  ),
	),
	'opt_posts_block_categories' => array(
		'type'       => 'multi-select',
		'label'      => __( 'Population Categories', 'unyson' ),
		'population' => 'taxonomy',
		'source'     => 'category',
		'desc'       => __( 'Please type the categories you wish to draw posts from for the featured posts grid.',
			'unyson' ),
		'help'       =>__( 'Begin typing and the field will search the categories, select the ones you require', 'unyson'  ),
	),

	'opt_posts_block_functionality' =>array(
		'type' => 'addable-box',
		'label' => __('Add Post Elements', 'unyson'),
		'desc'  => __('Add / remove / reorder elements to be displayed in each post', 'unyson'),
		'template' => '{{- opt_header_featuredposts_rows }}',
		'popup-title' => null,
		'size' => 'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'box-options' => array(
			'opt_header_featuredposts_rows' => array(
				'label'   => __( 'Row Type', 'unyson' ),
				'type'    => 'select',
				'choices' => array(
					'Thumbnail' => 'Thumbnail',
					'Title' => 'Title',
					'Excerpt' => 'Excerpt',
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
		'desc'    => __( 'Please choose how many categories / tags you wish to display in the slider (if this is enabled)',
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
	'opt_posts_block_excerpt_length'                      => array(
		'label' => __( 'Excerpt Length', 'unyson' ),
		'type'  => 'text',
		'value' => '11',
		'desc'  => __( 'Enter the length of the automatic excerpt in words (If added below)',
			'unyson' ),
		'help'       =>__( '', 'unyson'  ),
	),
	'opt_posts_block_large_excerpt_length'                      => array(
		'label' => __( 'Full Width Post Excerpt Length', 'unyson' ),
		'type'  => 'text',
		'value' => '180',
		'desc'  => __( 'Enter the length of the full width post automatic excerpt in words',
			'unyson' ),
		'help'       =>__( 'Set a very large number if you do not want to trim this excerpt', 'unyson'  ),
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
	'opt_large_image_ratio'              => array(
			'label'   => __( 'Full Width Post Image Ratio', 'unyson' ),
			'type'    => 'short-select',
			'value'   => '4:3',
			'desc'    => __( 'Please select the ratio of the image for the full width post  (if the thumbnail post element is added above)',
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
	'opt_posts_block_right_cell_height'                      => array(
		'label' => __( 'Right Cell Height', 'unyson' ),
		'type'  => 'text',
		'value' => '300',
		'desc'  => __( 'Enter the height in pixels of the right cell (containing text, meta info etc). This is needed for vertical centering.',
			'unyson' ),
		'help'       =>__( '', 'unyson'  ),
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
		'desc'  => __( 'Enter the text to be used for the read more link (If added below)',
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
