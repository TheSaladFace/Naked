<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes');
wp_enqueue_style('shared-shortcode-css', $uri . '/static/css/shared-style.css');wp_enqueue_style("your_style")

?>