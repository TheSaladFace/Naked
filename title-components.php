<?php

if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{
	$components_elements=fw_get_db_settings_option('opt_posts_header_functionality');
}
else
{
	$components_elements=array('Title','Date');
}


if ($components_elements): foreach ($components_elements as $key=>$value) 
{
	switch($value['opt_header_featuredposts_rows']) 
	{
		case 'Title': 
			
			if($cell_class=="focus")
			{
				$item_string.='<h3 class="component-element large-h3"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
			}
			else
			{
				$item_string.='<h4 class="meta-description meta-title featured-posts-grid-paragraph component-element"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>';
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
		
	}	
}
endif;
		
echo $item_string;
