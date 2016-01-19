<?php if (!defined('FW')) die('Forbidden');

/**
 * Generates hover string from the passed option array
 * @requires $opt_image_hover_item - multidimensional array containing user choice for hover
 */
function thshpr_get_image_hover_string($opt_image_hover_item)
{
	$hover_string='';
	if($opt_image_hover_item['template']=="1")//text
	{
		$hover_string=$opt_image_hover_item[1]['opt_image_hover_item_text'];
	}
	else if($opt_image_hover_item['template']=="2")//icon
	{
		$hover_string='<i class="'.$opt_image_hover_item[2]['opt_image_hover_item_icon'].'" data-value="'.$opt_image_hover_item['2']['opt_image_hover_item_icon'].'"></i>';
	}
	else if($opt_image_hover_item['template']=="3")//image
	{
		$hover_string='<img src="'.$opt_image_hover_item[3]['opt_image_hover_item_image']['url'].'">';
	}
	return $hover_string;
}

function thshpr_get_category_ids_string($post_categories)
{
	$strcats="";
	if(count($post_categories)>1)
	{
		foreach($post_categories as $value)
		{
			$strcats.=$value.",";
		}
	}
	else if(count($post_categories)==1)
	{
		$strcats=$post_categories[0];
	}
	else
	{
		$strcats=1;
	}
	return $strcats;
}

function thshpr_stripped_excerpt($limit)
{
	$excerpt = get_the_excerpt();
	$excerpt = strip_tags($excerpt);
	$excerpt = explode(' ', $excerpt, $limit);

	 if (count($excerpt)>=$limit) {
	 array_pop($excerpt);
	 $excerpt = implode(" ",$excerpt).'...';
	 } else {
	 $excerpt = implode(" ",$excerpt);
	 }
	 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	 return $excerpt;

}
function thshpr_generate_aspect_height($ratio,$width)
{
	if($ratio=="21:9")
	{
		$height=round(9/21*$width);
	}
	if($ratio=="16:9")
	{
		$height=round(9/16*$width);
	}
	else if($ratio=="3:2")
	{
		$height=round(2/3*$width);
	}
	else if($ratio=="4:3")
	{
		$height=round(3/4*$width);
	}
	else if($ratio=="1:1")
	{
		$height=round(1/1*$width);
	}
	else if($ratio=="3:4")
	{
		$height=round(4/3*$width);
	}
	else if($ratio=="2:3")
	{
		$height=round(3/2*$width);
	}
	else if($ratio=="9:16")
	{
		$height=round(16/9*$width);
	}

	return $height;

}

function thshpr_generate_categories()
{
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
	return $item_string;
}

function thshpr_generate_image($width,$height,$id)
{
	// Get upload directory info
	$upload_info = wp_upload_dir();
	$upload_dir  = $upload_info['basedir'];
	$upload_url  = $upload_info['baseurl'];

	// Get file path info
	$attachment_id = get_post_thumbnail_id($id);
	$path = get_attached_file( $attachment_id );
	$path_info = pathinfo( $path );
	$ext = $path_info['extension'];
	$rel_path  = str_replace( array( $upload_dir, ".$ext" ), '', $path );

	//large image
	$suffix    = "{$width}x{$height}";
	$dest_path = "{$upload_dir}{$rel_path}-{$suffix}.{$ext}";
	$image_url  = "{$upload_url}{$rel_path}-{$suffix}.{$ext}";

	if ( !file_exists( $dest_path ) )
	{
		// Generate thumbnail
		image_make_intermediate_size( $path, $width, $height, true );
	}

	$item_string='<img src="'.$image_url.'" width="'.$width.'" height="'.$height.'">';
	return($item_string);
}
