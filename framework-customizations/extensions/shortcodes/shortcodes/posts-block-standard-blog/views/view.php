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
$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];

/** Specific shortcode variables **/
$show_divider=$atts["opt_posts_block_show_divider"];
$next_text=$atts["opt_posts_block_next_post_text"];
$prev_text=$atts["opt_posts_block_prev_post_text"];
$enabled_pagination=$atts['opt_posts_block_pagination'];
$small_hide_excerpt=0;

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$small_image_ratio=$atts['opt_small_image_ratio'];
$small_width=$atts['opt_small_image_max_width'];
$large_width=$atts['opt_large_image_max_width'];//needs adding to options
$large_height= thshpr_generate_aspect_height($large_image_ratio,$large_width);
$small_height= thshpr_generate_aspect_height($small_image_ratio,$small_width);
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
		$item_string.='<div class="fw-row blog-row">';
		$hidden_thumb="";
		/** get the  full width image option, this is set in the post options and allows a post to
		have a full width image **/
		if(function_exists('fw_get_db_settings_option')) //check for options framework
		{
			$fullsize=fw_get_db_post_option(get_the_ID(), 'opt_meta_post_full_size');
		}
		else
		{
			$fullsize="No";
		}
		/**  Start Full width post **/
		if($fullsize=="Yes")
		{
			$item_string.='<div class="fw-col-md-12 full-width">';
			if ($components_elements): foreach ($components_elements as $key=>$value)
			{
				switch($value['opt_header_featuredposts_rows'])
				{
					case 'Thumbnail':
						$cell_class="focus"; /*forces the image template to use the large image **/
						$width=$large_width; /**force the width to large width **/
						include locate_template('post-component-elements/image-string.php');
					break;
					case 'Title':
						include locate_template('post-component-elements/title-string.php');
					break;
					case 'Excerpt':
                        include locate_template('post-component-elements/excerpt-string.php');
					break;
					case 'Categories':
                        include locate_template('post-component-elements/categories-string.php');
					break;
					case 'Tags':
                        include locate_template('post-component-elements/tags-string.php');
                	break;
					case 'Read More':
						include locate_template('post-component-elements/read-more-string.php');
					break;
					case 'Author':
						include locate_template('post-component-elements/author-string.php');
					break;
					case 'Date':
						include locate_template('post-component-elements/date-string.php');
					break;
					case 'Comments':
						include locate_template('post-component-elements/comments-string.php');
					break;
					case 'Date+Comments':
						include locate_template('post-component-elements/date-comments-string.php');
					break;
					case 'Comments+Author':
						include locate_template('post-component-elements/comments-author-string.php');
					break;
					case 'Date+Author':
						include locate_template('post-component-elements/date-author-string.php');
					break;
					case 'Date+Comments+Author':
						include locate_template('post-component-elements/date-comments-author-string.php');
					break;
					case 'Share Boxes':
                        include locate_template('post-component-elements/share-boxes-string.php');
					break;
					case 'Divider':
                        include locate_template('post-component-elements/divider-string.php');
					break;
				}
			}
			endif;
			$item_string.='</div></div>';
		}

		/** Start normal 2 column posts **/
		else
		{
			if ( has_post_thumbnail()) //wrap the small thumbnail - also using equal heights js plugin
			{
				$item_string.='<div class="fw-col-md-6 eq-height"><div class="components-holder eq-height"><div class="rw-holder">';
			}
			/** Image must come first here **/
			if ($components_elements): foreach ($components_elements as $key=>$value)
			{
				switch($value['opt_header_featuredposts_rows'])
				{
					case 'Thumbnail':
						$cell_class=""; /** forces the image template to use the small image **/
						$width=$small_width; /**force the width to large width **/
						include locate_template('post-component-elements/image-string.php');
					break;
				}
			}
			endif;
			if ( has_post_thumbnail()) //end thumbnail wrap
			{
				$item_string.='</div></div></div><div class="fw-col-md-6 eq-height"><div class="components-holder eq-height"><div class="rw-holder">';
			}
			else //if no image, make the components the will width of container
			{
				$item_string.='<div class="fw-col-md-12">';
			}
			/** run compoents loop **/
			if ($components_elements): foreach ($components_elements as $key=>$value)
			{
				switch($value['opt_header_featuredposts_rows'])
				{
					case 'Title':
						include locate_template('post-component-elements/title-string.php');
					break;
					case 'Excerpt':
						include locate_template('post-component-elements/excerpt-string.php');
					break;
					case 'Categories':
						include locate_template('post-component-elements/categories-string.php');
					break;
					case 'Tags':
						include locate_template('post-component-elements/tags-string.php');
					break;
					case 'Read More':
						include locate_template('post-component-elements/read-more-string.php');
					break;
					case 'Author':
						include locate_template('post-component-elements/author-string.php');
					break;
					case 'Date':
						include locate_template('post-component-elements/date-string.php');
					break;
					case 'Comments':
						include locate_template('post-component-elements/comments-string.php');
					break;
					case 'Date+Comments':
						include locate_template('post-component-elements/date-comments-string.php');
					break;
					case 'Comments+Author':
						include locate_template('post-component-elements/comments-author-string.php');
					break;
					case 'Date+Author':
						include locate_template('post-component-elements/date-author-string.php');
					break;
					case 'Date+Comments+Author':
						include locate_template('post-component-elements/date-comments-author-string.php');
					break;
					case 'Share Boxes':
						include locate_template('post-component-elements/share-boxes-string.php');
					break;
					case 'Divider':
						include locate_template('post-component-elements/divider-string.php');
					break;
				}
			}

			if ( has_post_thumbnail() )
			{
				$item_string.='</div></div></div>';
			}
			else
			{
				$item_string.='</div>';
			}
			$item_string.='</div>';
		endif;
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
		'mid_size' => 3,
		'prev_text' => $prev_text,
		'next_text' => $next_text,
	)
);
$prev_post = get_previous_posts_link();
if (empty( $prev_post ))
{
	$greyed_prev='<div class="prev page-numbers-faded" >'.$prev_text.'</div>';
}
else
{
	$greyed_prev='';
}
$next_post = get_next_posts_link();
if (empty( $next_post ))
{
	$greyed_next='<div class="next page-numbers-faded" >'.$next_text.'</div>';
}
else
{
	$greyed_next='';
}

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
</div>
<?php
if($enabled_pagination=="Yes")
{
echo'<div class="page-nav-standard">'.$greyed_prev.$pagination.$greyed_next.'</div>';
}
?>
</div>
