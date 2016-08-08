<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying the headers
 *
 *
 * @package naked
 */

$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/header');

$unique_id='id-'.$atts['id'];
$header_type= $atts['opt_header_type'];
$header_text= $atts['opt_header_text'];
$header_fancy_header_show_bottom=$atts['opt_header_fancy_header_show_bottom'];
$header_fancy_header_show_accent=$atts['opt_header_fancy_header_show_accent'];

$header_class_string="";
if($header_type)
{
	$header_class_string.=" fancy-header";
	if($header_fancy_header_show_bottom)
	{
		$header_class_string.=" show-bottom";
	}
	if($header_fancy_header_show_accent)
	{
		$header_class_string.=" accent-line";
	}
}

?>

<h2 class="special-header <?php echo $unique_id;?> <?php echo $header_class_string; ?>">
	<?php
		echo $header_text;
	?>
</h2>
