<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes');
wp_register_style('shared-shortcode-css', $uri . '/static/css/shared-style.css');

?>
