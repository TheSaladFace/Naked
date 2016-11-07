<?php
/**
 * Options for posts block column shortcode. Grouped and reused options found in options
 * folder in root shortcodes directory
 */

if (!defined('FW')) die('Forbidden');

$options = array(

	/* options that all posts blocks + posts sliders use */
	'general_options_box' => array(
    	'type' => 'tab',
		'title' => __('General', 'thshpr'),
    	'options' => array(

			'id' => array( 'type' => 'unique' ), //for giving the shortcode instance a unique class for user styling

			'post_source' =>array(
			    'type'  => 'multi-picker',
			    'label' => false,
			    'desc'  => false,
			    'value' => array(
			        /**
			         * '<custom-key>' => 'default-choice'
			         */
			        'option-type' => 'categories',
			    ),
			    'picker' => array(
			        // '<custom-key>' => option
			        'option-type' => array(
			            'label'   => __('Choose Options For This Post', 'thshpr'),
			            'type'    => 'select', // or 'short-select'
			            'choices' => array(
			                'categories'  => __('Use a post category', 'thshpr'),
			                'posts' => __('Use individual posts', 'thshpr')
			            ),
			            'desc'    => __('Posts can be drawn either from a category or from individual posts', 'thshpr'),
			        )
			    ),

			    'choices' => array(
			        'categories' => array(

						'opt_posts_block_categories' => array(
							'type' => 'multi-select',
							'label' => __( 'Population Categories', 'thshpr' ),
							'population' => 'taxonomy',
							'source' => 'category',
							'desc' => __( 'Please type the categories you wish to draw posts from. Leave blank if you wish to use specific posts (use the below option instead)','thshpr' ),
							'help' =>__( 'Begin typing and the field will search the categories, select the ones you require', 'thshpr'  ),
						),
						'opt_posts_block_number_posts'=> array(
							'label' => __( 'Maximum Number of Posts Per Page', 'thshpr' ),
							'type'  => 'text',
							'value' => '10',
							'desc'  => __( 'Please enter the maximum number of posts per block','thshpr' ),
						),
			        ),
			        'posts' => array(

						'opt_posts_block_posts' => array(
							'type' => 'multi-select',
							'label' => __( 'Choose Post', 'thshpr' ),
							'population' => 'posts',
							'source' => 'post',
							'desc' => __( 'Please type the name of the post you wish to use. If you use this ensure the above field is empty.','thshpr' ),
							'help' =>__( 'Begin typing and the field will search the posts, select the one you require', 'thshpr'  ),
						),

			        ),
			    ),
			    /**
			     * (optional) if is true, the borders between choice options will be shown
			     */
			    'show_borders' => true,
			),

			'opt_posts_block_ordering' => array(
				'label' => __( 'Order Method', 'thshpr' ),
				'type' => 'short-select',
				'value' => 'date',
				'desc' => __( 'Please choose how you wish the posts to be ordered.','thshpr' ),
				'choices' => array(
					'date' => 'date',
					'rand' => 'random',
					'name' => 'name',
					'author' => 'author',
					'parent' => 'parent',
				),
				'help' =>__( 'Determines the order which the posts will be displayed in the shortcode output', 'thshpr'  ),
			),

			'opt_posts_block_large_top'=>array(
				'type'  => 'switch',
				'value' => 'Yes',
				'label' => __('Show Large Top Post', 'thshpr'),
				'desc'  => __('Shows a larger image at the top of the posts column)', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),

			'opt_posts_block_thumbnail_behaviour' => array(
				'label' => __( 'Thumbnails hide / show', 'thshpr' ),
				'type' => 'short-select',
				'value' => 'date',
				'desc' => __( 'Please choose how you wish the thumbnails to be dispalyed','thshpr' ),
				'choices' => array(
					'show all' => 'show all',
					'hide all' => 'hide all',
					'hide on small posts' => 'hide on small posts',
				),
			),

			'opt_posts_block_bottom_margin'=>array(
				'type'  => 'switch',
				'value' => 'No',
				'label' => __('Bottom Margin of Block', 'thshpr'),
				'desc'  => __('Please enter a bottom margin for this block (will be applied for higher resolution devices)', 'thshpr'),
				'left-choice' => array(
					'value' => 'Yes',
					'label' => __('Yes', 'thshpr'),
				),
				'right-choice' => array(
					'value' => 'No',
					'label' => __('No', 'thshpr'),
				),
			),
        	//fw()->theme->get_options('general-shared-options'),

	    ),
	),


	/* post-elements options */
	'post_elements_options_box' => array(
    	'type' => 'tab',
		'title' => __('Post Element', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('post-elements-shared-options'),

		),
	),

	/* images options */
	'images_options_box' => array(
    	'type' => 'tab',
		'title' => __('Image', 'thshpr'),
    	'options' => array(

			fw()->theme->get_options('image-shared-options'),

		),
	),

);

?>
