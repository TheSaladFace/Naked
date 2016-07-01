<?php
/**
 * The template for displaying the compact header logo and navigation bar.
 *
 * Called by header.php
 *
 * @package naked
 */



//$search=$nude_options['opt_header_show_search'];
if($show_search==1)
{
	$left_column_width=3;
}
else
{
	$left_column_width=4;
}
?>

<header>

	<div id="mobile-icon">
		<!--<a id="nav-toggle"  href="#sidr">MENU</a>-->
	</div>
	<section class="fw-main-row ">
		<div class="fw-container menu-nav">
			<div class="fw-row">
				<div class="fw-col-lg-<?php echo $left_column_width; ?> vcenter-topbar">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						echo '<img src="'.$image[0].'" class="logo">';

						$title = get_bloginfo( 'name' );
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() )
						{
							echo'<div class="site-description">'.$description.'</div>';
						}




						?>
				</div><!--
	    --><div class="fw-col-lg-8 vcenter-topbar">
				<div class="nav-container">
					<nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav>

				</div>
			</div><!--
	--><?php if($show_search==1)
	{
		echo('<div class="fw-col-lg-1 vcenter-topbar">
				<div class="search-container">
					<form class="searchbox">
						<input type="search" placeholder="'.__('Type then press enter to search...', 'thshpr' ).'" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
						<span class="searchbox-icon"></span>
					</form>
				</div>
			</div>');
	}
	?>
		</div>
	</div><!-- .container -->
</section>
	<?php
	if($show_progress_indicator)
	{
		echo'<progress value="0"></progress>';
	}
	?>
</header>
