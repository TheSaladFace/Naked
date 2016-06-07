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
	$title_category_tag_number=fw_get_db_customizer_option('opt_single_title_functionality_number_categories');
	$title_show_author_image=fw_get_db_customizer_option('opt_single_title_functionality_show_author_image');
	$title_divider_type=fw_locate_theme_path_uri('/static/img/').fw_get_db_customizer_option('opt_single_title_divider_type');
	$show_side_meta=fw_get_db_customizer_option('opt_show_side_meta');

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

	}








}
else
{

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

					if(function_exists( 'fw_get_db_customizer_option' )) //requires unyson plugin / options, if not enabled, don't display meta
					{
						$item_string="";
						$cell_class="single";//sets for the large header
						include(locate_template('single-templates/title-string.php')); //generates title string from customzed options
						echo $item_string;
					}

					if ( have_posts() )
					{
						while ( have_posts() )
						{
							the_post();
							?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-meta">

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
										/* translators: %s: Name of current post */
										the_content();

										if($show_author_bio)
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
