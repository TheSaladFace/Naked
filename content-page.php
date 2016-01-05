<?php
/**
 * The template used for displaying page content
 *
 * @package naked
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
page
	<?php
		// Page thumbnail and title.
		the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
	?>

	<div>
	
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
			

	</div><!-- .entry-content -->
</article><!-- #post-## -->
end
