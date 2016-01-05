<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying the compact featured thumbnail slider.
 *
 * Called by header.php
 *
 * @package naked
 */
	
	// find the uri to the shortcode folder
	$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/post-slider-2');
	
	wp_enqueue_style(   'slick-css', $uri . '/static/css/slick.css');
	wp_enqueue_style(   'slick-2-css-theme', $uri . '/static/css/slick-2-theme.css');
	//wp_enqueue_style(   'fw-shortcode-demo-shortcode', $uri . '/static/css/slick-theme.css');
	
	wp_enqueue_script('slick', $uri . '/static/js/slick.min.js',array('jquery'),'',true );
	wp_enqueue_script('matchheight', $uri . '/static/js/jquery.matchHeight-min.js',array('jquery','slick'),'',true );
	wp_enqueue_script('slider-2-theme-mods', $uri . '/static/js/slider-2-mods.js',array('jquery','slick','matchheight'),'',true );
	wp_enqueue_script('slider-2-init', $uri . '/static/js/slider-2-init.js',array('jquery','slick','slider-2-theme-mods'),'',true );
	
	$post_category= $atts['opt_post_slider_categories'];
	$post_category=array_values($post_category);
	
	//this converts the options into a string so the loop will accept the categories.
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
	
	$post_category=$strcats;
	$max_posts=$atts['opt_post_slider_number_posts'];
	$order_by=$atts['opt_post_slider_ordering'];
	$number_slides=$atts['opt_posts_slider_number_slides'];
	$thumbnail_size='featured_slider_2';
	$category_tag_number=$atts['opt_post_slider_number_categories'];
	$components_elements=$atts['opt_post_slider_functionality'];
	$components_elements_hover=$atts['opt_post_slider_functionality_hover'];
	$excerpt_length=$atts["opt_posts_block_excerpt_length"];
	$read_more=$atts['opt_posts_block_read_more_text'];
	
	$show_initial_slide_rows=$atts['opt_post_slider_initial'];
	$show_post_slider_buttons=$atts['opt_post_slider_buttons'];
	
	if(!$show_post_slider_buttons)
	{
		$hide_string="hidden";
	}
	else
	{
		$hide_string="";
	}
	
		//image ratios

$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_small_image_max_width'];

$small_image_ratio=$atts['opt_small_image_ratio'];
$small_height= naked_generate_aspect_height($small_image_ratio,$width);
$id=$atts['id'];
 ?>
 

<div class="thumbnail-slider  featured-slider-2 featured-thumbnail-slider post-slider-2 <?php echo $id; ?>" role="banner" >

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
						'cat' => $post_category,
						'posts_per_page' => $max_posts,
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
										
								$hidden_thumb="";
								if ( has_post_thumbnail() ) //hidden thumbnail for use in prev next buttons
								{ 
									$hidden_thumb=get_the_post_thumbnail(get_the_ID(),'prevnext' );
								}
										
								if ($components_elements): foreach ($components_elements as $key=>$value) 
								{
								    switch($value['opt_post_slider_rows']) 
								    {
									case 'Title': 
										$item_string.='<div class="component-element meta-title"><h3 class="small-headline"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
									break;
								
									case 'Title + Excerpt':
										$item_string.='<div class="component-element meta-title"><h3 class="small-headline"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div><div class="meta-excerpt component-element"><a href="'.get_permalink().'" >'.nude_stripped_excerpt($excerpt_length).'</a></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
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
									 
								    }
								
								 
								}
								endif;
								
								if ($components_elements_hover): foreach ($components_elements_hover as $key=>$value) 
								{
								
								    switch($value['opt_post_slider_rows']) 
								    {
									case 'Title': 
										$item_string_hover.='<div class="component-element meta-title"><h3 class="small-headline"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
									break;
								
									case 'Title + Excerpt':
										$item_string_hover.='<div class="component-element meta-title"><h3 class="small-headline"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div><div class="meta-excerpt component-element"><a href="'.get_permalink().'" >'.nude_stripped_excerpt($excerpt_length).'</a></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
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
										$item_string_hover.=trim($output, $separator);
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
											  $item_string_hover.=trim($output, $separator);
										}
									break;
									
									case 'Read More': 
											$item_string_hover.='<div class="read-more general-meta featured-posts-grid-paragraph component-element"><a href="'.get_permalink().'">'.$read_more.'</a></div>';
									break;
												
									case 'Author': 
										$item_string_hover.='<div class="meta-author general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Date': 
										$item_string_hover.='<div class="meta-date general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-date">'.get_the_date() .'</span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Comments': 
										$item_string_hover.='<div class="meta-comments general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Date+Comments': 
										$item_string_hover.='<div class="meta-date-comments general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
														<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Comments+Author': 
										$item_string_hover.='<div class="meta-comments-author general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
														<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Date+Author': 
										$item_string_hover.='<div class="meta-date-author general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
														<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Date+Comments+Author': 
										$item_string_hover.='<div class="meta-date-comments-author general-meta featured-posts-grid-paragraph component-element">';
										$item_string_hover.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
														<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
														<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
										$item_string_hover.='</div>';
									break;
									
									case 'Share Boxes': 
										
										// Get upload directory info
										$upload_info = wp_upload_dir();
										$upload_dir  = $upload_info['basedir'];
										$upload_url  = $upload_info['baseurl'];
										// Get file path info
										$attachment_id = get_post_thumbnail_id( get_the_ID() );
										$image_path      = get_attached_file( $attachment_id );
											
										$item_string_hover.='
										
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
												
								}
								
								 
								}
								endif;
								
								$title_string='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
								$image_string=naked_generate_image($width,$small_height,get_the_ID());
																
								if($show_initial_slide_rows)
								{								
									$final_string='
										
											<div class="grid">											
												<div class="effect-1">'.$image_string.'
													<div class="item-3">'.$item_string.'</div>
													<div class="item-4">'.$item_string_hover.'</div>
													
												</div>							
											</div>'; 
													
									echo '  <div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
								}
								else
								{								
									$final_string='
										
											<div class="grid">											
												<div class="effect-1">'.$image_string.'
													<div class="item-4">'.$item_string_hover.'</div>
																										
												</div>							
											</div>'; 
													
									echo '  <div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
								}
								
								
								/*<div class="item-4">'.$item_string.'</div>*/
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
