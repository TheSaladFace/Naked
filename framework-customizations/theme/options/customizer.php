<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'panel_1' => array(
        'title' => __('Header', 'thshpr'),
        'options' => array(


			fw()->theme->get_options('header-options'),



        ),
    ),
    'panel_2' => array(
        'title' => __('Posts', 'thshpr'),
        'options' => array(

			'general_options' => array(
                'title' => __('General Options', 'thshpr'),
				'options' => array(
					'opt_show_side_meta' =>array(
						'type'  => 'switch',
						'value' => 'Show',
						'label' => __('Show Side Meta Information', 'thshpr'),
						'help' => __( 'This will display the side meta panel on the left hand side of the post. Populate this from the Author Bio Options', 'thshpr'  ),
						'left-choice' => array(
							'value' => '1',
							'label' => __('Show', 'thshpr'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => __('Hide', 'thshpr'),
						),
					),
					'opt_show_author_info' =>array(
						'type'  => 'switch',
						'value' => 'Show',
						'label' => __('Show Author Information Box', 'thshpr'),
						'help' => __( 'This will display the author info box at the bottom of the post.', 'thshpr'  ),
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
                'title' => __('Side Meta Options', 'thshpr'),
				'options' => array(
					fw()->theme->get_options('side-meta-options'),
				),
            ),
        ),
    ),
	'panel_3' => array(
        'title' => __('Typography', 'thshpr'),
        'options' => array(


			fw()->theme->get_options('typography-options'),



        ),
    ),
);
