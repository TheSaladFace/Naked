<?php if (!defined('FW')) die('Forbidden');

$options = array(

	'id'    => array( 'type' => 'unique' ),

	'opt_show_dividers' =>array(
		'type'  => 'switch',
		'value' => '1',
		'label' => __('Show Dividers', 'thshpr'),
		'help' => __( 'Show the dividers between elements', 'thshpr'  ),
		'left-choice' => array(
			'value' => '1',
			'label' => __('Show', 'thshpr'),
		),
		'right-choice' => array(
			'value' => '0',
			'label' => __('Hide', 'thshpr'),
		),
	),

	'opt_divider_type' => array(
	    'type'  => 'image-picker',
	    'value' => 'divider-thick-dark',

	    'label' => __('Divider Type', 'fw'),
	    'desc'  => __('Please select the type of divider you wish to use.', 'fw'),
	    'choices' => array(
		'divider-stripes' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-stripes.png',
		'divider-thin-light' =>fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-light.png',
		'divider-thin-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thin-dark.png',
		'divider-thick-dark' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-thick-dark.png',
		'divider-dotted' => fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider') .'/static/img/divider-dotted.png',


	    ),
	    'blank' => true, // (optional) if true, images can be deselected
	),

);

?>
