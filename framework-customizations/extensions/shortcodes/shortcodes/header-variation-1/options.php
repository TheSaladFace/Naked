<?php if (!defined('FW')) die('Forbidden');

$options = array(
									
	'id'    => array( 'type' => 'unique' ),									
	'opt_divider_header_text'                      => array(
		'label' => __( 'Divider Header Text (optional)', 'unyson' ),
		'type'  => 'text',
		'value' => '',
		'desc'  => __( 'Please enter the text for the divider header',
		'unyson' ),
	),	
				
);

?>
