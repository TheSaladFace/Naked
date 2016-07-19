<?php
/**
 * The template for displaying the compact header logo and navigation bar.
 *
 * Called by header.php
 *
 * @package naked
 */

if(function_exists( 'fw_get_db_customizer_option' ))
{

	/*header options*/
	$show_search=fw_get_db_customizer_option('opt_header_show_search');
	$show_social=fw_get_db_customizer_option('opt_header_show_social');
	$horizontal_center=fw_get_db_customizer_option('opt_header_horizontal_center');
	$extra_top_bar_widget=fw_get_db_customizer_option('opt_header_extra_top_bar_widgets');
	$social_twitter=fw_get_db_customizer_option('opt_social_twitter');
	$social_facebook=fw_get_db_customizer_option('opt_social_facebook');
	$social_googleplus=fw_get_db_customizer_option('opt_social_googleplus');
	$social_linkedin=fw_get_db_customizer_option('opt_social_linkedin');
	$social_youtube=fw_get_db_customizer_option('opt_social_youtube');
	$social_pinterest=fw_get_db_customizer_option('opt_social_pinterest');
	$social_instagram=fw_get_db_customizer_option('opt_social_instagram');
	$social_tumblr=fw_get_db_customizer_option('opt_social_tumblr');
	$social_vine=fw_get_db_customizer_option('opt_social_vine');
	$social_snapchat=fw_get_db_customizer_option('opt_social_snapchat');
	$social_reddit=fw_get_db_customizer_option('opt_social_reddit');
	$social_flickr=fw_get_db_customizer_option('opt_social_flickr');
	$social_email=fw_get_db_customizer_option('opt_social_email');


}






?>
    <div id="animatedModal">
		<div class="close-icon background-dark close-animatedModal">
        	<i class="fa fa-times close-inner" aria-hidden="true"></i>
		</div>


        <div class="modal-content">
			<div class="modal-container">

				<div class="fw-container">
					<div class="fw-row">


							<form class="fullscreen-form">
								<div class="fw-col-sm-9 ">
									<input class="fullscreen-input" type="search" placeholder="Search...">
									<span>Type above and press the search icon to search. Press Esc to cancel.</span>
								</div>
								<div class="fw-col-sm-3">
									<button class="fullscreen-submit pull-right" type="submit"></button>
								</div>
							</form>


					</div>
				</div>

			</div>
		</div>

    </div>

<header>

	<div class="abs-container menu-logo">
		<section class="fw-main-row ">
			<div class="fw-container menu-nav">
				<div class="fw-row">
					<div class="fw-col-lg-3 fw-col-md-12 vcenter-topbar logo-holder">
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
		    --><div class="fw-col-lg-9 fw-col-md-12 vcenter-topbar nav-outer">
					<div class="nav-container">
						<nav id="primary-navigation" class="site-navigation primary-navigation " role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
						</nav>
					</div>
				</div>


			</div>

		</div><!-- .container -->

	</section>
</div>
<div class="abs-container header-extra">
	<section class="fw-main-row">
		<div class="fw-container-fluid menu-nav">
			<div class="fw-col-xs-6 pull-left">
				<div class="pull-left">
					<a id="nav-toggle" href="#sidr">

						<div class="hamburger hamburger--emphatic">
						  <div class="hamburger-box">
						    <div class="hamburger-inner"></div>
						  </div>
						</div>

					</a>
				</div>
			</div><!--
	--><div class="fw-col-xs-6 pull-right">
			<div class="pull-right right-extras">
				<?php
				if($show_search==1)
				{
					echo'
					<a id="nav-search" class="background-dark" href="#animatedModal"><i class="fa fa-search" aria-hidden="true"></i></a>
					';
				}
				if($show_social==1)
				{
					echo'
					<div class="header-share-boxes featured-posts-grid-paragraph component-element">
						<div class="absolute-container">
							<i class="fa fa-plus icon start-icon background-accent"></i><!--';
							if(isset($social_facebook))
							{
								echo'--><span class="social-box facebook"><a class="inner facebook-inner" href="'.urlencode($social_facebook).'"><i class="fa fa-facebook icon"></i></a></span><!--';
							}
							if(isset($social_twitter))
							{
								echo'--><span class="social-box facebook"><a class="inner twitter-inner" href="'.urlencode($social_twitter).'"><i class="fa fa-twitter icon"></i></a></span><!--';
							}
							if(isset($social_googleplus))
							{
								echo'--><span class="social-box googleplus"><a class="inner google-plus-inner" href="'.urlencode($social_googleplus).'"><i class="fa fa-google-plus icon"></i></a></span><!--';
							}
							if(isset($social_linkedin))
							{
								echo'--><span class="social-box linkedin"><a class="inner linked-in-inner" href="'.urlencode($social_linkedin).'"><i class="fa fa-linkedin icon"></i></a></span><!--';
							}
							if(isset($social_youtube))
							{
								echo'--><span class="social-box youtube"><a class="inner youtube-inner" href="'.urlencode($social_youtube).'"><i class="fa fa-youtube icon"></i></a></span><!--';
							}
							if(isset($social_instagram))
							{
								echo'--><span class="social-box instagram"><a class="inner instagram-inner" href="'.urlencode($social_instagram).'"><i class="fa fa-instagram icon"></i></a></span><!--';
							}
							if(isset($social_pinterest))
							{
								echo'--><span class="social-box pinterest"><a class="inner pinterest-inner" href="'.urlencode($social_pinterest).'"><i class="fa fa-pinterest icon"></i></a></span><!--';
							}
							if(isset($social_tumblr))
							{
								echo'--><span class="social-box tumblr"><a class="inner tumblr-inner" href="'.urlencode($social_tumblr).'"><i class="fa fa-tumblr icon"></i></a></span><!--';
							}
							if(isset($social_vine))
							{
								echo'--><span class="social-box vine"><a class="inner vine-inner" href="'.urlencode($social_vine).'"><i class="fa fa-vine icon"></i></a></span><!--';
							}
							if(isset($social_snapchat))
							{
								echo'--><span class="social-box snapchat"><a class="inner snapchat-inner" href="'.urlencode($social_snapchat).'"><i class="fa fa-snapchat icon"></i></a></span><!--';
							}
							if(isset($social_reddit))
							{
								echo'--><span class="social-box reddit"><a class="inner reddit-inner" href="'.urlencode($social_reddit).'"><i class="fa fa-reddit icon"></i></a></span><!--';
							}
							if(isset($social_flickr))
							{
								echo'--><span class="social-box flickr"><a class="inner flickr-inner" href="'.urlencode($social_flickr).'"><i class="fa fa-flickr icon"></i></a></span><!--';
							}
							if(isset($social_email))
							{
								echo'--><span class="social-box email"><a class="inner email-inner" href="'.urlencode($social_email).'"><i class="fa fa-at icon"></i></a></span>';
							}
							echo'
						</div>
					</div>';
				}
				?>



			</div>
		</div>

		</div>
	</section>
</div>


</header>

<?php
if($show_progress_indicator)
{
	echo'<progress value="0" class="progress-indicator"></progress>';
}
?>
