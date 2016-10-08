<?php
/**
 * The Template for displaying all single posts.
 *
 * @package naked
 */

$post_categories=wp_get_post_categories(get_the_ID());
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

if(function_exists( 'fw_get_db_customizer_option' ))
{
	$sticky_header=fw_get_db_customizer_option('opt_header_sticky');
}

if(function_exists( 'fw_get_db_post_option' )) //check for post options
{
	//$value = fw_get_db_post_option(
    //'option_id/'. fw_get_db_post_option('option_id/'. 'gadget')
	$overrides=fw_get_db_post_option($post->ID, 'override_customizer');
	$override_customizer=$overrides['option-type'];

	/**
	  * These two ptions have to be in the post itself
	  */
	$subtitle=fw_get_db_post_option($post->ID, 'opt_subtitle');
	$back_image=fw_get_db_post_option($post->ID, 'opt_parallax_image');
	$background_image=$back_image['data']['icon'];

	if($override_customizer=='override')
	{
		/**
		  * General Options
		  */
		$show_progress_indicator=$overrides['override']['opt_show_progress_indicator'];
		$sidebar_type=$overrides['override']['opt_sidebar_type'];
		$sticky_sidebar=$overrides['override']['opt_sticky_sidebar'];
		$left_right_padding=$overrides['override']['opt_left_right_padding'];
		$show_fancy_prev_next=$overrides['override']['opt_show_fancy_prev_next'];

		/**
		  * Title Options
		  */
		$title_components_elements=$overrides['override']['opt_single_title_functionality'];
	  	$title_category_tag_number=$overrides['override']['opt_single_title_number_categories'];
	  	$title_show_author_image=$overrides['override']['opt_single_title_show_author_image'];
	  	$title_divider_type=$overrides['override']['opt_single_title_divider_type'];
	  	$title_shift_title=$overrides['override']['opt_title_shift_amount'];
	  	$title_margin_amount=$overrides['override']['opt_title_bottom_margin_amount'];

		/**
		  * General Images Options
		  */
		$offset_images=$overrides['override']['opt_offset_images'];
		$left_aligned_image_max_width=$overrides['override']['opt_left_aligned_image_max_width'];
		$right_aligned_image_max_width=$overrides['override']['opt_right_aligned_image_max_width'];
		$center_aligned_image_max_width=$overrides['override']['opt_center_aligned_image_max_width'];
		$non_aligned_image_max_width=$overrides['override']['opt_non_aligned_image_max_width'];

		/**
		  * Featured Images Options
		  */
		$featured_image_show=$overrides['override']['opt_featured_image_show'];
	  	$featured_image_link_to_full=$overrides['override']['opt_featured_image_link_to_full'];
	  	$width=$overrides['override']['opt_featured_image_max_width'];
	  	$large_image_ratio=$overrides['override']['opt_featured_image_ratio'];
	  	$large_height= thshpr_generate_aspect_height($large_image_ratio,$width);

		/**
		  * Fullscreen Header Image Options
		  */
		$header_image_width=1190;//hard set because scaling is used
	  	$header_show_image=$overrides['override']['opt_header_show_image'];
	  	$header_fade_image_scroll=$overrides['override']['opt_header_fade_image_scroll'];
	  	$header_image_height=$overrides['override']['opt_header_image_height'];
	  	$background_position=$overrides['override']['opt_background_position'];
	  	$background_color=$overrides['override']['opt_background_color'];
	  	$background_repeat=$overrides['override']['opt_background_repeat'];
	  	$background_size=$overrides['override']['opt_background_size'];
	  	$background_parallax_ratio=$overrides['override']['opt_background_parallax_ratio'];
	}
	else
	{
		/**
		  * General Options
		  */
		$show_progress_indicator=fw_get_db_customizer_option('opt_show_progress_indicator');
		$sidebar_type=fw_get_db_customizer_option('opt_sidebar_type');
		$sticky_sidebar=fw_get_db_customizer_option('opt_sticky_sidebar');
		$left_right_padding=fw_get_db_customizer_option('opt_left_right_padding');
		$show_fancy_prev_next=fw_get_db_customizer_option('opt_show_fancy_prev_next');

		/**
		  * Title Options
		  */
		$title_components_elements=fw_get_db_customizer_option('opt_single_title_functionality');
	  	$title_category_tag_number=fw_get_db_customizer_option('opt_single_title_number_categories');
	  	$title_show_author_image=fw_get_db_customizer_option('opt_single_title_show_author_image');
	  	$title_divider_type=fw_get_db_customizer_option('opt_single_title_divider_type');
	  	$title_shift_title=fw_get_db_customizer_option('opt_title_shift_amount');
	  	$title_margin_amount=fw_get_db_customizer_option('opt_title_bottom_margin_amount');

		/**
		  * General Images Options
		  */
		$offset_images=fw_get_db_customizer_option('opt_offset_images');
		$left_aligned_image_max_width=fw_get_db_customizer_option('opt_left_aligned_image_max_width');
		$right_aligned_image_max_width=fw_get_db_customizer_option('opt_right_aligned_image_max_width');
		$center_aligned_image_max_width=fw_get_db_customizer_option('opt_center_aligned_image_max_width');
		$non_aligned_image_max_width=fw_get_db_customizer_option('opt_non_aligned_image_max_width');

		/**
		  * Featured Images Options
		  */
		$featured_image_show=fw_get_db_customizer_option('opt_featured_image_show');
	  	$featured_image_link_to_full=fw_get_db_customizer_option('opt_featured_image_link_to_full');
	  	$width=fw_get_db_customizer_option('opt_featured_image_max_width');
	  	$large_image_ratio=fw_get_db_customizer_option('opt_featured_image_ratio');
	  	$large_height= thshpr_generate_aspect_height($large_image_ratio,$width);

		/**
		  * Fullscreen Header Image Options
		  */
		$header_image_width=1190;//hard set because scaling is used
	  	$header_show_image=fw_get_db_customizer_option('opt_header_show_image');
	  	$header_fade_image_scroll=fw_get_db_customizer_option('opt_header_fade_image_scroll');
	  	$header_image_height=fw_get_db_customizer_option('opt_header_image_height');
	  	$background_position=fw_get_db_customizer_option('opt_background_position');
	  	$background_color=fw_get_db_customizer_option('opt_background_color');
	  	$background_repeat=fw_get_db_customizer_option('opt_background_repeat');
	  	$background_size=fw_get_db_customizer_option('opt_background_size');
	  	$background_parallax_ratio=fw_get_db_customizer_option('opt_background_parallax_ratio');
	}

	/**
	  * Generate class strings on content columns and sidebar
	  */
	$content_column_string='';
	$content_inner_string='';
	$content_column_style_string='';
	if($sidebar_type=="left")
  	{
  		$content_column_string.="fw-col-md-8 m-right";
		$main_id='main-right';
  	}
  	else if($sidebar_type=="right")
  	{
  		$content_column_string.="fw-col-md-8 m-left";
		$main_id='main-left';
  	}
  	else
  	{
  		$content_column_string.="fw-col-md-12 m-center";
		$content_inner_string="left-right-padding";
		$main_id='main-center';
  	}
	if($offset_images==1)
	{
		$content_column_string.=" offset-featured-image";
	}
	if($title_shift_title>0)
	{
		$content_column_string.=" offset-title";
	}
	else
	{
		$content_column_string.=" no-offset-title";
	}
	$sticky_class="";
	if($sticky_sidebar&&$sticky_header)
	{
		$sticky_class="sticky-sidebar";
	}

	/**
	  * Generate title holder offset if required
	  */
	if($title_margin_amount>0)
	{
		$title_margin_adjust_string=' title-shift-margin-bottom';
	}

		/**
		  * Generates and outputs google fonts string, enqueues styles
		  */
		function thshpr_print_single_styles()
		{

			global $title_shift_title, $title_margin_amount, $left_right_padding, $header_margin_amount, $left_aligned_image_max_width, $right_aligned_image_max_width, $center_aligned_image_max_width, $non_aligned_image_max_width;

			$single_option_styles =
			'
		    @media only screen and (min-width : 320px)
		    {'
				.'.alignleft.wp-caption{width:100%;}'
				.'.alignright.wp-caption{width:100%;}'
				.'.aligncenter.wp-caption{width:100%;}'
				.'.alignnone.wp-caption{width:100%;}'

		    .'}

		    /* Extra Small Devices, Phones */
		    @media only screen and (min-width : 480px)
		    {'
				.'.alignleft.wp-caption{width:100%;}'
				.'.alignright.wp-caption{width:100%;}'
				.'.aligncenter.wp-caption{width:100%;}'
				.'.alignnone.wp-caption{width:100%;}'
		    .'}

		    /* Small Devices, Tablets */
		    @media only screen and (min-width : 768px)
		    {'
				.'.alignleft.wp-caption{width:100%;}'
				.'.alignright.wp-caption{width:100%;}'
				.'.aligncenter.wp-caption{width:100%;}'
				.'.alignnone.wp-caption{width:100%;}'
				.'.offset-featured-image{margin-top:0px;}'
				.'.offset-title{margin-bottom:0px;}'
		    .'}

		    /* Medium Devices, Desktops */
		    @media only screen and (min-width : 992px)
		    {'
				.'.alignleft.wp-caption{width:'.$left_aligned_image_max_width.'px; }'
				.'.alignright.wp-caption{width:'.$right_aligned_image_max_width.'px; }'
				.'.aligncenter.wp-caption{width:'.$center_aligned_image_max_width.'px; }'
				.'.alignnone.wp-caption{width:'.$non_aligned_image_max_width.'px; }'
				.'.offset-title{margin-top:-'.$title_shift_title.'px;}'
				.'.left-right-padding{padding:0px '.$left_right_padding.'px;}'
				.'.title-shift-margin-bottom{margin-bottom:'.$title_margin_amount.'px;}'
		    .'}

		    /* Large Devices, Wide Screens */
		    @media only screen and (min-width : 1200px)
		    {'
				.'.alignleft.wp-caption{width:'.$left_aligned_image_max_width.'px; }'
				.'.alignright.wp-caption{width:'.$right_aligned_image_max_width.'px; }'
				.'.aligncenter.wp-caption{width:'.$center_aligned_image_max_width.'px; }'
				.'.alignnone.wp-caption{width:'.$non_aligned_image_max_width.'px; }'
		    .'}';

			/*adds the styles to the end of optionstyle.css*/
	    	wp_add_inline_style( 'thshpr-style', esc_html($single_option_styles) );

		}
		add_action('wp_enqueue_scripts', 'thshpr_print_single_styles');


}
else
{
	$offset_class="";
	$image_offset_class="";
}
get_header();
include(locate_template('global-templates/page-borders.php'));
include(locate_template('global-templates/header-nav.php'));

if($show_fancy_prev_next)
{
	include(locate_template('single-templates/page-navigation.php'));
}
?>

<div class="body-main-content" id="body-main-content">

<?php
	if(function_exists( 'fw_get_db_post_option' ) && $header_show_image)
	{
		$parallax_string="";
		include(locate_template('single-templates/parallax-section-string.php')); //generates meta string from customzed options
		echo $parallax_string;

	}
?>




	<section class="fw-main-row ">
		<div class="fw-container ">
			<div class="fw-row">

				<?php
				if($sidebar_type=="left")
				{
					?>

					<div class="fw-col-md-4" id="sidebar-left">
						<div class="<?php echo $sticky_class; ?>">
							<?php get_sidebar(); ?>
						</div>
					</div><!-- close sidebar -->

					<?php
				}

								?>

				<div class="<?php echo $content_column_string; ?>" id="<?php echo $main_id; ?>">
					<div id="primary" class="content-area <?php echo $content_inner_string; ?>">


						<?php
						if ( have_posts() )
						{
							while ( have_posts() )
							{
								the_post();
								?>

								<div class="title-holder <?php echo $title_margin_adjust_string; ?>">
									<?php

									if(function_exists( 'fw_get_db_post_option' ))  //requires unyson plugin / options, if not enabled, don't display meta
									{
										$item_string="";
										$cell_class="single";//sets for the large header
										include(locate_template('single-templates/title-string.php')); //generates title string from customzed options
										echo $item_string;
									}

									?>
								</div>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

									<?php


											/* translators: %s: Name of current post */
											the_content();

											/*echo'<div class="meta-categories tags featured-posts-grid-paragraph component-element" id="post-tags"><span class="tags-label">'.__("Post Tags: ", "thshpr").'</span>';
											the_tags('','','');
											echo'</div>';*/

											/*if($show_author_info) disabled now, placed as a shortcode instead
											{
												include(locate_template('single-templates/author-bio.php'));

											}*/

											// If comments are open or we have at least one comment, load up the comment template.
											if ( comments_open() || get_comments_number() ) :
												comments_template();
											endif;
										?>





								</article><!-- #post-## -->

							<?php
							}
						}
						?>


					</div><!-- #primary -->
				</div><!-- close .main-content-inner -->

					<?php
					if($sidebar_type=="right")
					{
						?>
							<div class="fw-col-md-4" id="sidebar-right">
								<div class="<?php echo $sticky_class; ?>">
									<?php get_sidebar(); ?>
								</div>
							</div><!-- close sidebar -->

						<?php
					}
					?>

				</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			</div><!-- close .row -->
		</div><!-- close .container -->
	</section><!-- close .main-content -->
</div><!-- close .main-content -->
<?php //get_footer();
get_footer();
?>
