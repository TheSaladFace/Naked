<?php
/**
 * Contains post block shortcode post elements options (select / order elements and their options)
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

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

	'opt_divider_type' => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-dotted',
	    'label' => __('Divider Type', 'thshpr'),
	    'desc'  => __('Please select the type of divider you wish to use', 'thshpr'),
	    'choices' => array(
		'divider-stripes' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-stripes.png',
		'divider-thin-light' =>fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-light.png',
		'divider-thin-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-dark.png',
		'divider-thick-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thick-dark.png',
		'divider-dotted' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-dotted.png',
	    ),
		'help' => __( 'Only needed if the divider element is selected above', 'thshpr'  ),
	    'blank' => false, // (optional) if true, images can be deselected
	),

);