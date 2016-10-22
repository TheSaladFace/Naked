<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'categories_general_options_box' => array(
		'type' => 'box',
		'title' => __('General Options', 'thshpr'),
		'options' => array(

			'opt_show_progress_indicator' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Progress Indicator', 'thshpr'),
				'help' => __( 'This will display a thin bar which reveals the progress of the category being read by the user', 'thshpr'  ),
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
				'desc' => __( 'Please select the sidebar type you wish to use for this category','thshpr'),
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
			'opt_left_right_padding' => array(
				'label' => __( 'Left / Right Padding (if no sidebar above) - large screens only', 'thshpr' ),
				'type'  => 'text',
				'value' => '150',
				'desc'  => __( 'Narrows the body content when only one column is chosen.', 'thshpr' ),
			),

			'opt_posts_block_ordering' => array(
				'label' => __( 'Order Method', 'thshpr' ),
				'type' => 'short-select',
				'value' => 'date',
				'desc' => __( 'Please choose how you wish the posts to be ordered.','thshpr' ),
				'choices' => array(
					'date' => 'date',
					'rand' => 'random',
					'name' => 'name',
					'author' => 'author',
					'parent' => 'parent',
				),
				'help' =>__( 'Determines the order which the posts will be displayed in the archive output', 'thshpr'  ),
			),

			'opt_posts_block_vertical_align_columns'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Vertical Align Columns', 'thshpr'),
				'desc'  => __('Vertically align the two columns', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),

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

			'opt_posts_block_layout' => array(
				'label' => __( 'Layout', 'thshpr' ),
				'type' => 'select',
				'value' => 'image-left-50',
				'desc' => __( 'Please select the layout you wish to use for this category','thshpr'),
				'choices' => array(
					'image-left-50' => 'Image Left 1/2 Width',
					'image-left-33' => 'Image Left 1/3 Width',
					'image-right-50' => 'Image Right 1/2 Width',
					'image-right-33' => 'Image Right 1/3 Width',
					'full-width' => 'Full Width',
				),
			),
			'opt_posts_block_center_title'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Center Title', 'thshpr'),
				'desc'  => __('Horizontally Center the title in the middle of the page', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),
			'opt_posts_block_title_overlay_image'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Overlay Title Over Image', 'thshpr'),
				'desc'  => __('Overlays the title over the fill width image (if the image is set in the category / tag page)', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),


		),
	),

	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'tab',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('image-shared-options'),

		),
	),

	/* pagination options */
	'pagination_options_box' => array(
    	'type' => 'tab',
		'title' => __('Pagination', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('pagination-shared-options'),

		),
	),
);
