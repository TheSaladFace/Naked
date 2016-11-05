<?php
/**
 * Options for the section shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(
	'is_fullwidth' => array(
		'label' => __('Full Width', 'thshpr'),
		'type' => 'switch',
	),
	'opt_padding_top' => array(
		'label' => __('Padding Top', 'thshpr'),
		'value' => 'No',
		'type' => 'switch',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),
	'opt_padding_bottom' => array(
		'label' => __('Padding Bottom', 'thshpr'),
		'value' => 'Yes',
		'type' => 'switch',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),
	'opt_margin_top' => array(
		'label' => __('Margin Top', 'thshpr'),
		'type' => 'switch',
		'value' => 'No',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),
	'opt_margin_bottom' => array(
		'label' => __('Margin Bottom', 'thshpr'),
		'type' => 'switch',
		'value' => 'No',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),
	'opt_remove_duplicate_posts' => array(
		'label' => __('Remove Duplicate Posts', 'thshpr'),
		'value' => 'Yes',
		'desc'    => __( 'Removes duplicate posts within this section. Useful when you build up post blocks manually using a single category. Please note, this will only work when using the posts block columns and single post block','thshpr' ),
		'type' => 'switch',
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),

	fw()->theme->get_options('background-shared-options'),

	'video' => array(
		'label' => __('Background Video', 'thshpr'),
		'desc'  => __('Insert Video URL to embed this video', 'thshpr'),
		'type'  => 'text',
	)
);
