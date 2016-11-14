<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'switch_style_panel_display'        => array(
		'type'  => 'switch',
		'value' => true,
		'label' => __('Frontend Style Switcher', 'thshpr'),
		'desc'  => __('Enable frontend style switcher', 'thshpr'),
		'left-choice' => array(
			'value' => true,
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => false,
			'label' => __('No', 'thshpr'),
		),
	),
	'switch_style_panel_description'    => array(
		'type'  => 'text',
		'value' => 'Choose a style:',
		'label' => __('Label', 'thshpr'),
		'desc'  => __('The text that will be displayed at the top of the panel.', 'thshpr')
	)
);