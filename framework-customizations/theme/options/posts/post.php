<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'post_elements_options_box' => array(
		'type' => 'box',
		'title' => __('Post Elements ', 'thshpr'),
		'options' => array(
			fw_ext('shortcodes')->get_options('post-elements-single-options'),
		),
	),
);
