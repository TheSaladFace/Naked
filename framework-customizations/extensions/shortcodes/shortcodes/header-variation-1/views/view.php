<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying the headers
 *
 *
 * @package naked
 */
 	$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/header-variation-1');
 	
	wp_enqueue_style(   'header-variation-1-css', $uri . '/static/css/header-variation-1.css');
	
	$unique_id='id-'.$atts['id'];
	$header_text= $atts['opt_divider_header_text'];


?>
	<div class="header-variation-1-container <?php echo $unique_id; ?>">
		<div class="header-variation-1">
			<h2 class="header-variation-1-h2">	
				<?php 
					echo $header_text; 
				?>
			</h2>
		</div>
		<div class="header-variation-1-border"></div>
	</div>

