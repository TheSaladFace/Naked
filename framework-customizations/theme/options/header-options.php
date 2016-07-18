<?php
/**
 * Contains post elements options for the header
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_header_show_search' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Show Search Box in Header', 'thshpr'),
		'help' => __( 'This will display the search box in the header', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),

	'opt_header_show_social' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Show Social media Icons in Header', 'thshpr'),
		'help' => __( 'This will display the social media icons in the header', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),

	'opt_header_horizontal_center' =>array(
		'type'  => 'switch',
		'value' => '0',
		'label' => __('Horizontally Center Header', 'thshpr'),
		'help' => __( 'This will center the logo and top menu in two rows (logo first)', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Center', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Dont Center', 'thshpr'),
		),
	),

	'opt_header_extra_top_bar_widgets' =>array(
		'type'  => 'switch',
		'value' => '0',
		'label' => __('Show Extra Top Bar Widgets', 'thshpr'),
		'help' => __( 'This will display the extra top bar above the header. It will consist of 2 50% width widget areas', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),




);
