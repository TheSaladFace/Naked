<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

/*General variables for all posts blocks */


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
$post_category=$strcats;

$order_by=$atts["opt_posts_block_ordering"];


$normal_thumbnail='grid_small_image';
$focus_thumbnail='grid_focus_image';
$category_tag_number=$atts["opt_posts_block_number_categories"];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$components_elements=$atts["opt_posts_block_functionality"];
$show_hover_icons=$atts["opt_posts_block_show_hover_icons"];
$read_more=$atts['opt_posts_block_read_more_text'];
$hover_icon=fw_get_db_settings_option('opt_image_icon');
$hover_item='<i class="'.$hover_icon.' js-option-type-icon-item  active" data-value="'.$hover_icon.'" style="display: block;"></i>';

//hover items
$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
if($opt_image_hover_item_top['template']==1)//text
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

$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
if($opt_image_hover_item_bottom['template']==1)//text
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


$small_show_excerpt=$atts['opt_posts_block_show_excerpt'];
$max_posts=5;

 ?>
 
 <?php
 			/*
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
					 <div class="fw-col-md-6 featured-cell focus">
					 </div>
				 
				 </div>
			 */ 
 ?>
 
 <div class="featured-posts-grid">

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
								
				if($i==5)
				{
					$thumbnail_size=$focus_thumbnail;
					$cell_class="focus";
				}
				else
				{
					$thumbnail_size=$normal_thumbnail;
					$cell_class="";
				}
					
				if($i==1){$item_string.='<div class="fw-col-md-6"><div class="fw-row"><div class="fw-col-md-6 featured-cell l '.$cell_class.'">';}
				else if($i==2){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
				if($i==3){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
				if($i==4){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
				if($i==5){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
							
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
								
								$item_string.='<a href="'.get_permalink().'">
													<div class="grid">											
														<div class="effect-1">'.get_the_post_thumbnail(get_the_ID(),$thumbnail_size );
														
															if($cell_class=="focus" || $show_hover_icons=="Yes")
															{
																
																$item_string.='<div class="item-1">
																					<p><span class="centered">'.$hover_top.'</span></p>
																				</div>
																				<div class="item-2">
																					<p><span class="centered">'.$hover_bottom.'</span></p>
																				</div>';
																				
															}
															$item_string.=
															
														'</div>
													</div>
												</a>
												<p class="featured-posts-grid-paragraph extra-margin"></p>';
												
							}
						break;
							 
						case 'Title': 
							
								if($cell_class=="focus")
								{
									$item_string.='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3></a>';
								}
								else
								{
									$item_string.='<a href="'.get_permalink().'"><p class="meta-description meta-title featured-posts-grid-paragraph">'.get_the_title().'<br/>&#8594;</p></a>';
								}
							break;
							
						case 'Title + Excerpt':
								$item_string.='<a href="'.get_permalink().'"><p class="meta-description featured-thumbnail-slider-paragraph meta-title ">'.get_the_title().'<br/></p><p class="meta-excerpt">'.nude_stripped_excerpt($excerpt_length).'</p></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
						break;	
						
						case 'Title + Excerpt':
							
								if($cell_class=="focus")
								{
									$item_string.='<a href="'.get_permalink().'"><h3>'.get_the_title().'</h3><div class="meta-excerpt">'.nude_excerpt(184).'</div></a>';
								}
								else
								{
									if($small_show_excerpt=="No")
									{ 
										$item_string.='<a href="'.get_permalink().'"><p class="meta-description meta-title featured-thumbnail-slider-paragraph">'.get_the_title().'</p></a>';
									}
									else
									{ 
										$item_string.='<a href="'.get_permalink().'"><p class="meta-description meta-title featured-thumbnail-slider-paragraph">'.get_the_title().'</p><p class="meta-excerpt">'.nude_stripped_excerpt($excerpt_length).'</p></a>';
									}
								}
						
						break;
					 
						case 'Categories': 
							$categories = get_the_category();
							//var_dump($categories);
							$separator = ' ';
							$output = '';
							if($categories)
							{
								$output.='<p class="meta-categories featured-posts-grid-paragraph">';
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
								$output.='<p class="meta-tags featured-posts-grid-paragraph">';
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
							$item_string.='<p class="meta-author featured-posts-grid-paragraph"><i class="icon-user-5 icon"></i>';
							$item_string.=__( 'Posted By: ', 'naked' ).'<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>';
							$item_string.='</p>';
						break;
						
						case 'Date': 
							$item_string.='<p class="meta-date featured-posts-grid-paragraph"><i class="icon-calendar-inv icon"></i>';
							$item_string.=human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; 
							$item_string.='</p>';
						break;
					}
								
					
				}
			endif;
			
			/*End loop divs, varies depending on the type of grid selected*/
			
			if($i==1){ $item_string.='</div>';}
			else if($i==2){$item_string.='</div></div><div class="fw-row">';}
			else if($i==3){$item_string.='</div>';}
			else if($i==4){$item_string.='</div></div></div>';}
			else if($i==5){$item_string.='</div>';}
			
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

