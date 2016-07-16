<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'panel_1' => array(
        'title' => __('General Options', 'thshpr'),
        'options' => array(

			'opt_show_site_borders' =>array(
				'type'  => 'switch',
				'value' => 'Show',
				'label' => __('Show Site Borders', 'thshpr'),
				'help' => __( 'This will display the site borders', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),
			'opt_site_borders_color' =>array(
				'type'  => 'color-picker',
				'value' => '#111',
				'palettes' => array( '#111', '#0ce9ed', '#941940' ),
				'label' => __('Site Borders Color', 'thshpr'),
				'desc'  => __('The color that is used for the site borders', 'thshpr'),
			),
			'opt_site_borders_size' => array(
				'label' => __( 'Site Borders Size (pixels)', 'thshpr' ),
				'type'  => 'text',
				'value' => '20',
				'desc'  => __( 'Please enter the size of the site borders (dont add the px)','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
        ),
    ),
	'panel_2' => array(
        'title' => __('Header', 'thshpr'),
        'options' => array(
			fw()->theme->get_options('header-options'),
        ),
    ),
	'panel_3' => array(
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
	'panel_4' => array(
        'title' => __('Typography', 'thshpr'),
        'options' => array(
			fw()->theme->get_options('typography-options'),
        ),
    ),
	'panel_5' => array(
        'title' => __('Colors', 'thshpr'),
        'options' => array(

			'opt_accent_color' =>array(
				'type'  => 'color-picker',
				'value' => '#ffeb00',
				'palettes' => array( '#ffeb00', '#0ce9ed', '#941940' ),
				'label' => __('Theme Accent Color', 'thshpr'),
				'desc'  => __('Choose an accent color for the theme', 'thshpr'),
			),
			'opt_accent_contents_color' =>array(
				'type'  => 'color-picker',
				'value' => '#111',
				'palettes' => array( '#111', '#0ce9ed', '#941940' ),
				'label' => __('Theme Accent Contents Color', 'thshpr'),
				'desc'  => __('The color that is used for the contents when the accent is applied to a background', 'thshpr'),
				'help'  => __( 'This color needs to stand out from the accent color', 'thshpr'  ),
			),
        ),
    ),
	'panel_6' => array(
        'title' => __('Social', 'thshpr'),
        'options' => array(
			'opt_social_twitter' => array(
				'label' => __( 'Your Twitter URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Twitter account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_facebook' => array(
				'label' => __( 'Your Facebook URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Facebook account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_googleplus' => array(
				'label' => __( 'Your Google Plus URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Google Plus account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_linkedin' => array(
				'label' => __( 'Your Linked In URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Linked In account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_youtube' => array(
				'label' => __( 'Your Youtube URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Youtube account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_pinterest' => array(
				'label' => __( 'Your Pinterest URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Pinterest account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_instagram' => array(
				'label' => __( 'Your Instagram URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Instagram account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_tumblr' => array(
				'label' => __( 'Your Tumblr URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Tumblr account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_vine' => array(
				'label' => __( 'Your Vine URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Vine account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_snapchat' => array(
				'label' => __( 'Your Snapchat URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Snapchat account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_reddit' => array(
				'label' => __( 'Your Reddit URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Reddit account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_flickr' => array(
				'label' => __( 'Your Flickr URL', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter the URL of your Flickr account.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
			'opt_social_email' => array(
				'label' => __( 'Your Email Address', 'thshpr' ),
				'type'  => 'text',
				'value' => '',
				'desc'  => __( 'Please enter your email address.','thshpr' ),
				'help'  => __( 'Leave blank to remove', 'thshpr'  ),
			),
        ),
    ),
);
