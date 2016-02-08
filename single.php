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
		//echo $header_show_image;
	}








}
else
{

}
get_header();

$prev_post = get_adjacent_post( true, '', true, 'category' );
$next_post = get_adjacent_post( true, '', false, 'category' );

//enqueue stellar
	wp_enqueue_script("naked-stellar");
	wp_enqueue_script("naked-stellar-init");

if (!empty( $prev_post )||!empty( $next_post ) )
{
	?>

	<nav class="nav-doubleflip page-nav">

	<?php
	if (!empty( $prev_post ) )
	{
		$prev_post_id=$prev_post->ID;
		$prev_post_title=$prev_post->post_title;
		$prev_post_url=$prev_post->guid;
		$prev_hide_thumb_string="no-image";
		$prev_thumb="";
		if ( has_post_thumbnail($prev_post_id) )
		{
			$prev_thumb=get_the_post_thumbnail($prev_post_id,'prevnext' );
			$prev_hide_thumb_string="image";
		}

		?>

			<a class="prev" href="<?php echo $prev_post_url; ?>">
				<span class="icon-wrap icon-wrap-left"><i class="icon-left-open-big"></i></span>
				<div class="<?php echo $prev_hide_thumb_string; ?>">
					<?php echo $prev_thumb; ?>
					<div class="title-container"><span class="title"><?php echo $prev_post_title; ?><br/>&#8594;</span></div>
				</div>
			</a>

		<?php
	}
	if (!empty( $next_post ) )
	{
		$next_post_id=$next_post->ID;
		$next_post_title=$next_post->post_title;
		$next_post_url=$next_post->guid;
		$next_hide_thumb_string="no-image";
		$next_thumb="";
		if ( has_post_thumbnail($next_post_id) )
		{
			$next_thumb=get_the_post_thumbnail($next_post_id,'prevnext' );
			$next_hide_thumb_string="image";
		}
		?>

		<a class="next" href="<?php echo $next_post_url; ?>">
			<span class="icon-wrap icon-wrap-left"><i class="icon-right-open-big"></i></span>
			<div class="<?php echo $next_hide_thumb_string; ?>">
				<?php echo $next_thumb; ?>
				<div class="title-container"><span class="title"><?php echo $next_post_title; ?><br/>&#8594;</span></div>
			</div>
		</a>

		<?php
	}
	?>

	</nav>

	<?php
}




if(function_exists( 'fw_get_db_post_option' )&&$header_show_image) //requires unyson plugin / options, if not enabled, don't display meta
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
									$item_string="";
									include(locate_template('single-templates/meta-string.php')); //generates meta string from customzed options
									echo $item_string;
								}
								?>

								</div><!-- .entry-meta -->
								<div class="entry-content">
									<?php
										/* translators: %s: Name of current post */
										the_content( sprintf(
											__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
											the_title( '<span class="screen-reader-text">', '</span>', false )
										) );

										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
										) );
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
