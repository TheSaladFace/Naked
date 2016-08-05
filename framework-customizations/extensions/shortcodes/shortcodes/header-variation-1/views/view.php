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
$header_text= $atts['opt_divider_header_text'];
?>

<h2 class="header-variation-1-h2 <?php echo $unique_id; ?>">
	<?php
		echo $header_text;
	?>
</h2>
