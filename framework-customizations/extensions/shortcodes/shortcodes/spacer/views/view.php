<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for the spacer
 *
 *
 * @package naked
 */

$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/header-variation-1');

$unique_id='id-'.$atts['id'];
$spacer_height= $atts['opt_spacer_height'];

echo'<div class="spacer-shortcode" style="height:'.$spacer_height.'px"></div>';
?>
