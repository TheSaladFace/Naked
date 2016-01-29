<?php
/**
 * Generates HTML output for the post slider
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/post-slider');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css
$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');

wp_enqueue_style('thshpr-shared-shortcode-styles', $shortcodes_shared_uri . '/static/css/shared-styles.css',null, null,'screen');
wp_enqueue_style('thshpr-slick-css', $uri . '/static/css/slick.css');
wp_enqueue_style('thshpr-spost-slider', $uri . '/static/css/style.css');
wp_enqueue_script('thshpr-slick', $uri . '/static/js/slick.min.js',array('jquery'),'',true );
wp_enqueue_script('thshpr-slider1-mods', $uri . '/static/js/slider1-mods.js',array('jquery','thshpr-slick'),'',true );
wp_enqueue_script('thshpr-slider1-init', $uri . '/static/js/slider1-init.js',array('jquery','thshpr-slick','thshpr-slider1-mods'),'',true );

/** Generate category id string **/
$post_categories=$atts['opt_posts_block_categories'];
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

/** Other variables from options **/
$unique_id='id-'.$atts['id'];
$order_by=$atts['opt_posts_block_ordering'];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];
$category_tag_number=$atts['opt_posts_block_number_categories'];
$components_elements=$atts['opt_posts_block_functionality'];
$read_more=$atts['opt_posts_block_read_more_text'];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$divider_type=$divider_uri.'/static/img/'.$atts['opt_divider_type'];

/** shortcode specific variables **/
$y_button_offset=$atts['opt_posts_block_prev_next_position'];
$number_slides=$atts['opt_posts_block_number_slides'];
$show_posts_block_buttons=$atts['opt_posts_block_buttons'];
if(!$show_posts_block_buttons){	$hide_string="hidden";}else{$hide_string="";}

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** image ratios **/
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_small_image_max_width'];
$small_height=thshpr_generate_aspect_height($small_image_ratio,$width);
?>

<div class="thumbnail-slider featured-slider-1 featured-thumbnail-slider <?php echo $unique_id; ?>" role="banner">
	<div class="nav-doubleflip thumb-doubleflip full-featured-buttons <?php echo $hide_string; ?>">
		<a class="prev featured-post-slider-prev" href="#nothing" id="full-prev" style="margin-top:<?php echo $y_button_offset; ?>px;">
			<span class="icon-wrap icon-wrap-left">&#10094;</span>
			<div class="prev-preview-container">
				<div class="title-container"><span class="title"></span></div>
			</div>
		</a>
		<a class="next featured-post-slider-next" href="#nothing" id="full-next" style="margin-top:<?php echo $y_button_offset; ?>px;">
			<span class="icon-wrap icon-wrap-right">&#10095;</span>
			<div class="next-preview-container">
				<div class="title-container"><span class="title"></span></div>
			</div>
		</a>
	</div>
	<div class="fw-container container-featured">
		<div class="row">
			<div class="site-header-inner fw-col-12 fw-col-md-12">
				<div class="naked-featured-slider" data-slick='{"slidesToShow": <?php echo $number_slides; ?>, "slidesToScroll": 1}'>

					<?php
					$args = array(
						'cat' => $post_categories,
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
								$item_string=""; //set it up for concat
								$hidden_thumb="";
								if ( has_post_thumbnail() ) //hidden thumbnail for use in prev next buttons
								{
									$hidden_thumb=thshpr_generate_image(100,100,get_the_ID());
								}
								if ($components_elements): foreach ($components_elements as $key=>$value)
								{
									/** Runs through user selected drag and drop component elements from shortcode options **/
				                    /** Include templates rather than functions due to WordPress loop variable scope **/

								    switch($value['opt_posts_block_rows'])
								    {
										case 'Thumbnail':
											include locate_template('post-component-elements/image-string.php');
										break;
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
								echo '  <div><div class="slick-item-container ch-item">'.$item_string.'</div></div>';
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
</div>
