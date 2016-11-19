<?php
/**
* The Template for displaying search results. This is a near duplicate of the archives template (minus the specific archive overrides)
*
* @package naked
*/

if(function_exists( 'fw_get_db_customizer_option' ))
{
	$sticky_header=fw_get_db_customizer_option('opt_header_sticky');

	/** Paths **/
	$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-standard-blog');
	$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css

	/** Style and JS Includes **/
	wp_enqueue_style('thshpr-posts-block-standard-blog', $uri . '/static/css/style.css');
	wp_enqueue_script('thshpr-match-height', $uri . '/static/js/jquery.matchHeight-min.js',array('jquery'),'',true );
	wp_enqueue_script('thshpr-strap-point', $uri . '/static/js/strapPoint.min.js',array('jquery'),'',true );
	/** The equal heights is a little tricky. We must make the two columns equal heights to allow for vertical centering
	but we only want this to apply when the columns are parallel (not at tablet / mobile after bootstrap makes a single column).
	So we need to use match height and strap point this coding is contained in inits.js **/
	wp_enqueue_script('blog-inits', $uri . '/static/js/inits.js',array('jquery','thshpr-match-height','thshpr-strap-point'),'',true );

	/** Other variables from options **/
	$order_by=fw_get_db_customizer_option('opt_posts_block_ordering');
	$show_hover_effects=fw_get_db_customizer_option('opt_posts_block_hover_effects');
	$category_tag_number=fw_get_db_customizer_option('opt_posts_block_number_categories');
	$excerpt_length=fw_get_db_customizer_option('opt_posts_block_excerpt_length');
	$large_excerpt_length=fw_get_db_customizer_option('opt_posts_block_large_excerpt_length');
	$post_components_elements=fw_get_db_customizer_option('opt_posts_block_functionality');
	$read_more=fw_get_db_customizer_option('opt_posts_block_read_more_text');
	$max_posts=fw_get_db_customizer_option('opt_posts_block_number_posts');
	$divider_type=fw_get_db_customizer_option('opt_divider_type');
	$show_author_image=fw_get_db_customizer_option('opt_posts_block_show_author_image');

	/** Specific shortcode variables **/
	$show_divider=fw_get_db_customizer_option('opt_posts_block_show_divider');
	$enabled_pagination=fw_get_db_customizer_option('opt_posts_block_pagination');
	$next_text=fw_get_db_customizer_option('opt_posts_block_next_post_text');
	$prev_text=fw_get_db_customizer_option('opt_posts_block_prev_post_text');
	$small_hide_excerpt=0;
	$show_page_numbers=fw_get_db_customizer_option('opt_posts_block_show_page_numbers');

	$layout=fw_get_db_customizer_option('opt_posts_block_layout');
	$vertical_align_columns=fw_get_db_customizer_option('opt_posts_block_vertical_align_columns');

	/** hover items **/
	$hover_top=thshpr_get_image_hover_string(fw_get_db_customizer_option('opt_image_hover_item_1'));
	$hover_bottom=thshpr_get_image_hover_string(fw_get_db_customizer_option('opt_image_hover_item_2'));

	/** image ratios **/
	$large_image_ratio=fw_get_db_customizer_option('opt_large_image_ratio');
	$small_image_ratio=fw_get_db_customizer_option('opt_small_image_ratio');
	$small_width=fw_get_db_customizer_option('opt_small_image_max_width');
	$large_width=fw_get_db_customizer_option('opt_large_image_max_width');//needs adding to options
	$large_height= thshpr_generate_aspect_height($large_image_ratio,$large_width);
	$small_height= thshpr_generate_aspect_height($small_image_ratio,$small_width);

	/**
	* General Options
	*/
	$show_progress_indicator=fw_get_db_customizer_option('opt_show_progress_indicator');
	$sidebar_type=fw_get_db_customizer_option('opt_sidebar_type');
	$sticky_sidebar=fw_get_db_customizer_option('opt_sticky_sidebar');
	$center_title=fw_get_db_customizer_option('opt_posts_block_center_title');
	$title_overlay_image=fw_get_db_customizer_option('opt_posts_block_title_overlay_image');

	$title_overlay_image_string="";

	/**
	* Fullscreen Image Options
	*/
	$header_image_width=1190;//hard set because scaling is used
	$back_image=fw_get_db_customizer_option('opt_categories_header_parallax_image');

	$background_image="";
	if(isset($back_image['data']['icon']))
	{
		$background_image=$back_image['data']['icon'];
	}

	$header_fade_image_scroll=fw_get_db_customizer_option('opt_categories_header_fade_image_scroll');
	$header_image_height=fw_get_db_customizer_option('opt_categories_header_image_height');
	$background_position=fw_get_db_customizer_option('opt_categories_background_position');
	$background_color=fw_get_db_customizer_option('opt_categories_background_color');
	$background_repeat=fw_get_db_customizer_option('opt_categories_background_repeat');
	$background_size=fw_get_db_customizer_option('opt_categories_background_size');
	$background_parallax_ratio=fw_get_db_customizer_option('opt_categories_background_parallax_ratio');

	/**
	* Title Options
	*/
	$breadcrumbs_homepage_title=fw_get_db_customizer_option('opt_breadcrumbs_homepage_title');
	$title_components_elements=fw_get_db_customizer_option('opt_categories_title_functionality');
	$header_divider_type=fw_get_db_customizer_option('opt_categories_title_divider_type');
}

if($show_page_numbers=="Yes")
{
	$show_page_numbers_string="show-page-numbers";
}
else
{
	$show_page_numbers_string="no-page-numbers";
}

if($vertical_align_columns=="Yes")
{
	$vertical_align_columns_string="eq-height";
}
else
{
	$vertical_align_columns_string="";
}

if($title_overlay_image=="Yes" && $background_image!="") //if the image isn't present we cant have this
{
	$title_overlay_image_string="archive-title-image-overlay";
}

$center_title_string="";
if($center_title=="Yes")
{
	$center_title_string="center";
}

$post_categories=$wp_query->get_queried_object_id();
$content_column_string='';

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


get_header();
include(locate_template('global-templates/page-borders.php'));
include(locate_template('global-templates/header-nav.php'));

?>
<div class="body-main-content" id="body-main-content">
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
					<div id="primary" class="content-area offset-title">


						<div class="featured-posts-grid grid-2-col blog-standard">

							<?php
							include(locate_template('global-templates/content-none.php'));
							?>
						</div>
					</div>
				</div>

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
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
