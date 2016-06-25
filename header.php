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

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>
<?php
 get_template_part( 'templates/header', 'compact-logo-nav' );


?>
<div id="search" class="full-height">
				<form class="morphsearch-form">
					<input type="search" class="morphsearch-input" placeholder="Search ..." value="" name="s" title="Search for:">
					<div class="morphsearch-label">Type your keywords above and press enter to search. Press Esc to cancel.</div>
				</form>
				<div class="close-button"><i class="icon-cancel"></i></div>
</div>
