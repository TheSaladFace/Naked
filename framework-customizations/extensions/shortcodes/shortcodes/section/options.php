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
	'padding_top' => array(
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
	'padding_bottom' => array(
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
	'margin_top' => array(
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
	'margin_bottom' => array(
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

	fw()->theme->get_options('background-shared-options'),

	'video' => array(
		'label' => __('Background Video', 'thshpr'),
		'desc'  => __('Insert Video URL to embed this video', 'thshpr'),
		'type'  => 'text',
	)
);
