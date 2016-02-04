<?php
/**
 * Contains post block shortcode general options (ordering, categories)
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'id' => array( 'type' => 'unique' ), //for giving the shortcode instance a unique class for user styling

	'opt_posts_block_ordering' => array(
		'label' => __( 'Order Method', 'thshpr' ),
		'type' => 'short-select',
		'value' => 'date',
		'desc' => __( 'Please choose how you wish the posts to be ordered.','unyson' ),
		'choices' => array(
			'date' => 'date',
			'rand' => 'random',
			'name' => 'name',
			'author' => 'author',
			'parent' => 'parent',
		),
		'help' =>__( 'Determines the order which the posts will be displayed in the shortcode output', 'unyson'  ),
	),

	'opt_posts_block_categories' => array(
		'type' => 'multi-select',
		'label' => __( 'Population Categories', 'thshpr' ),
		'population' => 'taxonomy',
		'source' => 'category',
		'desc' => __( 'Please type the categories you wish to draw posts from.','unyson' ),
		'help' =>__( 'Begin typing and the field will search the categories, select the ones you require', 'unyson'  ),
	),

);
