<?php if (!defined('FW')) die('Forbidden');

$options = array(

	'id'    => array( 'type' => 'unique' ),
	'opt_post_navigation_previous_text' => array(
		'label' => __( 'Previous Navigation Text', 'thshpr' ),
		'type'  => 'text',
		'value' => 'Next Post',
		'desc'  => __( 'Please enter the text for the previous navigation link','thshpr' ),
	),
	'opt_post_navigation_next_text' => array(
		'label' => __( 'Next Navigation Text', 'thshpr' ),
		'type'  => 'text',
		'value' => 'Previous Post',
		'desc'  => __( 'Please enter the text for the previous navigation link','thshpr' ),
	),
);

?>
