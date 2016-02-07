<?php
/**
 * Contains post elements options for single posts
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_single_title_functionality'=> array(
		'type' =>'addable-box',
		'label' => __('Add Title Elements', 'thshpr'),
		'template' => '{{- opt_single_title_rows }}',
		'popup-title' => null,
		'help' => __( 'Add and order (drag and drop) the title elements to be displayed for single posts.', 'thshpr'  ),
		'size' =>'small', // small, medium, large
		'limit' => 0, // limit the number of popup`s that can be added
		'box-options' => array(
			'opt_single_title_rows' => array(
				'label' => __( 'Row Type', 'thshpr' ),
				'type' => 'select',
				'choices' => array(
					'Title' => 'Title',
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

	'opt_single_title_number_categories' => array(
		'label' => __( 'Number of Categories / Tags', 'thshpr' ),
		'type' => 'short-select',
		'value' => '2',
		'help' => __( 'Please choose the maximum number of categories / tags you wish to display in the meta. Only needed if category or tag meta elements are selected above', 'thshpr'  ),
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	),

	'opt_single_title_show_author_image' =>array(
		'type'  => 'switch',
		'value' => 'Show',
		'label' => __('Show Image for Author', 'thshpr'),
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

	'opt_single_title_divider_type' => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-dotted',
	    'label' => __('Divider Type', 'thshpr'),
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
