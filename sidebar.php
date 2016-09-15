<?php
/**
 * The sidebar containing the main widget area
 *
 * @package naked
 */
?>

	<?php

		/** check for customisation options **/
		if(function_exists( 'fw_get_db_customizer_option' ))
		{
			/** side meta options **/
			$sticky_sidebar=fw_get_db_customizer_option('opt_sticky_sidebar');
			$sidebar_header_accent=fw_get_db_customizer_option('opt_sidebar_header_accent');

			if($sticky_sidebar==1)
			{
				$sticky_sidebar_class="sticky-element";
			}
			else
			{
				$sticky_sidebar_class="";
			}

			if($sidebar_header_accent==1)
			{
				$sidebar_header_class="fancy-header";
			}
			else
			{
				$sidebar_header_class="";
			}

		}
		else
		{
			$sticky_sidebar_class="sticky-element";
		}

	?>
		<div class="sidebar-right sidebar <?php echo $sticky_sidebar_class; ?> <?php echo $sidebar_header_class; ?>">

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
