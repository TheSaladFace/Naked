<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'panel_1' => array(
        'title' => __('Posts', 'thshpr'),
        'options' => array(

			'title_options' => array(
                'title' => __('Post Title Options', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('title-options'),
				),
            ),

            'side_meta_options' => array(
                'title' => __('Side Meta Options', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('meta-options'),
				),
            ),
        ),
    ),
);
