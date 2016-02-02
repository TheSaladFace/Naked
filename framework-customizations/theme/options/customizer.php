<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'panel_1' => array(
        'title' => __('Posts', 'thshpr'),
        'options' => array(

            'section_1' => array(
                'title' => __('Post Meta', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('meta-options'),
				),
            ),

            'section_2' => array(
                'title' => __('blurgh', 'thshpr'),
                'options' => array(

                    'option_2' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #2', 'thshpr'),
                        'desc' => __('Option Description', 'thshpr'),
                    ),
                    'option_3' => array(
                        'type' => 'text',
                        'value' => 'Default Value',
                        'label' => __('Unyson Option #3', 'thshpr'),
                        'desc' => __('Option Description', 'thshpr'),
                    ),

                ),
            ),

        ),
    ),
);
