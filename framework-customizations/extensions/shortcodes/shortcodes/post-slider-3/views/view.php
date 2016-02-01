<?php
/**
 * Generates HTML output for the post slider (version 3, compact slider)
 */

 /** Dont run without Unyson plugin **/
 if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/post-slider-3');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css
$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');

wp_enqueue_style('thshpr-slick-css', $uri . '/static/css/slick.css');
wp_enqueue_style('thshpr-post-slider-3', $uri . '/static/css/style.css');
wp_enqueue_script('thshpr-slick', $uri . '/static/js/slick.min.js',array('jquery'),'',true );
wp_enqueue_script('thshpr-slider-3-init', $uri . '/static/js/slider-3-init.js',array('jquery','thshpr-slick'),'',true );

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
$large_excerpt_length=$atts["opt_posts_block_large_excerpt_length"];
$divider_type=$divider_uri.'/static/img/'.$atts['opt_divider_type'];
$show_hover_effects="No";
$cell_class="focus";

/** image ratios **/
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_small_image_max_width'];
$small_height=thshpr_generate_aspect_height($small_image_ratio,$width);
?>

<div class="thumbnail-slider  featured-slider-3 featured-thumbnail-slider post-slider-4 <?php echo $unique_id; ?>" role="banner">

<div class="fw-row">
	<div class="site-header-inner fw-col-12 fw-col-md-12">
		<div class="naked-featured-slider-4 focus">
			<?php
			$args = array(
				'cat' => $post_categories,
				'orderby' => $order_by);

			// The Query
			$the_query = new WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() )
				{
				while ( $the_query->have_posts() )
					{
						$the_query->the_post();
						$item_string="";
						$item_string_hover="";
						if ($components_elements): foreach ($components_elements as $key=>$value)
						{

						    switch($value['opt_posts_block_rows'])
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

						$title_string='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>';
						$image_string=thshpr_generate_image($width,$small_height,get_the_ID());
						$final_string='
								<div class="grid">
									<div>'.$image_string.'
										<div class="item-5">'.$item_string.'</div>
									</div>
								</div>';
							echo '  <div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
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
	</div>
</div>
