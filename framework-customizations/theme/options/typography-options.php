<?php
/**
 * Contains post elements options for single posts
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'h1_options' => array(
		'title' => _('H1', 'thshpr'),
		'options' => array(

			'opt_h1' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 60,
			        'line-height' => 60,
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
			    'label' => _('H1 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h1_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 54,
			        'line-height' => 56,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H1 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h1_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 50,
			        'line-height' => 52,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H1 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h1_extra_small_devices_phones' =>array(
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
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H1 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h1_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 34,
			        'line-height' => 37,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H1 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),
		),
	),

	'h2_options' => array(
		'title' => _('H2', 'thshpr'),
		'options' => array(

			'opt_h2' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 50,
			        'line-height' => 52,
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
			    'label' => _('H2 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h2_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 46,
			        'line-height' => 46,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H2 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h2_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 40,
			        'line-height' => 42,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H2 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h2_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 32,
			        'line-height' => 36,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H2 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h2_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 27,
			        'line-height' => 32,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H2 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),
		),
	),

	'h3_options' => array(
		'title' => _('H3', 'thshpr'),
		'options' => array(

			'opt_h3' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
			        'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 42,
			        'line-height' => 45,
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
			    'label' => _('H3 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h3_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 38,
			        'line-height' => 41,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H3 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h3_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' =>34,
			        'line-height' => 38,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H3 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h3_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 28,
			        'line-height' => 31,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H3 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h3_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 24,
			        'line-height' => 28,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H3 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'h4_options' => array(
		'title' => _('H4', 'thshpr'),
		'options' => array(

			'opt_h4' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 32,
			        'line-height' => 38,
			        'letter-spacing' => 0,
			        'color' => '#2c2c2c'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => _('H4 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h4_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 28,
			        'line-height' => 33,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H4 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h4_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 24,
			        'line-height' => 29,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H4 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h4_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 22,
			        'line-height' => 27,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H4 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h4_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 22,
			        'line-height' => 27,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H4 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'h5_options' => array(
		'title' => _('H5', 'thshpr'),
		'options' => array(

			'opt_h5' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
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
			    'label' => _('H5 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h5_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H5 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h5_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H5 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h5_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H5 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h5_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' =>24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H5 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'h6_options' => array(
		'title' => _('H6', 'thshpr'),
		'options' => array(

			'opt_h6' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
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
			    'label' => _('H6 Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_h6_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H6 - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_h6_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H6 - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_h6_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H6 - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_h6_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('H6 - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'body_options' => array(
		'title' => _('Body Text', 'thshpr'),
		'options' => array(

			'opt_body' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 18,
			        'line-height' => 26,
			        'letter-spacing' => 0,
			        'color' => '#696969'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => _('Body Text Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_body_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 18,
			        'line-height' => 26,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_body_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 17,
			        'line-height' => 25,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_body_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_body_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 24,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'article_lead_text' => array(
		'title' => _('Single Post Lead Text', 'thshpr'),
		'options' => array(

			'opt_article_lead' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 32,
			        'line-height' => 38,
			        'letter-spacing' => 0,
			        'color' => '#2c2c2c'
			    ),
			    'components' => array(
			        'family'         => true,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => true,
			        'color'          => true
			    ),
			    'label' => _('Article Lead Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_article_lead_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 28,
			        'line-height' => 33,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Article Lead - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_article_lead_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 24,
			        'line-height' => 29,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Article Lead - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_article_lead_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 22,
			        'line-height' => 27,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Article Lead - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_article_lead_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 22,
			        'line-height' => 27,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Article Lead - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),


	'small_italic_options' => array(
		'title' => _('Small Italic Text', 'thshpr'),
		'options' => array(

			'opt_small_italic' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 15,
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
			    'label' => _('Body Text Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_small_italic_font_hover_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#111111',
		    'label' => __('Small Italic Links Font Hover Color', 'thshpr'),
		    'desc'  => __('Choose a color for the font on mouse hover for the small italic links', 'thshpr'),
		    ),
			'opt_small_italic_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 15,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),
			'opt_small_italic_small_devices_tablets' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 15,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Small Devices / Tablets', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / tablets (768px+)', 'thshpr'),
			),
			'opt_small_italic_extra_small_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 15,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Small Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (480px+)', 'thshpr'),
			),
			'opt_small_italic_tiny_devices_phones' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 15,
			        'line-height' => 15,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Body - Tiny Devices / Phones', 'thshpr'),
			    'desc'  => _('Choose the size and line height for small devices / phones (320px+)', 'thshpr'),
			),

		),
	),

	'sidebar_h3_options' => array(
		'title' => _('Widget Headers', 'thshpr'),
		'options' => array(

			'opt_sidebar_header_accent' =>array(
				'type'  => 'switch',
				'value' => '1',
				'label' => __('Show Widget Header Accent', 'thshpr'),
				'help' => __( 'This will show the black line above the widget header', 'thshpr'  ),
				'left-choice' => array(
					'value' => '1',
					'label' => __('Show', 'thshpr'),
				),
				'right-choice' => array(
					'value' => '0',
					'label' => __('Hide', 'thshpr'),
				),
			),

			'opt_sidebar_h3' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
			        'family' => 'Playfair Display',
					'style' => 'italic',
        			'weight' => 400,
			        'size' => 32,
			        'line-height' => 38,
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
			    'label' => _('Widget Header Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_sidebar_h3_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'Playfair Display',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 32,
			        'line-height' => 38,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Widget Header - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),

		),
	),



	'sidebar_paragraph_options' => array(
		'title' => _('Sidebar Paragraph', 'thshpr'),
		'options' => array(

			'opt_sidebar_paragraph' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 25,
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
			    'label' => _('Sidebar Paragraph Large Devices / Widescreens', 'thshpr'),
			    'desc'  => _('Choose the typography for large devices / wide screens (1200px+)', 'thshpr'),
			),
			'opt_sidebar_paragraph_medium_devices_desktops' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 16,
			        'line-height' => 25,
			        'letter-spacing' => 0,
			        'color' => '#111111'
			    ),
			    'components' => array(
			        'family'         => false,
			        'size'           => true,
			        'line-height'    => true,
			        'letter-spacing' => false,
			        'color'          => false,
			    ),
			    'label' => _('Sidebar Paragraph - Medium Devices / Desktops', 'thshpr'),
			    'desc'  => _('Choose the size and line height for medium devices / desktops (992px+)', 'thshpr'),
			),

		),
	),

	'tag_category_options' => array(
		'title' => _('Tags / Categories', 'thshpr'),
		'options' => array(

			'opt_tags_categories' =>array(
			    'type' => 'typography-v2',
			    'value' => array(
					'family' => 'PT Serif',
					'style' => 'regular',
        			'weight' => 400,
			        'size' => 11,
			        'line-height' => 12,
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
			    'label' => _('Tags / Categories', 'thshpr'),
			    'desc'  => _('Choose the typography for tags / categories', 'thshpr'),
			),
			'opt_tags_categories_font_hover_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#ffffff',
		    'label' => __('Tags / Categories Font Hover Color', 'thshpr'),
		    'desc'  => __('Choose a color for the font on mouse hover for the tags / categories / tag clouds', 'thshpr'),
		    ),
			'opt_tags_categories_background_color' =>array(
		    'type'  => 'color-picker',
		    'value' => '#c9c9c9',
		    'label' => __('Tags / Categories Background Color', 'thshpr'),
		    'desc'  => __('Choose a background color for the tags / categories / tag clouds', 'thshpr'),
		    ),
			'opt_tags_categories_background_color_hover' =>array(
		    'type'  => 'color-picker',
		    'value' => '#111111',
		    'label' => __('Tags / Categories Background Hover Color', 'thshpr'),
		    'desc'  => __('Choose a background color on mouse hover for the tags / categories / tag clouds', 'thshpr'),
		    ),


		),
	),


	/*	'meta_options' => array(
		'title' => _('Meta Options', 'thshpr'),
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
			    'label' => _('Categories / Tags', 'thshpr'),
			    'desc'  => _('Choose the typography for the category / tag components', 'thshpr'),
			),

			'opt_category_tag_font_color_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(255,255,255,1)',
			    // palette colors array
			    'palettes' => array( '#ffffff' ),
			    'label' => _('Category / Tag font color hover', 'thshpr'),
			    'desc'  => _('Choose the font color on mouse hover for this component', 'thshpr'),
			),

			'opt_category_tag_background' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(201,201,201,1)',
			    // palette colors array
			    'palettes' => array( '#c9c9c9'),
			    'label' => _('Category / Tag component background color', 'thshpr'),
			    'desc'  => _('Choose the background color for this component', 'thshpr'),
			),

			'opt_category_tag_background_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(0,0,0,1)',
			    // palette colors array
			    'palettes' => array( '#000000' ),
			    'label' => _('Category / Tag component background color hover', 'thshpr'),
			    'desc'  => _('Choose the background color on mouse hover for this component', 'thshpr'),
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
			    'label' => _('Large Excerpt', 'thshpr'),
			    'desc'  => _('Choose the typography for the large excerpt component', 'thshpr'),
				'help' => _( 'Used for the larger excerpt in some post blocks', 'thshpr' ),
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
			    'label' => _('Normal Excerpt', 'thshpr'),
			    'desc'  => _('Choose the typography for the normal excerpt component', 'thshpr'),
				'help' => _( 'Used for the excerpt in post blocks', 'thshpr' ),
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
			    'label' => _('Other Meta', 'thshpr'),
			    'desc'  => _('Choose the typography for the other meta elements', 'thshpr'),
			),
			'opt_other_meta_hover' =>array(
			    'type'  => 'rgba-color-picker',
			    'value' => 'rgba(0,0,0,1)',
			    // palette colors array
			    'palettes' => array( '#000000' ),
			    'label' => _('Category / Tag font color hover', 'thshpr'),
			    'desc'  => _('Choose the font color on mouse hover for this component', 'thshpr'),
			),

		),
	),*/




);
