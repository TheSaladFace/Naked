<?php 
if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{
	$featured_ratio=fw_get_db_post_option(get_the_ID(),'opt_image_ratio');
	$featured_width=1000;
	$featured_height=nude_generate_image_size($featured_ratio,$featured_width);

}
else
{
	
}

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
	
	$featured_suffix    = "{$featured_width}x{$featured_height}";
	$featured_dest_path = "{$upload_dir}{$rel_path}-{$featured_suffix}.{$ext}";
	$featured_image_url       = "{$upload_url}{$rel_path}-{$featured_suffix}.{$ext}";
	
	if ( !file_exists( $featured_dest_path ) )
	{
				// Generate thumbnail
		image_make_intermediate_size( $path, $featured_width, $featured_height, true );
	}
						
	$image_string='<img src="'.$featured_image_url.'" width="'.$featured_width.'" height="'.$featured_height.'">';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php echo $image_string; ?>

	<header class="entry-header">
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div>
		<?php
		

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
				

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
