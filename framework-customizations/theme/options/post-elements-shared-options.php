<?php
/**
 * Contains post block shortcode post elements options (select / order elements and their options)
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_posts_block_functionality'=> array(
		'type' =>'addable-box',
		'label' => __('Add Post Elements', 'thshpr'),
		'desc' => __('Add / remove / reorder elements to be displayed in each post', 'thshpr'),
		'template' => '{{- opt_header_featuredposts_rows }}',
		'popup-title' => null,
		'help' => __( 'Add and order (drag and drop) the posts elements to be displayed for this block. Thumbnail and divider may be unavailable for some blocks', 'thshpr'  ),
		'size' =>'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'box-options' => array(
			'opt_header_featuredposts_rows' => array(
				'label' => __( 'Row Type', 'thshpr' ),
				'type' => 'select',
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

	'opt_posts_block_number_categories' => array(
		'label' => __( 'Number of Categories / Tags', 'thshpr' ),
		'type' => 'short-select',
		'value' => '2',
		'help' => __( 'Only needed if category or tag elements are selected above', 'thshpr'  ),
		'desc' => __( 'Please choose how many categories / tags you wish to display in the block','thshpr' ),
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	),

	'opt_posts_block_excerpt_length' => array(
		'label' => __( 'Excerpt Length', 'thshpr' ),
		'type'  => 'text',
		'value' => '11',
		'desc'  => __( 'Enter the length of the excerpt (in words) excerpts will be automatically trimmed to this length','thshpr' ),
		'help'  => __( '', 'thshpr'  ),
	),

	'opt_posts_block_large_excerpt_length' => array(
		'label' => __( 'Featured Post Excerpt Length', 'thshpr' ),
		'type' => 'text',
		'value' => '180',
		'desc' => __( 'Enter the length of the featured excerpt (in words) excerpts will be automatically trimmed to this length.)', 'thshpr' ),
		'help' => __( 'This only applies to blocks with a featured (larger) post excerpt', 'thshpr'  ),
	),

	'opt_posts_block_read_more_text' => array(
		'label' => __( 'Read More Text', 'thshpr' ),
		'type' => 'text',
		'value' => 'Read More',
		'desc' => __( 'Enter the text to be used for the read more link', 'thshpr' ),
		'help' => __( 'Unicode arrow codes can be used (e.g. http://character-code.com/arrows-html-codes.php), only needed if the read more element is selected above', 'thshpr'  ),
	),

	'opt_posts_block_show_author_image' =>array(
		'type'  => 'switch',
		'value' => 'Show',
		'label' => __('Show Image for Author', 'thshpr'),
		'desc'  => __('Show the gravatar image for the author.', 'thshpr'),
		'help' => __( 'This only applies if the author element is selected above', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),

	'opt_divider_type' => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-dotted',
	    'label' => __('Divider Type', 'thshpr'),
	    'desc'  => __('Please select the type of divider you wish to use', 'thshpr'),
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

);
