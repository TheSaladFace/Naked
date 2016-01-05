<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
// test

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-masonry');

	wp_enqueue_style(   'grid-css', $uri . '/static/css/style.css');
	wp_enqueue_script('pagination-adjust', $uri . '/static/js/pagination-adjust.js',array('jquery'),'',true );


//$lazy_load=$atts["opt_posts_block_lazy_load_posts"];
$next_text=$atts["opt_posts_block_next_post_text"];
$prev_text=$atts["opt_posts_block_prev_post_text"];
wp_enqueue_script('images-loaded', $uri . '/static/js/jquery.imagesloaded.min.js',array('jquery'),'',true );
wp_enqueue_script('masonry', $uri . '/static/js/masonry.pkgd.min.js',array('jquery','images-loaded'),'',true );
wp_enqueue_script('masonry-init', $uri . '/static/js/masonry-init.js',array('jquery','masonry','images-loaded'),'',true );
/*if($lazy_load=="Yes")
{
	wp_enqueue_script('infinite-scroll', $uri . '/static/js/jquery.infinitescroll.min.js',array('jquery'),'',true );
	wp_enqueue_script('masonry', $uri . '/static/js/masonry.pkgd.min.js',array('jquery','infinite-scroll'),'',true );
	wp_enqueue_script('images-loaded', $uri . '/static/js/jquery.imagesloaded.min.js',array('jquery','infinite-scroll','masonry'),'',true );
	wp_enqueue_script('masonry-init', $uri . '/static/js/masonry-init.js',array('jquery','infinite-scroll','masonry','images-loaded'),'',true );
}*/

$thumbnail_size="masonry";
//Categories
$post_categories=$atts["opt_posts_block_categories"];
$post_category=array_values($post_categories);
$strcats="";
if(count($post_category)>1)
{
	foreach($post_category as $value)
	{
		$strcats.=$value.",";
	}
}
else if(count($post_category)==1)
{
	$strcats=$post_category[0];
}
else
{
	$strcats=1;
}
$unique_id='id-'.$atts['id'];
$post_category=$strcats;

$order_by=$atts["opt_posts_block_ordering"];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];

$normal_thumbnail='grid_small_image';
$focus_thumbnail='grid_focus_image';
$category_tag_number=$atts["opt_posts_block_number_categories"];
$number_columns=$atts["opt_posts_block_columns"];
if($number_columns==2){$boostrap_column_string="fw-col-sm-6";}
else if($number_columns==3){$boostrap_column_string="fw-col-sm-4";}
else if($number_columns==4){$boostrap_column_string="fw-col-sm-3";}
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$components_elements=$atts["opt_posts_block_functionality"];

$read_more=$atts['opt_posts_block_read_more_text'];
//hover items
$opt_image_hover_item_top= $atts['opt_image_hover_item_1'];
if($opt_image_hover_item_top['template']==0)//nothing
{
	$hover_top='';
}
else if($opt_image_hover_item_top['template']==1)//text
{
	$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];
}
else if($opt_image_hover_item_top['template']==2)//icon
{
	$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
}
else if($opt_image_hover_item_top['template']==3)//image
{
	$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';
}

$opt_image_hover_item_bottom= $atts['opt_image_hover_item_2'];
if($opt_image_hover_item_bottom['template']==0)//nothing
{
	$hover_bottom='';
}
else if($opt_image_hover_item_bottom['template']==1)//text
{
	$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];
}
else if($opt_image_hover_item_bottom['template']==2)//icon
{
	$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
}
else if($opt_image_hover_item_bottom['template']==3)//image
{
	$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';
}

//specific block posts type variables

$max_posts=$atts['opt_posts_block_number_posts'];

$enabled_pagination=$atts['opt_posts_block_pagination'];

$num_columns=$atts['opt_posts_block_columns'];
if($num_columns==1){$boostrap_column=12;}
else if($num_columns==2){$boostrap_column=6;}
else if($num_columns==3){$boostrap_column=4;}
else if($num_columns==4){$boostrap_column=3;}
$small_hide_excerpt=0;

