<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

/*General variables for all posts blocks */

// find the uri to the shortcode folder
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-column');

wp_enqueue_style( 'posts-block-column', $uri . '/static/css/style.css',null, null, 'screen');

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

$large_post_top=$atts["opt_posts_block_large_top"];

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



$max_posts=$atts['opt_posts_block_number_posts'];

//image ratios
$small_image_ratio=$atts['opt_small_image_ratio'];
$small_width=$atts['opt_posts_block_small_image_width']; //note, this is large even for small images because of  responsive sizes.
$small_height= naked_generate_aspect_height($small_image_ratio,$small_width);

//image ratios
$large_image_ratio=$atts['opt_large_image_ratio'];
$large_width=1130; //note, this is large even for small images because of  responsive sizes.
$large_height= naked_generate_aspect_height($large_image_ratio,$large_width);
?>

			 
 
 <div class="posts-block-column">
				
						
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
													// Get upload directory info
													
							   
													if($cell_class=="tiny tiny-has-thumbnail")
													{
														$item_string.='<div class="tiny-image">';
													
														$item_string.='<a href="'.get_permalink().'">
																			';
																				$item_string.=naked_generate_image($small_width,$small_height,get_the_ID());
																				$item_string.='
																					
																				
																		</a>
																		';
																		
														$item_string.='</div>';
													}
													else
													{
														$item_string.='<a href="'.get_permalink().'" class="component-element image-holder">
																			<div class="grid">											
																				<div class="effect-1">';
																				//large image
																				$item_string.=naked_generate_image($large_width,$large_height,get_the_ID());
																				
																				$item_string.='<div class="item-1">
																									<p><span class="centered">'.$hover_top.'</span></p>
																								</div>
																								<div class="item-2">
																									<p><span class="centered">'.$hover_bottom.'</span></p>
																								</div>';
																				$item_string.='
																					
																				</div>
																			</div>
																		</a>
																		';
														
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
							
													if($cell_class=="focus")
													{
														$item_string.='<h3 class="component-element"><a href="'.get_permalink().'"">'.get_the_title().'</a></h3>';
													}
													else
													{
														$item_string.='<h4 class="meta-description meta-title featured-posts-grid-paragraph component-element"><a href="'.get_permalink().'" class="">'.get_the_title().'</a></h4>';
													}
												break;
											
											case 'Excerpt':
												
													if($cell_class=="focus")
													{
														$item_string.='<div class="meta-excerpt component-element"><a href="'.get_permalink().'">'.nude_stripped_excerpt($large_excerpt_length).'</a></div>';
													}
													else
													{
														$item_string.='<p class="meta-excerpt component-element"><a href="'.get_permalink().'">'.nude_stripped_excerpt($excerpt_length).'</a></p>';
													}
											
											break;
										 
											case 'Categories': 
													$categories = get_the_category();
													//var_dump($categories);
													$separator = ' ';
													$output = '';
													if($categories)
													{
														$output.='<p class="meta-categories featured-posts-grid-paragraph component-element">';
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
														$output.='<p class="meta-tags featured-posts-grid-paragraph component-element">';
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
												
												case 'Read More': 
														$item_string.='<p class="read-more featured-posts-grid-paragraph component-element"><a href="'.get_permalink().'">'.$read_more.'</a></p>';
												break;
															
												case 'Author': 
													$item_string.='<p class="meta-author featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
													$item_string.='</p>';
												break;
												
												case 'Date': 
													$item_string.='<p class="meta-date featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-date">'.get_the_date() .'</span>';
													$item_string.='</p>';
												break;
												
												case 'Comments': 
													$item_string.='<p class="meta-comments featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
													$item_string.='</p>';
												break;
												
												case 'Date+Comments': 
													$item_string.='<p class="meta-date-comments featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
																	<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
													$item_string.='</p>';
												break;
												
												case 'Comments+Author': 
													$item_string.='<p class="meta-comments-author featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
																	<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
													$item_string.='</p>';
												break;
												
												case 'Date+Author': 
													$item_string.='<p class="meta-date-author featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
																	<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
													$item_string.='</p>';
												break;
												
												case 'Date+Comments+Author': 
													$item_string.='<p class="meta-date-comments-author featured-posts-grid-paragraph component-element">';
													$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
																	<span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
																	<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
													$item_string.='</p>';
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
													
													<p class="share-boxes featured-posts-grid-paragraph component-element">
														<i class="fa fa-share-alt icon"></i><span class="share-label">'.__( 'Share This ', 'naked' ).'</span><!--
														--><span class="social-box facebook"><a class="inner facebook-inner" href="https://www.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()).'"><i class="fa fa-facebook icon"></i></a></span><!--
														--><span class="social-box twitter"><a class="inner twitter-inner" href="https://twitter.com/home?status='.urlencode(get_permalink()).'"><i class="fa fa-twitter icon"></i></a></span><!--
														--><span class="social-box google-plus"><a class="inner google-plus-inner" href="https://plus.google.com/share?url='.urlencode(get_permalink()).'"><i class="fa fa-google-plus icon"></i></a></span><!--
														--><span class="social-box linked-in"><a class="inner linked-in-inner" href="https://www.linkedin.com/shareArticle?mini=true&url='.urlencode(get_permalink()).'&title='.urlencode(get_the_title()).'&summary='.nude_stripped_excerpt($excerpt_length).'&source="><i class="fa fa-linkedin icon"></i></a></span><!--
														--><span class="social-box pinterest"><a class="inner pinterest-inner" href="https://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&media='.urlencode($image_path).'&description='.nude_stripped_excerpt($excerpt_length).'"><i class="fa fa-pinterest icon"></i></a></span>
													</p>';
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
						}						/* Restore original Post Data */
						wp_reset_postdata();
					
					?>
			
</div>

