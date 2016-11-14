<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'test1z' => array(
		'label' => __('Type of Transition', 'thshpr'),
		'desc'  => __('Type of transition between slides', 'thshpr'),
		'type'  => 'select',
		'choices' => array(
			'horizontal' => __('Horizontal', 'thshpr'),
			'vertical' => __('Vertical', 'thshpr'),
			'fade' => __('Fade', 'thshpr')
		),
		'value' => 'horizontal',
	)
);
