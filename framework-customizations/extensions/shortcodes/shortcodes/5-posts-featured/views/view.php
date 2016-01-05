<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
//enqueues and whatnot
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/5-posts-featured');
wp_enqueue_style( '5-posts-featured', $uri . '/static/css/style.css',null, null, 'screen');

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

//unique id
$unique_id='id-'.$atts['id'];
$post_category=$strcats;
$order_by=$atts["opt_posts_block_ordering"];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];
$category_tag_number=$atts["opt_posts_block_number_categories"];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$large_excerpt_length=$atts["opt_posts_block_large_excerpt_length"];
$featured_placement=$atts["opt_posts_block_featured_placement"];
$components_elements=$atts["opt_posts_block_functionality"];
$read_more=$atts['opt_posts_block_read_more_text'];

//hover items
//top
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
//bottom
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


$max_posts=5;


//image ratios
$large_image_ratio=$atts['opt_large_image_ratio'];
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=702; //note, this is large even for small images because of  responsive sizes.
$large_height= naked_generate_aspect_height($large_image_ratio,$width);
$small_height= naked_generate_aspect_height($small_image_ratio,$width);




 ?>
 
 <?php
/*
//grid calculations. 

5 columns featured in left
<div class="fw-row">
	<div class="fw-col-md-6 featured-cell focus">1</div>
	 <div class="fw-col-md-6">
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell ">2</div>
			<div class="fw-col-md-6 featured-cell ">3</div>
		</div>
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell ">4</div>
			<div class="fw-col-md-6 featured-cell ">5</div>
		</div>
	 </div>
</div>

5 columns featured in mid
 <div class="fw-row">
				 
	 <div class="fw-col-sm-3">
	 	<div class="fw-row">
			<div class="fw-col-sm-6 featured-cell "></div>
			<div class="fw-col-sm-6 featured-cell "></div>
		</div>
	 </div>
	 <div class="fw-col-sm-6 featured-cell "></div>
		 <div class="fw-col-sm-3>
		 	<div class="fw-row">
				<div class="fw-col-sm-6 featured-cell "></div>
				<div class="fw-col-sm-6 featured-cell "></div>
			</div>
		 </div>
	</div>		 
 </div>
 
 5 columns featured in right
 <div class="fw-row">
	 <div class="fw-col-md-6">
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell "></div>
			<div class="fw-col-md-6 featured-cell "></div>
		</div>
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell "></div>
			<div class="fw-col-md-6 featured-cell "></div>
		</div>
	 </div>
	 <div class="fw-col-md-6 featured-cell focus"></div>
 </div>
*/ 
 ?>
 
 <div class="featured-posts-grid posts-block-5 <?php echo $unique_id; ?>">

		<div class="fw-row">
	
						
	<?php
	$args = array(
		'cat' => $post_category,
		'posts_per_page' => $max_posts,
		'orderby' => $order_by);

	// The Query
	$the_query = new WP_Query( $args );
	$i=1;
	$item_string=""; //set it up for concat

		// The Loop
		if ( $the_query->have_posts() )
		{
									
			while ( $the_query->have_posts() ) 
			{
				$the_query->the_post();
				
				/*Start loop divs, varies depending on the type of grid selected*/
					
				if($featured_placement=="left")
				{
					if($i==1){$cell_class="focus";}	else{$cell_class="";}					
					if($i==1){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.' ">';}
					if($i==4){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell last-mobile '.$cell_class.'">';}					
				
				}
				else if($featured_placement=="center")
				{
					if($i==3){$cell_class="focus";}	else{$cell_class="";}					
					if($i==1){$item_string.='<div class="fw-col-sm-3 wow fadeIn"><div class="fw-row"><div class="fw-col-sm-12 featured-cell '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-sm-12 no-bottom featured-cell  '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-sm-6 no-bottom featured-cell '.$cell_class.'" >';}
					if($i==4){$item_string.='<div class="fw-col-sm-3" ><div class="fw-row"><div class="fw-col-sm-12 featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-sm-12 no-bottom featured-cell last-mobile '.$cell_class.'">';}
				}	
				else if($featured_placement=="right")
				{
					if($i==5){$cell_class="focus";}	else{$cell_class="";}						
					if($i==1){$item_string.='<div class="fw-col-md-6"><div class="fw-row"><div class="fw-col-md-6 featured-cell l '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==4){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell last-mobile '.$cell_class.'">';}
			
				}
				
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
								$item_string.='<div class="component-element"><a href="'.get_permalink().'" class="image-holder">
													<div class="grid">';
																										
														if($show_hover_effects=="No")
														{
															if($cell_class=="focus")
															{
																$image_string=naked_generate_image($width,$large_height,get_the_ID());
																$item_string.=$image_string;
															}
															else
															{
																//small image
																$image_string=naked_generate_image($width,$small_height,get_the_ID());
																$item_string.=$image_string;
															}
														}
														else
														{
															$item_string.='
															<div class="effect-1">';
															
																if($cell_class=="focus")
																{
																	$image_string=naked_generate_image($width,$large_height,get_the_ID());
																	$item_string.=$image_string;
																}
																else
																{
																	//small image
																	$image_string=naked_generate_image($width,$small_height,get_the_ID());
																	$item_string.=$image_string;
																}
																
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
													</div>
												</a>
											</div>
								';
							}
						break;
							 
						case 'Title': 
							if($cell_class=="focus")
							{
								$item_string.='<div class="component-element meta-title"><h3 class="large-h3"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div>';
							}
							else
							{
								$item_string.='<div class="component-element meta-title"><h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4></div>';
							}
						break;
						
						case 'Excerpt':
							if($cell_class=="focus")
							{
								$item_string.='<div class="meta-excerpt component-element"><a href="'.get_permalink().'">'.nude_stripped_excerpt($large_excerpt_length).'</a></div>';
							}
							else
							{
								$item_string.='<div class="meta-excerpt component-element"><a href="'.get_permalink().'" >'.nude_stripped_excerpt($excerpt_length).'</a></div>';
							}
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
			
			if($featured_placement=="left")
			{
				if($i==1){ $item_string.='</div><div class="fw-col-md-6"><div class="fw-row">';}
				else if($i==2){$item_string.='</div>';}
				else if($i==3){$item_string.='</div></div><div class="fw-row">';}
				else if($i==4){$item_string.='</div>';}
				else if($i==5){$item_string.='</div></div></div>';}		
			}
			else if($featured_placement=="center")
			{
				if($i==1){ $item_string.='</div>';}
				else if($i==2){$item_string.='</div></div></div>';}
				else if($i==3){$item_string.='</div>';}
				else if($i==4){$item_string.='</div>';}
				else if($i==5){$item_string.='</div></div></div>';}
			}	
			else if($featured_placement=="right")
			{
				if($i==1){ $item_string.='</div>';}
				else if($i==2){$item_string.='</div></div><div class="fw-row">';}
				else if($i==3){$item_string.='</div>';}
				else if($i==4){$item_string.='</div></div></div>';}
				else if($i==5){$item_string.='</div>';}
			}
			/*end end loop divs*/
			$i++;	
			
		}
		
		echo $item_string;
	} 
	else 
	{
		// no posts found
	}						/* Restore original Post Data */
	wp_reset_postdata();
	
	
	?>

</div>
</div>

