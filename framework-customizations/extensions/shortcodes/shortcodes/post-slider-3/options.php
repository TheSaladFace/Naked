<?php if (!defined('FW')) die('Forbidden');

$options = array(
	
	'id'    => array( 'type' => 'unique' ),
	'opt_posts_slider_categories' => array(
										'type'       => 'multi-select',
										'label'      => __( 'Population Categories', 'unyson' ),
										'population' => 'taxonomy',
										'source'     => 'category',
										'desc'       => __( 'Please type the categories you wish to draw posts from for the featured thumbnail slider.',
											'unyson' ),
										'help'       =>__( 'Begin typing and the field will search the categories, select the ones you require', 'unyson'  ),
									),
									'id'    => array( 'type' => 'unique' ),
									
									'opt_posts_slider_number_posts'                      => array(
										'label' => __( 'Number of Posts', 'unyson' ),
										'type'  => 'text',
										'value' => '10',
										'desc'  => __( 'Please enter the maximum number of posts you wish to use for the featured thumbnail slider',
											'unyson' ),
										'help'  => __( 'The slider will only use up to the number you choose to populate', 'unyson' ),
									),
									
									'opt_posts_slider_ordering'              => array(
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
									'opt_posts_slider_functionality' =>array(
										'type' => 'addable-box',
										'label' => __('Add Post Elements', 'unyson'),
										'desc'  => __('Add / remove / reorder elements to be displayed in each post', 'unyson'),
										'template' => '{{- opt_posts_slider_rows }}',
										'popup-title' => null,
										'size' => 'small', // small, medium, large
										'limit' => 0, // limit the number of popup`s that can be added
										'box-options' => array(
											'opt_posts_slider_rows' => array(
												'label'   => __( 'Row Type', 'unyson' ),
												'type'    => 'select',
												'choices' => array(
													'Thumbnail' => 'Thumbnail',
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
									'opt_posts_slider_number_categories'              => array(
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
