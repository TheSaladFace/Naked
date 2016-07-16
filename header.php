<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package naked
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<?php
	if(function_exists( 'fw_get_db_customizer_option' ))
	{

		/*header options*/
		$show_site_borders=fw_get_db_customizer_option('opt_show_site_borders');
		$site_borders_size=fw_get_db_customizer_option('opt_site_borders_size');

	}
	else
	{
		$show_site_borders=1;
		$site_borders_size=20;
	}
	/*generate body spacing string for site borders*/
	if($show_site_borders)
	{
		$body_spacing_style='style="padding:'.$site_borders_size.'px"';
		$data_spacing='data-spacing="'.$site_borders_size.'"';
	}
	else
	{
		$body_spacing_style='';
		$data_spacing='data-spacing="0"';
	}
?>
<body <?php echo $body_spacing_style; ?> <?php echo $data_spacing; ?> <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
