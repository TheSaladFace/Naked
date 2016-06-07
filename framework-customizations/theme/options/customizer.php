<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'panel_1' => array(
        'title' => __('Posts', 'thshpr'),
        'options' => array(

			'general_options' => array(
                'title' => __('General Options', 'thshpr'),
				'options' => array(
					'opt_show_author_bio' =>array(
						'type'  => 'switch',
						'value' => 'Show',
						'label' => __('Show Author Bio Information', 'thshpr'),
						'help' => __( 'This will display the author bio panel on the left hand side of the post. Populate this from the Author Bio Options', 'thshpr'  ),
						'left-choice' => array(
							'value' => '1',
							'label' => __('Show', 'thshpr'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => __('Hide', 'thshpr'),
						),
					),
				),
            ),

			'title_options' => array(
                'title' => __('Post Title Options', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('title-options'),
				),
            ),

            'side_meta_options' => array(
                'title' => __('Author Bio Options', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('author-bio-options'),
				),
            ),
        ),
    ),
	'panel_2' => array(
        'title' => __('Typography', 'thshpr'),
        'options' => array(


			fw()->theme->get_options('typography-options'),



        ),
    ),
);
