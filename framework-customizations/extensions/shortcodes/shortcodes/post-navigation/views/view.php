<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying the headers
 *
 *
 * @package naked
 */

$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/header-variation-1');

$unique_id='id-'.$atts['id'];
$post_navigation_previous_text= $atts['opt_post_navigation_previous_text'];
$post_navigation_next_text= $atts['opt_post_navigation_next_text'];

$prev_post_string='<i class="fa fa-long-arrow-left" aria-hidden="true"></i>'.$post_navigation_previous_text;
$next_post_string=$post_navigation_next_text.'<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
echo'<div class="simple-page-nav">'.get_previous_post_link('%link',$prev_post_string).get_next_post_link('%link',$next_post_string).'</div>';
?>
