<?php if (!defined('FW')) die('Forbidden');

$options = array(
	
	

	'id'    => array( 'type' => 'unique' ),
	'opt_divider_type'              => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-thick-dark',
	   
	    'label' => __('Divider Type', 'fw'),
	    'desc'  => __('Please select the type of divider you wish to use. Deselect to have no divider (only text, below)', 'fw'),
	    'choices' => array(
		'divider-stripes' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-stripes.png',
		'divider-thin-light' =>fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-light.png',
		'divider-thin-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-dark.png',
		'divider-thick-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thick-dark.png',
		'divider-dotted' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-dotted.png',
		
		
	    ),
	    'blank' => true, // (optional) if true, images can be deselected
	),
	'opt_divider_header_text'                      => array(
		'label' => __( 'Divider Header Text (optional)', 'unyson' ),
		'type'  => 'text',
		'value' => '',
		'desc'  => __( 'Please enter the text for the divider header',
			'unyson' ),
	),	
									
									
									
);

?>
