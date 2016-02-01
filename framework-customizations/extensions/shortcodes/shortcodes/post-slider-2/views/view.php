<?php
/**
 * Generates HTML output for the post slider (version 2, wide slider)
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/post-slider-2');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css
$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');

wp_enqueue_style('thshpr-slick-css', $uri . '/static/css/slick.css');
wp_enqueue_style('thshpr-post-slider-2', $uri . '/static/css/style.css');
wp_enqueue_script('thshpr-slick', $uri . '/static/js/slick.min.js',array('jquery'),'',true );
wp_enqueue_script('thshpr-matchheight', $uri . '/static/js/jquery.matchHeight-min.js',array('jquery','thshpr-slick'),'',true );
wp_enqueue_script('thshpr-slider-2-theme-mods', $uri . '/static/js/slider-2-mods.js',array('jquery','thshpr-slick','thshpr-matchheight'),'',true );
wp_enqueue_script('thshpr-slider-2-init', $uri . '/static/js/slider-2-init.js',array('jquery','thshpr-slick','thshpr-slider-2-theme-mods'),'',true );

/** Generate category id string **/
$post_categories=$atts['opt_posts_block_categories'];
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

/** Other variables from options **/
$unique_id='id-'.$atts['id'];
$order_by=$atts['opt_posts_block_ordering'];
$category_tag_number=$atts['opt_posts_block_number_categories'];
$components_elements=$atts['opt_posts_block_functionality'];
$read_more=$atts['opt_posts_block_read_more_text'];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];

/** shortcode specific variables **/
$number_slides=$atts['opt_posts_block_number_slides'];
$components_elements_hover=$atts['opt_posts_block_functionality_hover'];
$show_initial_slide_rows=$atts['opt_posts_block_initial'];
$show_posts_block_buttons=$atts['opt_posts_block_buttons'];
$thumbnail_size='featured_slider_2';
if(!$show_posts_block_buttons){$hide_string="hidden";}else{$hide_string="";}
$cell_class="focus";

/** image ratios **/
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_small_image_max_width'];
$small_height=thshpr_generate_aspect_height($small_image_ratio,$width);
?>


<div class="thumbnail-slider  featured-slider-2 featured-thumbnail-slider post-slider-2 <?php echo $unique_id; ?>" role="banner" >

	<div class="nav-doubleflip thumb-doubleflip full-featured-buttons equal-heights-slider post-slider-2-buttons <?php echo $hide_string; ?>" id="">
		<a class="prev featured-post-slider-2-prev " href="#nothing" id="full-prev">
			<span class="icon-wrap icon-wrap-left">&#10094;</span>
			<div class="prev-preview-container">

				<div class="title-container"><span class="title"></span></div>
			</div>
		</a>
		<a class="next featured-post-slider-2-next" href="#nothing" id="full-next">
			<span class="icon-wrap icon-wrap-right">&#10095;</span>
			<div class="next-preview-container">

				<div class="title-container"><span class="title"></span></div>
			</div>
		</a>
	</div>
	<div class="naked-featured-slider-2" data-slick='{"slidesToShow": <?php echo $number_slides; ?>, "slidesToScroll": 1}'>

	<?php

	$args = array(
		'cat' => $post_categories,
		'orderby' => $order_by);
		/** WP Query **/
	$the_query = new WP_Query( $args );

	/** The Loop **/
	if ( $the_query->have_posts() )
	{
		while ( $the_query->have_posts() )
		{
			$the_query->the_post();
			$item_string="";
			$item_string_hover="";
			$hidden_thumb="";
			if ( has_post_thumbnail() ) //hidden thumbnail for use in prev next buttons
			{
				$hidden_thumb=get_the_post_thumbnail(get_the_ID(),'prevnext' );
			}
			if ($components_elements): foreach ($components_elements as $key=>$value)
			{
				switch($value['opt_posts_block_rows'])
				{
					case 'Title':
					include locate_template('post-component-elements/title-posts-slider-string.php');
					break;
					case 'Title+Excerpt':
					include locate_template('post-component-elements/title-excerpt-posts-slider-string.php');
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
			$item_string_normal=$item_string;
			$item_string="";
			if ($components_elements_hover): foreach ($components_elements_hover as $key=>$value)
			{
				switch($value['opt_posts_block_rows'])
				{
					case 'Title':
					include locate_template('post-component-elements/title-posts-slider-string.php');
					break;
					case 'Title+Excerpt':
					include locate_template('post-component-elements/title-excerpt-posts-slider-string.php');
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
			$item_string_hover=$item_string;
			$title_string='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
			$image_string=thshpr_generate_image($width,$small_height,get_the_ID());
			if($show_initial_slide_rows)
			{
				$final_string='
				<div class="grid">
				<div class="effect-1">'.$image_string.'
				<div class="item-3">'.$item_string_normal.'</div>
				<div class="item-4">'.$item_string_hover.'</div>
				</div>
				</div>';
				echo '<div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
			}
			else
			{
				$final_string='
				<div class="grid">
				<div class="effect-1">'.$image_string.'
				<div class="item-4">'.$item_string_hover.'</div>
				</div>
				</div>';
				echo '<div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
			}
		}
	}
	else
	{
	// no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
	</div>
</div>
