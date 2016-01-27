<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
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
);
