<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying the headers
 *
 *
 * @package naked
 */
	$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');
	wp_enqueue_style(   'thshpr-divider-css', $uri . '/static/css/style.css');
	$unique_id='id-'.$atts['id'];
	$header_text= $atts['opt_divider_header_text'];
	$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];
	$height=8;

	$style_string='"background-image: url('.$divider_type.'.png); height:'.$height.'px;transform: translateY('.$height.'px);"';


?>
	<div class="divider-header <?php echo $unique_id; ?>">
		<div class="divider-container">
			<?php
				echo'<div class="divider-background" style='.$style_string.'></div><h2 class="divider-h2">'.$header_text.'</h2>';
			?>
		</div>
	</div>
