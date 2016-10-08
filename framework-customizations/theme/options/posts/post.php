<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'opt_subtitle' => array(
		'label' => __( 'Sub Title', 'thshpr' ),
		'type'  => 'textarea',
		'value' => '',
		'desc'  => __( 'An optional field that can be displayed providing more information about the post', 'thshpr' ),
		'help' =>__( 'Only required if the subtitle element is added either in the customiser or below if override options is selected', 'thshpr'  ),
	),
	'opt_parallax_image' => array(
		'label' => __('Optional Full Width Parallax Image', 'thshpr'),
		'desc' => __('Please select the optional full width parallax image', 'thshpr'),
		'help' =>__( 'Only required if the "Show Full Width Header (Parallax) Image" is switched on either in the customiser or below if override options is selected', 'thshpr'  ),
		'type' => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),

	'override_customizer' =>array(
	    'type'  => 'multi-picker',
	    'label' => false,
	    'desc'  => false,
	    'value' => array(
	        /**
	         * '<custom-key>' => 'default-choice'
	         */
	        'option-type' => 'override',


	    ),
	    'picker' => array(
	        // '<custom-key>' => option
	        'option-type' => array(
	            'label'   => __('Choose Options For This Post', 'thshpr'),
	            'type'    => 'select', // or 'short-select'
	            'choices' => array(
	                'customizer'  => __('Use Global Customiser Options', 'thshpr'),
	                'override' => __('Override Options For This Post', 'thshpr')
	            ),
	            'desc'    => __('You should set global post options in the customizer first, then override here if you wish to change the options for this specific post', 'thshpr'),
	        )
	    ),

	    'choices' => array(
	        'customizer' => array(
	        ),
	        'override' => array(
	            fw()->theme->get_options('posts'),
	        ),
	    ),
	    /**
	     * (optional) if is true, the borders between choice options will be shown
	     */
	    'show_borders' => true,
	)


);
