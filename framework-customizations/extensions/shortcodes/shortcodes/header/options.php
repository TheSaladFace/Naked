<?php if (!defined('FW')) die('Forbidden');

$options = array(

	'id'    => array( 'type' => 'unique' ),
	'opt_header_text' => array(
		'label' => __( 'Divider Header Text (optional)', 'unyson' ),
		'type'  => 'text',
		'value' => 'Header',
		'desc'  => __( 'Please enter the text for the divider header','thshpr' ),
	),
	'opt_header_type' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Use Fancy Header', 'thshpr'),
		'help' => __( 'Use the Fancy Header or Plain Text Header', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Fancy', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Plain', 'thshpr'),
		),
	),
	'opt_header_fancy_header_show_bottom' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Show Bottom Border & Padding', 'thshpr'),
		'help' => __( 'This will show the bottom border and extra padding at the bottom of the header', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),
	'opt_header_fancy_header_show_accent' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Show Extra Accent Color on Fancy Header', 'thshpr'),
		'help' => __( 'This will show an extra accent color strip above the dark strip on the fancy header', 'thshpr'  ),
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

?>
