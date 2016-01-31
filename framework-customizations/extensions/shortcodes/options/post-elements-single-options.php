<?php
/**
 * Contains post elements options for single posts
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_posts_block_functionality'=> array(
		'type' =>'addable-box',
		'label' => __('Add Meta Elements', 'thshpr'),
		'desc' => __('Add / remove / reorder elements to be displayed in each post', 'thshpr'),
		'template' => '{{- opt_header_featuredposts_rows }}',
		'popup-title' => null,
		'help' => __( 'Add and order (drag and drop) the meta elements to be displayed for this post.', 'thshpr'  ),
		'size' =>'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'box-options' => array(
			'opt_header_featuredposts_rows' => array(
				'label' => __( 'Row Type', 'thshpr' ),
				'type' => 'select',
				'choices' => array(
					'Categories' => 'Categories',
					'Tags' => 'Tags',
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
