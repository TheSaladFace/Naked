<?php
/**
 * Contains post block shortcode pagination options
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

$options = array(

	'opt_posts_block_pagination'=>array(
		'type'  => 'switch',
		'value' => 'Yes',
		'label' => __('Enable Pagination', 'thshpr'),
		'desc'  => __('Enables pagination. * Only one posts block should have pagination per page', 'thshpr'),
		'left-choice' => array(
			'value' => 'Yes',
			'label' => __('Yes', 'thshpr'),
		),
		'right-choice' => array(
			'value' => 'No',
			'label' => __('No', 'thshpr'),
		),
	),

	'opt_posts_block_next_post_text' => array(
		'label' => __( 'Next Post Text', 'thshpr' ),
		'type'  => 'text',
		'value' => 'Next',
		'desc'  => __( 'Enter the text to be used for the next post link ',
		'unyson' ),
		'help'       =>__( 'Unicode arrow codes can be used (e.g. http://character-code.com/arrows-html-codes.php)', 'thshpr'  ),
	),

	'opt_posts_block_prev_post_text' => array(
		'label' => __( 'Prev Post Text', 'thshpr' ),
		'type'  => 'text',
		'value' => 'Prev',
		'desc'  => __( 'Enter the text to be used for the previous post link ',
		'unyson' ),
		'help'       =>__( 'Unicode arrow codes can be used (e.g. http://character-code.com/arrows-html-codes.php)', 'thshpr'  ),
	),

	'opt_posts_block_number_posts'=> array(
		'label' => __( 'Maximum Number of Posts Per Page', 'thshpr' ),
		'type'  => 'text',
		'value' => '10',
		'desc'  => __( 'Please enter the maximum number of posts per page','thshpr' ),
		'help'  => __( 'Enter 0 for unlimited posts if pagination is turned off', 'thshpr' ),
	),

);
