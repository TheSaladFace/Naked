<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'opt_lead_text' => array(
		'type'   => 'textarea',
		'label'  => __( 'Lead Text', 'thshpr' ),
		'desc'   => __( 'Enter some content for this lead paragraph', 'thshpr' )
	),
	/*'opt_show_drop_cap' =>array(
		'type'  => 'switch',
		'value' => 'Show',
		'label' => __('Show Drop Cap', 'thshpr'),
		'help' => __( 'This will display a drop cap for the first letter', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Drop Cap', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Normal', 'thshpr'),
		),
	),*/
	'opt_show_fancy_drop_cap' =>array(
		'type'  => 'switch',
		'value' => 'Show',
		'label' => __('Show Fancy Drop Cap', 'thshpr'),
		'help' => __( 'This will display a fancy drop cap for the first letter', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Fancy Drop Cap', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Normal', 'thshpr'),
		),
	),
);
