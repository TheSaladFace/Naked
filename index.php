<?php
/**
 * The main template file. (not used, sample only)
 *
 * This template is completely overwritten in this theme. However, I left it in for you buyers to use if you want to
 * do something unusual in a child theme that overwrites any of the other templates. Just copy this content and
 * paste then modify and save as the template of your choosing inside the child theme, and it will overwrite the
 * parent.
 *
 * @package Nude Theme
 */


get_header();
?>
<div class="main-content">
	<div class="container">
		<div class="row">


			<div class="main-content-inner main-content-inner col-12 col-md-8 col-md-push-0">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); /* Start the Loop */ ?>

							<?php
								get_template_part( 'content', get_post_format() ); //post formats included
							?>

						<?php endwhile;
							// Previous/next post navigation.
							//naked_paging_nav();

					else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- close .main-content-inner -->


			<div class="sidebar col-12 col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- close sidebar -->


		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php get_footer(); ?>
