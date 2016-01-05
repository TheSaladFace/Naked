<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package naked
 */


if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{
 	 //Get chosen column layout from theme options
	$layout= fw_get_db_settings_option('opt_layout_archives');
	$content_layout_class=get_layout_name_class($layout);
	
	//Generate column info (functions.php)
	$column_info=get_column_info($layout);
	$left_sidebar_width=$column_info[0];
	$main_content_width=$column_info[1];
	$right_sidebar_width=$column_info[2];
	$main_content_position=$column_info[3];
}
else //use defaults
{
	$content_layout_class='two-columns-content-left';
	$left_sidebar_width =0;
	$main_content_width = 8;
	$right_sidebar_width = 4;
	$main_content_position ='middle';	
}
$GLOBALS['main_content_width'] = $main_content_width; //assign main content width to a global so it can be accessed in the content loop to switch images if full width

//Generate Bootstrap strings. These contain column widths, and column push / pulls (where appropriate). (functions.php)
$column_strings = get_bootstrap_column_strings($left_sidebar_width, $main_content_width, $right_sidebar_width, $main_content_position);
$left_sidebar_shift_string=$column_strings[0];
$main_content_shift_string=$column_strings[1];
$right_sidebar_shift_string=$column_strings[2];

$image_size=$nude_options['opt_blog_featured_thumbnail_size'];
$offset=$nude_options['opt_blog_offset'];
$content_size=12-$offset;
$layout=$nude_options['opt_blog_layout']['enabled']; //sorter from options for the blog rows
$shares=$nude_options['opt_blog_share_buttons']; //sorter from options for the social share icons
$share_text=$nude_options['opt_blog_share_text'];	
$offset_black_line=$nude_options['opt_blog_offset_black_line'];

get_header();
?>
<div class="main-content">	
	<div class=" archive-container">
		<div class="container <?php echo $content_layout_class; ?>">
			<div class="row">
				<div class="col-sm-12 archive-header">
					<h1 class="page-title">
							<?php
								if ( is_category() ) 
								{
									?>
									<span class="light">Categories ></span>
									
									<?php
									single_cat_title();
									?>
									
									<?php
								}
			
								elseif ( is_tag() ) 
								{
									?>
									<span class="light">Tags ></span>
									
									<?php
									single_tag_title();
									?>
									
									<?php
								}
			
								elseif ( is_author() )
								{
									/* Queue the first post, that way we know
									 * what author we're dealing with (if that is the case).
									*/
									?>
									<span class="light">Archives ></span>
									
									<?php
									the_post();
									printf( __( 'Author: %s', 'naked' ), '<span class="vcard">' . get_the_author() . '</span>' );
									/* Since we called the_post() above, we need to
									 * rewind the loop back to the beginning that way
									 * we can run the loop properly, in full.
									 */
									rewind_posts();
									?>
									
									<?php
								}
								elseif ( is_day() ) 
								{
									?>
									<span class="light">Archives ></span>
									
									<?php
									printf( __( 'Day: %s', 'naked' ), '<span>' . get_the_date() . '</span>' );
									?>
									
									<?php
								}
								elseif ( is_month() )
								{
									?>
									<span class="light">Archives ></span>
									
									<?php
									printf( __( 'Month: %s', 'naked' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
									?>
									
									<?php
								}
			
								elseif ( is_year() )
								{
									?>
									<span class="light">Archives ></span>
									
									<?php
									printf( __( 'Year: %s', 'naked' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
									?>
									
									<?php
								}
			
								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) 
								{
									_e( 'Asides', 'naked' );
								}
			
								elseif ( is_tax( 'post_format', 'post-format-image' ) )
								{
									_e( 'Images', 'naked');
								}
			
								elseif ( is_tax( 'post_format', 'post-format-video' ) )
								{
									_e( 'Videos', 'naked' );
								}
			
								elseif ( is_tax( 'post_format', 'post-format-quote' ) )
								{
									_e( 'Quotes', 'naked' );
								}
			
								elseif ( is_tax( 'post_format', 'post-format-link' ) )
								{
									_e( 'Links', 'naked' );
								}
			
								else
								{
									_e( 'Archives', 'naked' );
								}
							?>
						</h1>
						<?php
							// Show an optional term description.
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								printf( '<div class="taxonomy-description">%s</div>', $term_description );
							endif;
						?>
								
				</div>
			</div>
		</div>
	</div>
				
	<div class="container">
		<div class="row">
		
		
			<?php if ( $main_content_width  !=0 ): /*checks for zero width middle column, zero width isn't displayed*/?>
			
			<div class="main-content-inner <?php echo  $main_content_shift_string; ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
		
					<?php if ( have_posts() ) : ?>
				
						
				
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
				
							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to overload this in a child theme then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content');
							?>
				
						<?php endwhile; ?>
				
						<?php naked_paging_nav(); ?>
				
					<?php else : ?>
				
						<?php get_template_part( 'no-results', 'archive' ); ?>
				
					<?php endif; ?>
				
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- close .main-content-inner -->
			
			<?php endif; ?>
		
		
		
			<?php if ( $left_sidebar_width  !=0 ): /*checks for zero width left column, zero width isn't displayed*/ ?>
			
			<div class="sidebar <?php echo  $left_sidebar_shift_string ?>">
				<?php get_sidebar( 'left' ); ?> 
			</div><!-- close sidebar -->
			
			<?php endif; ?>
			
			
				
			<?php if ( $right_sidebar_width  !=0 ): /*checks for zero width right column, zero width isn't displayed*/?>
			
			<div class="sidebar <?php echo  $right_sidebar_shift_string; ?>">
				<?php get_sidebar(); ?>
			</div><!-- close sidebar -->
			
			<?php endif; ?>
		
			
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php get_footer(); ?>
