<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'demo_disabled';
//	$to_disable[] = 'some_other_shortcode';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_shortcodes');


add_action( 'init', 'naked_masonry_image_setup' );
function naked_masonry_image_setup() {
   add_image_size( 'masonry', 800, 500, false ); 
}

add_filter('next_posts_link_attributes', 'naked_posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'naked_posts_link_attributes_prev');

function naked_posts_link_attributes_next() {
    return 'class="next-post"';
}
function naked_posts_link_attributes_prev() {
    return 'class="prev-post"';
}

function nude_stripped_excerpt($limit)
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
function naked_generate_aspect_height($ratio,$width)
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
function naked_generate_image($width,$height,$id)
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