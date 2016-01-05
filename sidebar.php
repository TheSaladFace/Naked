<?php
/**
 * The sidebar containing the main widget area
 *
 * @package naked
 */
?>
	
		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) 
		?>
		<div class="sidebar-padder sidebar-right">

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'right-sidebar' ) ) : ?>
	
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
	
				<aside id="archives" class="widget widget_archive">
					<h3 class="widget-title"><?php _e( 'Archives', 'naked' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
	
				<aside id="meta" class="widget widget_meta"> 
					<h3 class="widget-title"><?php _e( 'Meta', 'naked' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
	
			<?php endif; ?>
			
		</div><!-- close .sidebar-padder -->
