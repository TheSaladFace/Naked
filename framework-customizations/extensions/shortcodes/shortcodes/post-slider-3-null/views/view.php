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
	$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/post-slider-3');
	
	wp_enqueue_style(   'slick-css', $uri . '/static/css/slick.css');
	wp_enqueue_style(   'slick-3-css-theme', $uri . '/static/css/slick-3-theme.css');
	//wp_enqueue_style(   'fw-shortcode-demo-shortcode', $uri . '/static/css/slick-theme.css');
	
	wp_enqueue_script('slick', $uri . '/static/js/slick.min.js',array('jquery'),'',true );
	wp_enqueue_script('matchheight', $uri . '/static/js/jquery.matchHeight-min.js',array('jquery','slick'),'',true );
	wp_enqueue_script('slider-3-theme-mods', $uri . '/static/js/slider-3-mods.js',array('jquery','slick','matchheight'),'',true );
	wp_enqueue_script('slider-3-init', $uri . '/static/js/slider-3-init.js',array('jquery','slick','slider-3-theme-mods'),'',true );
	
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
	$thumbnail_size='featured_slider_3';
	$category_tag_number=$atts['opt_post_slider_number_categories'];
	$components_elements=$atts['opt_post_slider_functionality'];
	$components_elements_hover=$atts['opt_post_slider_functionality_hover'];
	$excerpt_length=$atts["opt_posts_block_excerpt_length"];
	$hover_icon=fw_get_db_settings_option('opt_image_icon');
	$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';
	$read_more=$atts['opt_posts_block_read_more_text'];
	//top hover item
	$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
	if($opt_image_hover_item_top['template']==0) //nothing
	{
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
	
	//bottom hover item
	$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
	if($opt_image_hover_item_bottom['template']==0) //nothing
	{
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



 ?>
 

<div class="thumbnail-slider  featured-thumbnail-slider post-slider-3" role="banner">

<div class="nav-doubleflip thumb-doubleflip full-featured-buttons equal-heights-slider-3 post-slider-3-buttons" id="">
	<a class="prev featured-post-slider-3-prev " href="#nothing" id="full-prev">
		<span class="icon-wrap icon-wrap-left"><i class="icon-left-open-big"></i></span>
		<div class="prev-preview-container">
			
			<div class="title-container"><span class="title"></span></div>
		</div>
	</a>
	<a class="next featured-post-slider-3-next" href="#nothing" id="full-next">
		<span class="icon-wrap icon-wrap-right"><i class="icon-right-open-big"></i></span>
		<div class="next-preview-container">
			
			<div class="title-container"><span class="title"></span></div>
		</div>
	</a>
</div>


<div class="fw-container">
		<div class="fw-row">
			<div class="site-header-inner fw-col-12 fw-col-md-12">
	
				<div class="naked-featured-slider-3">
				
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
										$item_string.='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
									break;
									
									case 'Title + Excerpt':
											$item_string.='<a href="'.get_permalink().'"><h3>'.get_the_title().'<br/></h3><p class="meta-excerpt">'.nude_stripped_excerpt($excerpt_length).'</p></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
									break;
								 
									case 'Read More': 
										$item_string.='<a href="'.get_permalink().'"><p class="read-more featured-thumbnail-slider-paragraph">'.$read_more.'</p></a>';
									break;
									
									case 'Categories': 
										$categories = get_the_category();
										//var_dump($categories);
										$separator = ' ';
										$output = '';
										if($categories)
										{
											$output.='<p class="meta-categories featured-thumbnail-slider-paragraph">';
											$n=0;
											foreach($categories as $category) 
											{
												if($category->cat_ID!=$post_category&&$n<=$category_tag_number)
												{											
													$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
												}
												$n++;
											}
											$output.='</p>';
										$item_string.=trim($output, $separator);
										}
									break;
									
									case 'Tags': 
										$posttags = get_the_tags();
										$separator = ' ';
										$output = '';
										if ($posttags) 
										{
											$output.='<p class="meta-tags featured-thumbnail-slider-paragraph">';
											$n=0;
											  foreach($posttags as $tag) 
											  {
												  if($n<$category_tag_number)
												  {
												  $output .= '<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
												  }
												  $n++;
											 }
											  $output.='</p>';
											  $item_string.=trim($output, $separator);
										}
									break;
									
									case 'Author': 
										$item_string.='<p class="meta-author featured-thumbnail-slider-paragraph"><i class="icon-user-5 icon"></i>';
										$item_string.=__( 'Posted By: ', 'naked' ).'<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>';
										$item_string.='</p>';
									break;
									
									case 'Date': 
										$item_string.='<p class="meta-date featured-thumbnail-slider-paragraph"><i class="icon-calendar-inv icon"></i>';
										$item_string.=get_the_date(); 
										$item_string.='</p>';
									break;
									 
								    }
								
								 
								}
								endif;
								
								if ($components_elements_hover): foreach ($components_elements_hover as $key=>$value) 
								{
								    switch($value['opt_post_slider_rows']) 
								    {
									case 'Title': 
										$item_string_hover.='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>';
									break;
									
									case 'Title + Excerpt':
											$item_string_hover.='<a href="'.get_permalink().'"><h3>'.get_the_title().'<br/></h3><p class="meta-excerpt">'.nude_stripped_excerpt($excerpt_length).'</p></a>';
									break;
									
								 	case 'Read More': 
										$item_string_hover.='<a href="'.get_permalink().'"><p class="read-more featured-thumbnail-slider-paragraph">'.$read_more.'</p></a>';
									break;
									
									case 'Categories': 
										$categories = get_the_category();
										//var_dump($categories);
										$separator = ' ';
										$output = '';
										if($categories)
										{
											$output.='<p class="meta-categories featured-thumbnail-slider-paragraph">';
											$n=0;
											foreach($categories as $category) 
											{
												if($category->cat_ID!=$post_category&&$n<=$category_tag_number)
												{											
													$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
												}
												$n++;
											}
											$output.='</p>';
										$item_string_hover.=trim($output, $separator);
										}
									break;
									
									case 'Tags': 
										$posttags = get_the_tags();
										$separator = ' ';
										$output = '';
										if ($posttags) 
										{
											$output.='<p class="meta-tags featured-thumbnail-slider-paragraph">';
											$n=0;
											  foreach($posttags as $tag) 
											  {
												  if($n<$category_tag_number)
												  {
												  $output .= '<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
												  }
												  $n++;
											 }
											  $output.='</p>';
											  $item_string_hover.=trim($output, $separator);
										}
									break;
									
									case 'Author': 
										$item_string_hover.='<p class="meta-author featured-thumbnail-slider-paragraph"><i class="icon-user-5 icon"></i>';
										$item_string_hover.=__( 'Posted By: ', 'naked' ).'<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>';
										$item_string_hover.='</p>';
									break;
									
									case 'Date': 
										$item_string_hover.='<p class="meta-date featured-thumbnail-slider-paragraph"><i class="icon-calendar-inv icon"></i>';
										$item_string_hover.=get_the_date(); 
										$item_string_hover.='</p>';
									break;
									 
								    }
								
								 
								}
								endif;
								
								$title_string='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
							
								$final_string='
									
										<div class="grid">											
											<div class="effect-1">'.get_the_post_thumbnail(get_the_ID(),$thumbnail_size ).'
												<div class="item-3">'.$item_string.'</div>
												<div class="item-4">'.$item_string_hover.'</div>
												
											</div>							
										</div>'; 
												
								echo '  <div><div class="slick-item-container ch-item">'.$final_string.'</div></div>';
								
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
		</div>
	</div>
</div>
