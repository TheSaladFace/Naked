<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package naked
 */
 
 if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
{
	$footer_slider_type=fw_get_db_settings_option('opt_footer_thumbslider_type');	
}
else
{
	$footer_slider_type="full";
}

//if footer thumbnail slider
if($footer_slider_type=="full")
{
	get_template_part( 'templates/footer', 'featured-thumbnail-slider' );
}
if($footer_slider_type=="minimal")
{
	get_template_part( 'templates/footer', 'minimal-thumbnail-slider' );
}
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		
		
		<?php
		
			//register sidebar widgets if they have been activated from the options.
			 global $nude_options;
			 
			 $sidebars = $nude_options['opt_footer_layout']['enabled'];
		 
			if ($sidebars): foreach ($sidebars as $key=>$value) 
			{
			 
			    switch($key) 
			    {
			 
				case 'singlecolumn_1': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<?php dynamic_sidebar( 'footer-single-column-1-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'singlecolumn_2': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-12 col-lg-12">
							<?php dynamic_sidebar( 'footer-single-column-2-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'twocolumn_1': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6">
							<?php dynamic_sidebar( 'footer-two-column-1-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<?php dynamic_sidebar( 'footer-two-column-1-second-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'twocolumn_3': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-4 col-lg-4">
							<?php dynamic_sidebar( 'footer-two-column-3-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-8 col-lg-8">
							<?php dynamic_sidebar( 'footer-two-column-3-second-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'twocolumn_4': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-8 col-lg-8">
							<?php dynamic_sidebar( 'footer-two-column-4-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-4 col-lg-4">
							<?php dynamic_sidebar( 'footer-two-column-4-second-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'threecolumn_1': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-4 col-lg-4">
							<?php dynamic_sidebar( 'footer-three-column-1-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-4 col-lg-4">
							<?php dynamic_sidebar( 'footer-three-column-1-second-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-4 col-lg-4">
							<?php dynamic_sidebar( 'footer-three-column-1-third-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'threecolumn_2': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6">
							<?php dynamic_sidebar( 'footer-three-column-2-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-43">
							<?php dynamic_sidebar( 'footer-three-column-2-second-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-three-column-2-third-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'threecolumn_4': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-three-column-4-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-three-column-4-second-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-6 col-lg-6">
							<?php dynamic_sidebar( 'footer-three-column-4-third-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'fourcolumn': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-four-column-1-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-four-column-1-second-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-four-column-1-third-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-3 col-lg-3">
							<?php dynamic_sidebar( 'footer-four-column-1-fourth-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
				
				case 'sixcolumn': 
					
					?>
					
					<div class="row">
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-first-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-second-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-third-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-fourth-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-fifth-sidebar' ); ?>
						</div>
						<div class="col-12 col-md-2 col-lg-2">
							<?php dynamic_sidebar( 'footer-six-column-1-sixth-sidebar' ); ?>
						</div>
					</div>
					
					<?php
					
				break;
			 
			 
			    }
			 
			}
			endif;
			?>
		
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>



</body>
</html>