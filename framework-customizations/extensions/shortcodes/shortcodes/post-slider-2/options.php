<?php if (!defined('FW')) die('Forbidden');

$options = array(
	
	'id'    => array( 'type' => 'unique' ),
	'opt_post_slider_categories' => array(
										'type'       => 'multi-select',
										'label'      => __( 'Population Categories', 'unyson' ),
										'population' => 'taxonomy',
										'source'     => 'category',
										'desc'       => __( 'Please type the categories you wish to draw posts from for the featured thumbnail slider.',
											'unyson' ),
										'help'       =>__( 'Begin typing and the field will search the categories, select the ones you require', 'unyson'  ),
									),
									
									'opt_post_slider_number_posts'                      => array(
										'label' => __( 'Number of Posts', 'unyson' ),
										'type'  => 'text',
										'value' => '10',
										'desc'  => __( 'Please enter the maximum number of posts you wish to use for the featured thumbnail slider',
											'unyson' ),
										'help'  => __( 'The slider will only use up to the number you choose to populate', 'unyson' ),
									),
									'opt_posts_slider_number_slides'              => array(
										'label'   => __( 'Number of Slides', 'unyson' ),
										'type'    => 'select',
										'value'   => '3',
										'desc'    => __( 'Please choose the number of slides to be displayed for this slider',
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
									'opt_post_slider_ordering'              => array(
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
									'opt_post_slider_initial'              =>array(
									    'type'  => 'switch',
									    'value' => 'Show',
									    'label' => __('Show Initial Slide Info Rows', 'fw'),
									    'desc'  => __('Displays the initial slide info rows (as below)', 'fw'),
									    'left-choice' => array(
										'value' => '1',
										'label' => __('Show', 'fw'),
									    ),
									    'right-choice' => array(
										'value' => '0',
										'label' => __('Hide', 'fw'),
									    ),
									),
									'opt_post_slider_buttons'              =>array(
									    'type'  => 'switch',
									    'value' => 'Show',
									    'label' => __('Show Prev / Next Buttons', 'fw'),
									    'desc'  => __('Shows the fancy previous and next buttons. If enabled, this will require the section containing the slider to be set to full width.', 'fw'),
									    'left-choice' => array(
										'value' => '1',
										'label' => __('Show', 'fw'),
									    ),
									    'right-choice' => array(
										'value' => '0',
										'label' => __('Hide', 'fw'),
									    ),
									),
									'opt_post_slider_functionality' =>array(
										'type' => 'addable-box',
										'label' => __('Add Initial Slide Info Rows', 'fw'),
										'desc'  => __('Add / remove / reorder rows to be displayed initially each slide', 'fw'),
										'template' => '{{- opt_post_slider_rows }}',
										'popup-title' => null,
										'size' => 'small', // small, medium, large
										'limit' => 0, // limit the number of popup`s that can be added
									 	'box-options' => array(
											'opt_post_slider_rows' => array(
												'label'   => __( 'Row Type', 'unyson' ),
												'type'    => 'select',
												'choices' => array(
													'Title' => 'Title',
													'Title + Excerpt' => 'Title + Excerpt',
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
									'opt_post_slider_functionality_hover' =>array(
										'type' => 'addable-box',
										'label' => __('Add Hover Slide Info Rows', 'fw'),
										'desc'  => __('Add / remove / reorder rows to be displayed on hover in each slide', 'fw'),
										'template' => '{{- opt_post_slider_rows }}',
										'popup-title' => null,
										'size' => 'small', // small, medium, large
										'limit' => 0, // limit the number of popup`s that can be added
									 	'box-options' => array(
											'opt_post_slider_rows' => array(
												'label'   => __( 'Row Type', 'unyson' ),
												'type'    => 'select',
												'choices' => array(
													'Title' => 'Title',
													'Title + Excerpt' => 'Title + Excerpt',
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
												),
												
											),
										),
									),
									'opt_post_slider_number_categories'              => array(
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
									'opt_small_image_max_width'                      => array(
										'label' => __( 'Maximimum Image Width', 'unyson' ),
										'type'  => 'text',
										'value' => '900',
										'desc'  => __( 'Enter the maximum image width in pixels',
											'unyson' ),
										'help'       =>__( 'This should be set to be at least as large as the largest image needed', 'unyson'  ),
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
									'opt_posts_block_read_more_text'                      => array(
										'label' => __( 'Read More Text', 'unyson' ),
										'type'  => 'text',
										'value' => 'Read More',
										'desc'  => __( 'Enter the text to be used for the read more link (If added below)',
											'unyson' ),
										'help'       =>__( '', 'unyson'  ),
									),
									
									
);

?>
