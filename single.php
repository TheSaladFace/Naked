<?php
/**
 * The Template for displaying all single posts.
 *
 * @package naked
 */

$post_categories=wp_get_post_categories(get_the_ID());
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

/** check for customisation options **/
if(function_exists( 'fw_get_db_customizer_option' ))
{
	/** side meta options **/
	$meta_components_elements=fw_get_db_customizer_option('opt_single_meta_functionality');
	$meta_category_tag_number=fw_get_db_customizer_option('opt_single_meta_number_categories');
	$meta_show_author_image=fw_get_db_customizer_option('opt_single_meta_show_author_image');
	$meta_divider_type=fw_locate_theme_path_uri('/static/img/').fw_get_db_customizer_option('opt_single_meta_divider_type');

	/** title options **/
	$title_components_elements=fw_get_db_customizer_option('opt_single_title_functionality');
	$title_category_tag_number=fw_get_db_customizer_option('opt_single_title_number_categories');
	$title_show_author_image=fw_get_db_customizer_option('opt_single_title_show_author_image');
	$title_divider_type=fw_locate_theme_path_uri('/static/img/').fw_get_db_customizer_option('opt_single_title_divider_type');
	$show_side_meta=fw_get_db_customizer_option('opt_show_side_meta');

	if($show_side_meta==1)
	{
		$entry_content_class="side-meta";
	}

	/** author info options **/
	$show_author_info=fw_get_db_customizer_option('opt_show_author_info');
}

if(function_exists( 'fw_get_db_post_option' )) //check for post options
{
	/** get the user selected post template **/
	$post_options=fw_get_db_post_option(get_the_ID(),'opt_post_template_picker');
	$post_template=$post_options["template"];
	if(	$post_template=="1")
	{
		/** fullscreen header image options **/
		$header_image_width=1190;//hard set because scaling is used
		$header_show_image=$post_options["1"]["opt_header_show_image"];
		$header_image_height=$post_options["1"]["opt_header_image_height"];
		$background_position=$post_options["1"]["opt_background_position"];
		$background_color=$post_options["1"]["opt_background_color"];
		$background_image=$post_options["1"]["opt_background_image"]['data']['icon'];
		$background_repeat=$post_options["1"]["opt_background_repeat"];
		$background_size=$post_options["1"]["opt_background_size"];
		$background_parallax_ratio=$post_options["1"]["opt_background_parallax_ratio"];
		$subtitle=$post_options["1"]["opt_subtitle"];
		$show_progress_indicator=$post_options["1"]["opt_show_progress_indicator"];
		$header_fade_image_scroll=$post_options["1"]["opt_header_fade_image_scroll"];

		/** hover items **/
		$show_hover_effects=$post_options["1"]["opt_featured_image_hover_effects"];
		$hover_top=thshpr_get_image_hover_string($post_options["1"]['opt_featured_image_hover_item_1']);
		$hover_bottom=thshpr_get_image_hover_string($post_options["1"]['opt_featured_image_hover_item_2']);
		/** image ratios **/
		$large_image_ratio=$post_options["1"]['opt_featured_image_ratio'];
		$width=$post_options["1"]['opt_featured_image_max_width'];
		$large_height= thshpr_generate_aspect_height($large_image_ratio,$width);
		$offset_featured_image=$post_options["1"]["opt_featured_image_offset_image"];

		$header_shift_title=$post_options["1"]["opt_header_shift_title"];

		if($header_shift_title==1)
		{
			$offset_class="offset-title";
		}
		else
		{
			$offset_class="";
		}

		if($offset_featured_image==1)
		{
			$image_offset_class="offset-featured-image";
		}
		else
		{
			$image_offset_class="";
		}

	}
}
else
{
	$offset_class="";
	$image_offset_class="";
}
get_header();

if($show_progress_indicator)
{
	echo'<progress value="0"></progress>';
}
include(locate_template('single-templates/page-navigation.php'));







if(function_exists( 'fw_get_db_post_option' ) && $header_show_image)
{
	$item_string="";
	include(locate_template('single-templates/parallax-section-string.php')); //generates meta string from customzed options
	echo $item_string;
}



?>

<section class="fw-main-row ">
	<div class="fw-container ">
		<div class="fw-row">



			<div class="fw-col-sm-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">


					<?php
					if ( have_posts() )
					{
						while ( have_posts() )
						{
							the_post();
							?>
							<div class="title-holder <?php echo $offset_class; ?>">
								<?php

								if(function_exists( 'fw_get_db_customizer_option' )) //requires unyson plugin / options, if not enabled, don't display meta
								{
									$item_string="";
									$cell_class="single";//sets for the large header
									include(locate_template('single-templates/title-string.php')); //generates title string from customzed options
									echo $item_string;
								}

								?>
							</div>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-meta <?php echo $entry_content_class; ?>">

								<?php

								if(function_exists( 'fw_get_db_customizer_option' )) //requires unyson plugin / options, if not enabled, don't display meta
								{
									if($show_side_meta==1)
									{
										include(locate_template('single-templates/meta-string.php')); //generates meta string from customzed options
										echo $item_string;
									}
								}
								?>

								</div><!-- .entry-meta -->
								<div class="entry-content">
									<?php
									if ( has_post_thumbnail() )
									{
										if(function_exists( 'fw_get_db_customizer_option' )) //requires unyson plugin / options, if not enabled, don't display meta
										{
											$item_string="";
											if($show_hover_effects=="No")
							                {
												$item_string.='<div class="'.$image_offset_class.' featured-image">';
							                    $image_string=thshpr_generate_image($width,$large_height,get_the_ID());
							                    $item_string.=$image_string.'</div>';
							                }
							                else
							                {
												$item_string.='<div class="effect-1 '.$image_offset_class.' featured-image">';
							                        $image_string=thshpr_generate_image($width,$large_height,get_the_ID());
							                        $item_string.=$image_string;
							                        $item_string.='

							                        <div class="item-1">
							                            <p><span class="centered">'.$hover_top.'</span></p>
							                        </div>
							                        <div class="item-2">
							                            <p><span class="centered">'.$hover_bottom.'</span></p>
							                        </div>
							                    </div>';
											}
											echo($item_string);
										}
									}


										/* translators: %s: Name of current post */
										the_content();

										echo'<div class="meta-categories tags featured-posts-grid-paragraph component-element" id="post-tags"><span class="tags-label">'.__("Post Tags: ", "thshpr").'</span>';
										the_tags('','','');
										echo'</div>';

										if($show_author_info)
										{
											include(locate_template('single-templates/author-bio.php'));

										}

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>



								</div><!-- .entry-content -->

							</article><!-- #post-## -->

						<?php
						}
					}
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- close .main-content-inner -->

			<div class="sidebar fw-col-sm-4">
				<?php get_sidebar(); ?>
			</div><!-- close sidebar -->



			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</section><!-- close .main-content -->
<?php //get_footer();
get_footer();
?>
