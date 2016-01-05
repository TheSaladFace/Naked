<?php if (!defined('FW')) die('Forbidden');

$options = array(
	
	
	'opt_posts_block_show_hover_icons'              =>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Show Hover Icons on Small Grid Posts', 'unyson'),
		'desc'  => __('Shows the hover icons on the small (non featured) posts', 'unyson'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
	),
	'opt_posts_block_show_excerpt'              =>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Show Excerpt on Small Posts', 'unyson'),
		'desc'  => __('Show the excerpt on the small posts when the title/excerpt post element is added', 'unyson'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'unyson'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'unyson'),
		),
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
	'opt_posts_block_read_more_text'                      => array(
		'label' => __( 'Read More Text', 'unyson' ),
		'type'  => 'text',
		'value' => 'Read More',
		'desc'  => __( 'Enter the text to be used for the read more link (If added below)',
		'unyson' ),
		'help'       =>__( '', 'unyson'  ),
	),
	/*addable popup*/
	'opt_posts_block_functionality' =>array(
		'type' => 'addable-box',
		'label' => __('Add Post Elements', 'unyson'),
		'desc'  => __('Add / remove / reorder rows to be displayed in each post', 'unyson'),
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
					'Title + Excerpt' => 'Title + Excerpt',
					'Categories' => 'Categories',
					'Tags' => 'Tags',
					'Date' => 'Date',
					'Author' => 'Author',
					'Read More' => 'Read More',
				),
				
			),
		),
	),
);

?>
