<?php
/**
 * The template for displaying the compact header logo and navigation bar.
 *
 * Called by header.php
 *
 * @package naked
 */



//$search=$nude_options['opt_header_show_search'];

?>

<header>
	<div id="mobile-icon">
		<!--<a id="nav-toggle"  href="#sidr">MENU</a>-->
	</div>
	<section class="fw-main-row ">
		<div class="fw-container menu-nav">
			<div class="fw-row">
				<div class="fw-col-12 fw-col-md-12 fw-col-lg-4 vcenter-topbar">
					<div class="logo-container">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						echo '<img src="'.$image[0].'" class="logo">';
						?>
					</div>
				</div><!--
	    --><div class="fw-col-12 fw-col-md-12 fw-col-lg-8 vcenter-topbar">
					<nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</nav>
				</div>
			</div>
		</div><!-- .container -->
	</section>
</header>
