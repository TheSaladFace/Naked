<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package naked
 */



get_header();
include(locate_template('global-templates/page-borders.php'));
include(locate_template('global-templates/header-nav.php'));
?>
<div class="body-main-content">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </article>
</div>
<?php get_footer(); ?>
