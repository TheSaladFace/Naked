<?php
/**
 * Generates HTML output for the Masonry Posts Shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-masonry');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css

/** Style and JS Includes **/
wp_enqueue_style('thshpr-posts-block-masonry', $uri . '/static/css/style.css');
wp_enqueue_script('thshpr-pagination-adjust', $uri . '/static/js/pagination-adjust.js',array('jquery'),'',true );
wp_enqueue_script('thshpr-masonry', $uri . '/static/js/masonry.pkgd.min.js',array('jquery'),'',true );
wp_enqueue_script('thshpr-masonry-init', $uri . '/static/js/masonry-init.js',array('jquery','thshpr-masonry'),'',true );

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
$components_elements=$atts["opt_posts_block_functionality"];
$read_more=$atts['opt_posts_block_read_more_text'];
$small_hide_excerpt=0;
$max_posts=$atts['opt_posts_block_number_posts'];
$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];
$show_author_image=$atts['opt_posts_block_show_author_image'];

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/**  specific block posts type variables **/
$normal_thumbnail='grid_small_image';
$enabled_pagination=$atts['opt_posts_block_pagination'];
$number_columns=$atts["opt_posts_block_columns"];
if($number_columns==2){$boostrap_column_string="fw-col-sm-6";}
else if($number_columns==3){$boostrap_column_string="fw-col-sm-4";}
else if($number_columns==4){$boostrap_column_string="fw-col-sm-3";}
$next_text=$atts["opt_posts_block_next_post_text"];
$prev_text=$atts["opt_posts_block_prev_post_text"];
$show_page_numbers=$atts['opt_posts_block_show_page_numbers'];
if($show_page_numbers=="Yes")
{
	$show_page_numbers_string="show-page-numbers";
}
else
{
	$show_page_numbers_string="no-page-numbers";
}
$image_size=$atts["opt_posts_block_image_size"];
?>

<div class="masonry-container">
	<div class="masonry-grid fw-row <?php echo $unique_id; ?>">
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
		while ( $custom_query ->have_posts() )
		{
			$custom_query ->the_post();
			/** Start loop divs, varies depending on the type of grid selected **/
			$item_string.='<div class="masonry-grid-item fw-col-xs-12 '.$boostrap_column_string.'">';
			$thumbnail_size=$normal_thumbnail;
			$cell_class="";
			$hidden_thumb="";
			/*loop begins*/
			if ($components_elements): foreach ($components_elements as $key=>$value)
			{
				switch($value['opt_header_featuredposts_rows'])
				{
					case 'Thumbnail':
						include locate_template('post-component-elements/image-string-masonry.php');
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
			/** End loop divs, varies depending on the type of grid selected **/
			$item_string.='</div>';
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

	echo'<div class="next-text hidden">'.$next_text.'</div>';
	echo'<div class="prev-text hidden">'.$prev_text.'</div>';
	echo'<div class="page-nav-standard '.$show_page_numbers_string.'">'.$pagination.'</div>';
}
?>
</div>