//image ratios


 ?>

 <?php
 /*
//large column left
	 <div class="fw-row">
		 <div class="fw-col-sm-6 featured-cell focus">1
		 </div>
		 <div class="fw-col-sm-6">
			<div class="fw-row">
				<div class="fw-col-sm-6 featured-cell ">2</div>
				<div class="fw-col-sm-6 featured-cell ">3</div>
			</div>
			<div class="fw-row">
				<div class="fw-col-sm-6 featured-cell ">4</div>
				<div class="fw-col-sm-6 featured-cell ">5</div>
			</div>
		 </div>

	 </div>

 */
 ?>
<div class="masonry-container">
 <div class="masonry-grid fw-row <?php echo $unique_id; ?>">


	<?php
	Global $wp_query;
	// Define custom query parameters
	$custom_query_args = array(
		'cat' => $post_category,
		'posts_per_page' => $max_posts,
		'orderby' => $order_by
		);

	// Get current page and append to custom query parameters array
	$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	// Instantiate custom query
	$custom_query = new WP_Query( $custom_query_args );

	// Pagination fix
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $custom_query;


	$item_string=""; //set it up for concat

		// The Loop
		if ( $custom_query ->have_posts() )
		{
			while ( $custom_query ->have_posts() )
			{
				$custom_query ->the_post();

				/*Start loop divs, varies depending on the type of grid selected*/

				//Simple Grid
				$item_string.='<div class="masonry-grid-item fw-col-xs-12 '.$boostrap_column_string.'">';

				$thumbnail_size=$normal_thumbnail;
				$cell_class="";


				$hidden_thumb="";

				/*end start loop*/

				/*loop begins*/

				if ($components_elements): foreach ($components_elements as $key=>$value)
				{
					switch($value['opt_header_featuredposts_rows'])
					{
						case 'Thumbnail':
							if ( has_post_thumbnail() )
							{

								// Get upload directory info
								$upload_info = wp_upload_dir();
								$upload_dir  = $upload_info['basedir'];
								$upload_url  = $upload_info['baseurl'];
							   	// Get file path info
							   	$attachment_id = get_post_thumbnail_id( get_the_ID() );
							   	$path      = get_attached_file( $attachment_id );
							   	$path_info = pathinfo( $path );
							   	$ext       = $path_info['extension'];
							   	$rel_path  = str_replace( array( $upload_dir, ".$ext" ), '', $path );

								$item_string.='<div class="m-grid component-element image-holder"><a href="'.get_permalink().'">
													';

														if($show_hover_effects=="No")
														{
															$item_string.=get_the_post_thumbnail(get_the_ID(),'masonry'  );
														}
														else
														{
															$item_string.='
															<div class="effect-1">';


																$item_string.=get_the_post_thumbnail(get_the_ID(),'masonry' );

																$item_string.='
																<div class="item-1">
																	<p><span class="centered">'.$hover_top.'</span></p>
																</div>
																<div class="item-2">
																	<p><span class="centered">'.$hover_bottom.'</span></p>
																</div>

															</div>';
														}

													$item_string.='
														</a></div>';

							}
						break;

						case 'Title':

								$item_string.='<div class="component-element meta-title"><h3 class="small-headline"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div>';
						break;

						case 'Excerpt':

								$item_string.='<div class="meta-excerpt component-element"><a href="'.get_permalink().'">'.nude_stripped_excerpt($excerpt_length).'</a></div>';



						break;

						case 'Categories':
							$categories = get_the_category();
							//var_dump($categories);
							$separator = ' ';
							$output = '';
							if($categories)
							{
								$output.='<div class="meta-categories tags featured-posts-grid-paragraph component-element">';
								$n=0;
								foreach($categories as $category)
								{
									if($category->cat_ID!=$post_category&&$n<=$category_tag_number)
									{
										$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
									}
									$n++;
								}
								$output.='</div>';
							$item_string.=trim($output, $separator);
							}
						break;

						case 'Tags':
							$posttags = get_the_tags();
							$separator = ' ';
							$output = '';
							if ($posttags)
							{
								$output.='<div class="meta-tags tags featured-posts-grid-paragraph component-element">';
								$n=0;
								  foreach($posttags as $tag)
								  {
									  if($n<$category_tag_number)
									  {
									  $output .= '<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
									  }
									  $n++;
								 }
								  $output.='</div>';
								  $item_string.=trim($output, $separator);
							}
						break;

						case 'Read More':
								$item_string.='<div class="read-more general-meta featured-posts-grid-paragraph component-element"><a href="'.get_permalink().'">'.$read_more.'</a></div>';
						break;

						case 'Author':
							$item_string.='<div class="meta-author general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
							$item_string.='</div>';
						break;

						case 'Date':
							$item_string.='<div class="meta-date general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-date">'.get_the_date() .'</span>';
							$item_string.='</div>';
						break;

						case 'Comments':
							$item_string.='<div class="meta-comments general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
							$item_string.='</div>';
						break;

						case 'Date+Comments':
							$item_string.='<div class="meta-date-comments general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
											<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
							$item_string.='</div>';
						break;

						case 'Comments+Author':
							$item_string.='<div class="meta-comments-author general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
											<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
							$item_string.='</div>';
						break;

						case 'Date+Author':
							$item_string.='<div class="meta-date-author general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
											<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
							$item_string.='</div>';
						break;

						case 'Date+Comments+Author':
							$item_string.='<div class="meta-date-comments-author general-meta featured-posts-grid-paragraph component-element">';
							$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
											<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
											<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
							$item_string.='</div>';
						break;

						case 'Share Boxes':

							// Get upload directory info
							$upload_info = wp_upload_dir();
							$upload_dir  = $upload_info['basedir'];
							$upload_url  = $upload_info['baseurl'];
							// Get file path info
							$attachment_id = get_post_thumbnail_id( get_the_ID() );
							$image_path      = get_attached_file( $attachment_id );

							$item_string.='

							<div class="share-boxes featured-posts-grid-paragraph component-element">
								<div class="absolute-container">
									<i class="fa fa-share-alt icon"></i><span class="share-label">'.__( 'Share This ', 'naked' ).'</span><!--
									--><span class="social-box facebook"><a class="inner facebook-inner" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()).'"><i class="fa fa-facebook icon"></i></a></span><!--
									--><span class="social-box twitter"><a class="inner twitter-inner" href="https://twitter.com/home?status='.urlencode(get_permalink()).'"><i class="fa fa-twitter icon"></i></a></span><!--
									--><span class="social-box google-plus"><a class="inner google-plus-inner" href="https://plus.google.com/share?url='.urlencode(get_permalink()).'"><i class="fa fa-google-plus icon"></i></a></span><!--
									--><span class="social-box linked-in"><a class="inner linked-in-inner" href="https://www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_permalink()).'&title='.urlencode(get_the_title()).'&summary='.nude_stripped_excerpt($excerpt_length).'&source="><i class="fa fa-linkedin icon"></i></a></span><!--
									--><span class="social-box pinterest"><a class="inner pinterest-inner" href="https://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&media='.urlencode($image_path).'&description='.nude_stripped_excerpt($excerpt_length).'"><i class="fa fa-pinterest icon"></i></a></span>
								</div>
							</div>';

						break;

						case 'Divider':

							$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');
							$divider_type=$divider_uri.'/static/img/'.$atts['opt_divider_type'];
							$height=8;
							$style_string='"background-image: url('.$divider_type.'.png); height:'.$height.'px;"';

							$item_string.='

							<div class="divider-container">
								<div class="divider-border" style='.$style_string.'></div>
							</div>';

						break;
					}


				}
			endif;

			/*End loop divs, varies depending on the type of grid selected*/


			$item_string.='</div>';


		}

		echo $item_string;

		wp_reset_postdata();

		// Custom query loop pagination

		$pagination = get_the_posts_pagination( array(
						    'mid_size' => 3,
						    'prev_text' => $prev_text,
						    'next_text' => $next_text,
						) );
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

		// Reset main query object
		$wp_query = NULL;
		$wp_query = $temp_query;
	}
	else
	{
		// no posts found
	}						/* Restore original Post Data */
	wp_reset_postdata();


	?>

</div>
<?php
if($enabled_pagination=="Yes")
{
	echo'<div class="page-nav">'.$greyed_prev.$pagination.$greyed_next.'</div>';
}
?>
</div>
