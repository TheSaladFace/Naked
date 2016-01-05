<?php
/**
 * The front page template file.
 *
 * The front page, which can be either the blog or a designated page
 *
 * @package Nude Theme
 */

if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{ 
	 //Get chosen column layout from theme options
	$layout= fw_get_db_settings_option('opt_layout_homepage');
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

//Generate Bootstrap strings. These contain column widths, and column push / pulls (where appropriate). (functions.php)
$column_strings = get_bootstrap_column_strings($left_sidebar_width, $main_content_width, $right_sidebar_width, $main_content_position);
$left_sidebar_shift_string=$column_strings[0];
$main_content_shift_string=$column_strings[1];
$right_sidebar_shift_string=$column_strings[2];

get_header();
?>
<div class="main-content">	
	<div class="container <?php echo $content_layout_class; ?>">
		<div class="row">
			
			
			<?php if ( $main_content_width  !=0 ): /*checks for zero width middle column, zero width isn't displayed*/?>
			
			<div class="main-content-inner <?php echo  $main_content_shift_string; ?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
			
					<?php if ( have_posts() ) : ?>
			
						<?php while ( have_posts() ) : the_post(); /* Start the Loop */ ?>
			
							<?php
								get_template_part( 'content', get_post_format() ); //post formats included
							?>
			
						<?php endwhile; 
							// Previous/next post navigation.
							naked_paging_nav();
			
					else : ?>
			
						<?php get_template_part( 'content', 'none' ); ?>
			
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
