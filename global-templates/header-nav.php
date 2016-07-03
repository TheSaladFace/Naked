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
	--><?php if($show_search==1||$show_social==1)
	{
		echo'<div class="fw-col-lg-1 vcenter-topbar">';

			if($show_search==1&&$show_social==1)
			{
				$search_spacer_class="search-spacer";
			}
			else
			{
				$search_spacer_class="";
			}
			if($show_search==1)
			{
				echo'<div class="search-container">
					<form class="searchbox">
						<input type="search" placeholder="'.__('Type then press enter to search...', 'thshpr' ).'" name="search" class="searchbox-input" onkeyup="buttonUp();" required>
						<span class="searchbox-icon"></span>
					</form>
				</div>';
			}

			if($show_social==1)
			{
				echo'<div class="share-boxes featured-posts-grid-paragraph component-element header-social-icons '.$search_spacer_class.'">
				    <div class="absolute-container">
				        <i class="fa fa-at icon start-icon"></i></span><!--';
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
				        	echo'--><span class="social-box email"><a class="inner email-inner" href="'.urlencode($social_email).'"><i class="fa fa-at icon"></i></a></span><!--';
						}
						echo'
				    </div>
				</div>';
			}

		echo'

		</div>';
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
