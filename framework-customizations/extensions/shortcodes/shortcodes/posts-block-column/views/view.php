<?php
/**
 * Generates HTML output for the posts block column shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-column');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css

/** Style and JS Includes **/
wp_enqueue_style('thshpr-posts-block-column', $uri . '/static/css/style.css',null, null, 'screen');

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
$atts['opt_posts_block_number_posts'];
$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** shortcode specific variables **/
$max_posts=$atts['opt_posts_block_number_posts'];
$small_width=$atts['opt_small_image_max_width'];
$large_post_top=$atts["opt_posts_block_large_top"];

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_large_image_max_width'];
$large_height= thshpr_generate_aspect_height($large_image_ratio,$width);
$small_height= thshpr_generate_aspect_height($small_image_ratio,$small_width);

?>



<div class="posts-block-column" <?php echo $unique_id; //so user can style instance ?>">
	<?php
	$args = array(
		'cat' => $post_categories,
		'posts_per_page' => $max_posts,
		'orderby' => $order_by);
		/** WP Query **/
		$the_query = new WP_Query( $args );
		$i=1;
		$item_string="";

		/** The Loop **/
		if ( $the_query->have_posts() )
		{
			while ( $the_query->have_posts() )
			{
				$the_query->the_post();
				$cell_class="";
				if($i==1 && $large_post_top=="Yes")
				{
					$cell_class="focus";
					$style_info="";
				}
				else
				{
					if ( has_post_thumbnail() )
					{
						$cell_class="tiny tiny-has-thumbnail";
						$padding_left=$small_width+20;
						$style_info="style=padding-left:".$padding_left."px;min-height:".$small_height."px;";
					}
					else
					{
						$cell_class="tiny";
						$style_info="";
					}
				}
				$item_string.='<div class="'.$cell_class.'" '.$style_info.'>';
				$hidden_thumb="";
				//Image must come first here
				if ($components_elements): foreach ($components_elements as $key=>$value)
				{
					switch($value['opt_header_featuredposts_rows'])
					{
						case 'Thumbnail':
						if ( has_post_thumbnail() )
						{
							if($cell_class=="tiny tiny-has-thumbnail")
							{
								$item_string.='
								<div class="tiny-image">
								<a href="'.get_permalink().'">';
								$item_string.=thshpr_generate_image($small_width,$small_height,get_the_ID());
								$item_string.='
								</a>
								</div>';
							}
							else
							{
								include locate_template('post-component-elements/image-string.php');
							}
						}
						break;
					}
				}
			endif;
			if($cell_class=="tiny")
			{
				$item_string.='<div class="tiny-info">';
			}
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
			endif;
			if($cell_class=="tiny")
			{
				$item_string.='</div>';
			}
			$item_string.="</div>";
			$i++;
		}
		echo $item_string;
	}
	else
	{
		// no posts found
	}
	wp_reset_postdata(); 	/* Restore original Post Data */
?>
</div>
