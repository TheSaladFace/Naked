<?php
/**
 * Contains post elements options for single posts
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'h1_options' => array(
		'title' => __('H1', 'thshpr'),
		'options' => array(

			'opt_h1' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 50,
			        'line-height' => 56,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true,
			    ),
			    'label' => __('H1', 'thshpr'),
			    'desc'  => __('Choose the typography for all H1 header elements', 'thshpr'),
			),
		),
	),

	'h2_options' => array(
		'title' => __('H2', 'thshpr'),
		'options' => array(

			'opt_h2' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 40,
			        'line-height' => 42,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('H2', 'thshpr'),
			    'desc'  => __('Choose the typography for all H2 header elements', 'thshpr'),
			),
		),
	),

	'h3_options' => array(
		'title' => __('H3', 'thshpr'),
		'options' => array(

			'opt_h3' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
			        'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 24,
			        'line-height' => 30,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('H3', 'thshpr'),
			    'desc'  => __('Choose the typography for all H3 header elements', 'thshpr'),
			),
		),
	),

	'h4_options' => array(
		'title' => __('H4', 'thshpr'),
		'options' => array(

			'opt_h4' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 22,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('H4', 'thshpr'),
			    'desc'  => __('Choose the typography for all H4 header elements', 'thshpr'),
			),
		),
	),

	'h5_options' => array(
		'title' => __('H5', 'thshpr'),
		'options' => array(

			'opt_h5' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('H5', 'thshpr'),
			    'desc'  => __('Choose the typography for all H5 header elements', 'thshpr'),
			),
		),
	),

	'h6_options' => array(
		'title' => __('H6', 'thshpr'),
		'options' => array(

			'opt_h6' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 14,
			        'line-height' => 26,
			        'letter-spacing' => 0,
			        'color' => '#222222'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('H6', 'thshpr'),
			    'desc'  => __('Choose the typography for all H6 header elements', 'thshpr'),
			),
		),
	),

	'body_options' => array(
		'title' => __('Body Text', 'thshpr'),
		'options' => array(

			'opt_body' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 26,
			        'letter-spacing' => 0,
			        'color' => '#535353'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('Body Text', 'thshpr'),
			    'desc'  => __('Choose the typography for the body text', 'thshpr'),
			),
		),
	),

		'meta_options' => array(
		'title' => __('Meta Options', 'thshpr'),
		'options' => array(

			'opt_category_tag' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 11,
			        'line-height' => 11,
			        'letter-spacing' => 1,
			        'color' => '#ffffff'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('Categories / Tags', 'thshpr'),
			    'desc'  => __('Choose the typography for the category / tag components', 'thshpr'),
			),

			'opt_category_tag_font_color_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(255,255,255,1)',
			    // palette colors array
			    'palettes' => array( '#ffffff' ),
			    'label' => __('Category / Tag font color hover', 'thshpr'),
			    'desc'  => __('Choose the font color on mouse hover for this component', 'thshpr'),
			),

			'opt_category_tag_background' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(201,201,201,1)',
			    // palette colors array
			    'palettes' => array( '#c9c9c9'),
			    'label' => __('Category / Tag component background color', 'thshpr'),
			    'desc'  => __('Choose the background color for this component', 'thshpr'),
			),

			'opt_category_tag_background_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(0,0,0,1)',
			    // palette colors array
			    'palettes' => array( '#000000' ),
			    'label' => __('Category / Tag component background color hover', 'thshpr'),
			    'desc'  => __('Choose the background color on mouse hover for this component', 'thshpr'),
			),

			'opt_large_description' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
			        'family' => 'Droid Serif',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 17,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#a6a6a6'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('Large Excerpt', 'thshpr'),
			    'desc'  => __('Choose the typography for the large excerpt component', 'thshpr'),
				'help' => __( 'Used for the larger excerpt in some post blocks', 'thshpr' ),
			),

			'opt_small_description' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
			        'family' => 'Droid Serif',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 20,
			        'letter-spacing' => 0,
			        'color' => '#a6a6a6'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('Normal Excerpt', 'thshpr'),
			    'desc'  => __('Choose the typography for the normal excerpt component', 'thshpr'),
				'help' => __( 'Used for the excerpt in post blocks', 'thshpr' ),
			),

			'opt_other_meta' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Droid Serif',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 14,
			        'line-height' => 14,
			        'letter-spacing' => 0,
			        'color' => '#a6a6a6'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => __('Other Meta', 'thshpr'),
			    'desc'  => __('Choose the typography for the other meta elements', 'thshpr'),
			),
			'opt_other_meta_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(0,0,0,1)',
			    // palette colors array
			    'palettes' => array( '#000000' ),
			    'label' => __('Category / Tag font color hover', 'thshpr'),
			    'desc'  => __('Choose the font color on mouse hover for this component', 'thshpr'),
			),

		),
	),




);
