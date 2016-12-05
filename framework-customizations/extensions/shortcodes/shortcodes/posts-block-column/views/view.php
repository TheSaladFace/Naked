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

/** Get posts source **/
$post_source=$atts["post_source"];
$post_source_type=$post_source['option-type'];

if($post_source_type=="categories")
{
	/** Generate category id string **/
	$post_categories=$post_source['categories']['opt_posts_block_categories'];
	$post_categories=array_values($post_categories);
	$post_categories=thshpr_get_category_ids_string($post_categories);
	$max_posts=$post_source['categories']['opt_posts_block_number_posts'];
}
else if($post_source_type=="posts")
{
	/** Generate category id string **/
	$post_id_array=$post_source['posts']["opt_posts_block_posts"];
	$max_posts=count($post_id_array);
	/*$post_single_id=array_values($post_single_id);
	$post_single_id=thshpr_get_category_ids_string($post_single_id);*/
}





/** Other variables from options **/
$unique_id='id-'.$atts['id'];
$order_by=$atts["opt_posts_block_ordering"];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];
$category_tag_number=$atts["opt_posts_block_number_categories"];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$large_excerpt_length=$atts["opt_posts_block_large_excerpt_length"];
$components_elements=$atts["opt_posts_block_functionality"];
$read_more=$atts['opt_posts_block_read_more_text'];
$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];
$show_author_image=$atts['opt_posts_block_show_author_image'];
$posts_block_large_header=$atts['opt_posts_block_large_header'];


/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** shortcode specific variables **/
$posts_block_type=$atts["opt_posts_block_type"];
$bottom_margin=$atts["opt_posts_block_bottom_margin"];
if($bottom_margin=="Yes")
{
	$bottom_margin_string="margin-bottom-class";
}

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$width=$atts['opt_large_image_max_width'];
$height= thshpr_generate_aspect_height($large_image_ratio,$width);

?>

<div class="posts-block-column <?php echo $bottom_margin_string; ?>" <?php echo $unique_id; //so user can style instance ?>">
	<?php

	if($post_source_type=="categories")
	{
		$args = array(
		'cat' => $post_categories,
		'posts_per_page' => -1,
		'orderby' => $order_by);

	}
	else if($post_source_type=="posts")
	{
		$args = array(
		'post__in'      => $post_id_array,
		'posts_per_page' => -1,
		'orderby' => $order_by);
	}


		/** WP Query **/
		$the_query = new WP_Query( $args );
		$l=1;
		$item_string="";

		/** The Loop **/
		if ( $the_query->have_posts() )
		{
			while ( $the_query->have_posts() )
			{

				/* check the global used posts array for duplicates*/
				$the_query->the_post();
				$id_class=get_the_ID();
				$cell_class="";
				$uniqueDep="";
				$uniqueDep = array_unique(explode(',', $GLOBALS['section-posts_used']));

				/*if the post is there don't do anything*/
				if (in_array($id_class, $uniqueDep))
				{

				}
				/* Output the post */
				else
				{
					if($l<=$max_posts) //artificially imposing max posts because we are removing duplicates
					{
						//check to see if the thumbnail has been included. If not we don't want to show thumbnail
						$thumbnail_exists=thshpr_in_array_recursive('Thumbnail',$components_elements);
						$hidden_thumb="";

						if($posts_block_type=="images left")
						{

							if ( has_post_thumbnail() && $thumbnail_exists ) //post can have a thumbnail but thumbnails not be a component element
							{
								$cell_class.="tiny tiny-has-thumbnail";
								$padding_left=$width+20;
								$style_info="style=padding-left:".$padding_left."px;min-height:".$height."px;";
							}
							else
							{
								$cell_class.="tiny";
								$style_info="";
							}
							$item_string.='<div class="'.$cell_class.'" id="'.$id_class.'" '.$style_info.'>';
							//Image must come first here
							if ($components_elements)
							{
								foreach ($components_elements as $key=>$value)
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
												$item_string.=thshpr_generate_image($width,$height,get_the_ID());
												$item_string.='
												</a>
												</div>';
											}
											else if($focus_has_thumbnail==1||$cell_class=="above-normal")
											{
												include locate_template('post-component-elements/image-string.php');
											}
										}
										break;
									}
								}
							}
							$item_string.='<div class="tiny-info">';
							if ($components_elements)
							{
								foreach ($components_elements as $key=>$value)
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
										case 'Spacer 50px':
											include locate_template('post-component-elements/spacer-50px.php');
										break;
										case 'Spacer 40px':
											include locate_template('post-component-elements/spacer-40px.php');
										break;
										case 'Spacer 30px':
											include locate_template('post-component-elements/spacer-30px.php');
										break;
										case 'Spacer 20px':
											include locate_template('post-component-elements/spacer-20px.php');
										break;
										case 'Spacer 10px':
											include locate_template('post-component-elements/spacer-10px.php');
										break;
										case 'Spacer 5px':
											include locate_template('post-component-elements/spacer-5px.php');
										break;
										case 'Spacer 2px':
											include locate_template('post-component-elements/spacer-2px.php');
										break;
										case 'Spacer 1px':
											include locate_template('post-component-elements/spacer-1px.php');
										break;
									}
								}
							}
							$item_string.='</div>';
						}

						else //normal
						{
							$focus_has_thumbnail="";
							if ( has_post_thumbnail() && $thumbnail_exists) //post can have a thumbnail but thumbnails not be a component element
							{
								$focus_has_thumbnail=1;
							}
							if($posts_block_large_header=="Large")
							{
								$cell_class.="focus";
							}
							else
							{
								$cell_class.="above-normal";
							}
							$style_info="";
							$item_string.='<div class="'.$cell_class.'" id="'.$id_class.'" '.$style_info.'>';

							if ($components_elements)
							{
								foreach ($components_elements as $key=>$value)
								{
									switch($value['opt_header_featuredposts_rows'])
									{
										case 'Thumbnail':
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
										case 'Spacer 50px':
											include locate_template('post-component-elements/spacer-50px.php');
										break;
										case 'Spacer 40px':
											include locate_template('post-component-elements/spacer-40px.php');
										break;
										case 'Spacer 30px':
											include locate_template('post-component-elements/spacer-30px.php');
										break;
										case 'Spacer 20px':
											include locate_template('post-component-elements/spacer-20px.php');
										break;
										case 'Spacer 10px':
											include locate_template('post-component-elements/spacer-10px.php');
										break;
										case 'Spacer 5px':
											include locate_template('post-component-elements/spacer-5px.php');
										break;
										case 'Spacer 2px':
											include locate_template('post-component-elements/spacer-2px.php');
										break;
										case 'Spacer 1px':
											include locate_template('post-component-elements/spacer-1px.php');
										break;
									}
								}
							}
						}

						/*stores the id in a global array which is initialised when the containing section is
						* created. This means that we can exclude all duplicate posts from the section from Separate
						* post blocks */
						if($GLOBALS['remove_duplicate_posts']=="Yes")
						{
							$GLOBALS['section-posts_used'].= $id_class.',';
						}
						$item_string.="</div>";
					/* end if less than max posts */
					}
				/* end if not in the duplicates list */
				}
				$l++;
			/* end loop */
			}
			echo $item_string;
		/*end if*/
		}
		else
		{
			// no posts found
		}
		wp_reset_postdata(); 	/* Restore original Post Data */
?>
</div>
