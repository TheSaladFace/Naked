<?php
/**
 * Generates HTML output for the standard blog Shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

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

/** Generate category id string **/
$post_categories=$atts["opt_posts_block_categories"];
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

/** Other variables from options **/
$unique_id='id-'.$atts['id'];
$order_by=$atts["opt_posts_block_ordering"];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];
$category_tag_number=$atts["opt_posts_block_number_categories"];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$large_excerpt_length=$atts["opt_posts_block_large_excerpt_length"];
$components_elements=$atts["opt_posts_block_functionality"];
$read_more=$atts['opt_posts_block_read_more_text'];
$max_posts=$atts['opt_posts_block_number_posts'];
$divider_type=$atts['opt_divider_type'];
$show_author_image=$atts['opt_posts_block_show_author_image'];

/** Specific shortcode variables **/
$show_divider=$atts["opt_posts_block_show_divider"];
$enabled_pagination=$atts['opt_posts_block_pagination'];
$next_text=$atts['opt_posts_block_next_post_text'];
$prev_text=$atts['opt_posts_block_prev_post_text'];
$small_hide_excerpt=0;
$show_page_numbers=$atts['opt_posts_block_show_page_numbers'];
if($show_page_numbers=="Yes")
{
	$show_page_numbers_string="show-page-numbers";
}
else
{
	$show_page_numbers_string="no-page-numbers";
}
$layout=$atts['opt_posts_block_layout'];
$vertical_align_columns=$atts['opt_posts_block_vertical_align_columns'];

if($vertical_align_columns=="Yes")
{
	$vertical_align_columns_string="eq-height";
}
else
{
	$vertical_align_columns_string="";
}

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$width=$atts['opt_large_image_max_width'];
$height= thshpr_generate_aspect_height($large_image_ratio,$width);



?>

<div class="featured-posts-grid grid-2-col blog-standard <?php echo $unique_id; ?>">

<?php
Global $wp_query;
/** Define custom query parameters **/
$custom_query_args = array(
'cat' => $post_categories,
'posts_per_page' => $max_posts,
'orderby' => $order_by
);
/** Get current page and append to custom query parameters array **/
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
/** Instantiate custom query **/
$custom_query = new WP_Query( $custom_query_args );
/** Pagination fix **/
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;
$item_string="";

/** The Loop **/
if ( $custom_query ->have_posts() )
{
	$i=1;
	while ( $custom_query ->have_posts() )
	{
		$custom_query ->the_post();
		/** optional post divider **/
		if($i!=1&&$show_divider=="Yes")
		{
			$item_string.='<div class="fw-row blog-row"><div class="fw-col-md-12 full-width"><div class="post-divider"></div></div></div>';
		}
		$hidden_thumb="";

		/** post options **/
		if(function_exists('fw_get_db_settings_option')) //check for options framework
		{
			$fullsize=fw_get_db_post_option(get_the_ID(), 'opt_fullsize');
			$subtitle=fw_get_db_post_option(get_the_ID(), 'opt_subtitle');
		}
		else
		{
			$fullsize="No";
		}

		/**  Start Full width post **/
		if($fullsize=="Yes"||$layout=="full-width")
		{
			include(locate_template('archive-templates/full-width.php'));
		}

		/** Start 50% left image **/
		else if($layout=="image-left-50")
		{
			include(locate_template('archive-templates/left-50.php'));
		}

		/** Start 33% left image **/
		else if($layout=="image-left-33")
		{
			include(locate_template('archive-templates/left-33.php'));
		}

		/** Start 50% right image **/
		else if($layout=="image-right-50")
		{
			include(locate_template('archive-templates/right-50.php'));
		}

		/** Start 33% right image **/
		else if($layout=="image-right-33")
		{
			include(locate_template('archive-templates/right-33.php'));
		}
$i++;
}

echo $item_string;
/** Restore original Post Data **/
wp_reset_postdata();

/** Custom query loop pagination **/
$pagination = get_the_posts_pagination
(
	array
	(
		'mid_size' => 0,
		'prev_text' => 'prev',
		'next_text' => 'next',
	)
);

/** Reset main query object **/
$wp_query = NULL;
$wp_query = $temp_query;
}
else
{
/** no posts found **/
}
wp_reset_postdata();
?>
<?php

if($enabled_pagination=="Yes")
{

	echo'<div class="next-text hidden">'.$next_text.'</div>';
	echo'<div class="prev-text hidden">'.$prev_text.'</div>';
	echo'<div class="page-nav-standard '.$show_page_numbers_string.'">'.$pagination.'</div>';
}
?>
</div>
