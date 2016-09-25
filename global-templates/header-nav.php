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
	$sticky_header=fw_get_db_customizer_option('opt_header_sticky');
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

	if ($horizontal_center)
	{
		$horizontal_center_class='horizontal-center';
	}
	else
	{
		$horizontal_center_class='';
	}

	if ($sticky_header)
	{

		$sticky_header_class='sticky-header';
	}
	else
	{
		$sticky_header_class='normal-header';
	}


}






?>
<div class="menu-hover-icon"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
    <div id="animatedModal">

		<div class="close-icon background-dark background-dark-hover close-animatedModal">
        	<i class="fa fa-times-thin close-inner" aria-hidden="true"></i>
		</div>


        <div class="modal-content">
			<div class="modal-container">

				<div class="fw-container">
					<div class="fw-row">


							<form class="fullscreen-form">
								<div class="fw-col-sm-9 ">
									<div class="fullscreen-input-container">
										<input class="fullscreen-input" type="search" placeholder="Search...">
										<div><?php _e( 'Type above and press the search icon or enter to search. Press Esc to cancel.', 'thshpr' ); ?></div>
									</div>
								</div>
								<div class="fw-col-sm-3">
									<div class="fullscreen-submit-container">
										<button class="fullscreen-submit" type="submit"></button>
									</div>
								</div>
							</form>


					</div>
				</div>

			</div>
		</div>

    </div>
<div class="header-container">
	<header class="<?php echo $horizontal_center_class; ?> <?php echo $sticky_header_class; ?>">

		<?php
		if($extra_top_bar_widget)
		{

			if ( is_active_sidebar( 'extra-top-bar-left' )||is_active_sidebar( 'extra-top-bar-right' ) )
			{
				if ( !is_active_sidebar( 'extra-top-bar-right' )  )
				{
					$column_left=12;
					$solumn_right=0;
					$pull_left="center";
					$pull_right="";
				}
				else
				{
					$column_left=6;
					$solumn_right=6;
					$pull_left="pull-left";
					$pull_right="pull-right";
				}
			?>
				<div class="extra-topbar">
					<div class="fw-container-fluid">
						<section class="fw-main-row">
							<div class="fw-col-md-<?php echo $column_left; ?> logo-holder widget-area" id="extra-top-bar-left">
								<div class="widget-container <?php echo $pull_left; ?>">
									<?php
									if ( is_active_sidebar( 'extra-top-bar-left' ))
									{
										dynamic_sidebar( 'extra-top-bar-left' );
									}
									?>
								</div>
							</div>
							<div class="fw-col-md-<?php echo $column_right; ?> logo-holder widget-area pull-right" id="extra-top-bar-right">
								<div class="widget-container <?php echo $pull_right; ?>">
								<?php
									if ( is_active_sidebar( 'extra-top-bar-right' ))
									{
										dynamic_sidebar( 'extra-top-bar-right' );
									}
									?>
								</div>
							</div>
						</section>
					</div>
				</div>
			<?php
			}
		}
		?>

		<div class="abs-container menu-logo">
			<section class="fw-main-row ">
				<div class="fw-container menu-nav">
					<div class="fw-row">
						<div class="fw-col-lg-3 fw-col-md-12 vcenter-topbar logo-holder" id="logo-holder">
							<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							echo '<img src="'.$image[0].'" class="logo">';
							$title = get_bloginfo( 'name' );
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() )
							{
								echo'<div class="site-description small-italic">'.$description.'</div>';
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
						<a id="nav-toggle" href="#sidr" class="dark-button-color">

							<div class="hamburger hamburger--elastic">
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
						<a id="nav-search" class="background-dark background-dark-hover" href="#animatedModal"><i class="fa fa-search" aria-hidden="true"></i></a>
						';
					}
					if($show_social==1)
					{
						echo'
						<div class="header-share-boxes share-boxes featured-posts-grid-paragraph component-element">
							<div class="absolute-container">
								<i class="fa fa-plus icon start-icon background-accent header"></i><!--';
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
</div>

<?php
if($show_progress_indicator)
{
	echo'<progress value="0" class="progress-indicator"></progress>';
}
?>
