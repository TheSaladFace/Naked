<?php if (!defined('FW')) die('Forbidden');

$options = array(

	'id'    => array( 'type' => 'unique' ),
	'opt_spacer_height' => array(
		'label' => __( 'Height of Spacer', 'thshpr' ),
		'type'  => 'text',
		'value' => '30',
		'desc'  => __( 'Please enter the height of the spacer in pixels (dont add px)','thshpr' ),
	),
);

?>
