<?php
/**
 * The Template for displaying all archives.
 *
 * @package naked
 */

if(function_exists( 'fw_get_db_customizer_option' ))
{
 	$sticky_header=fw_get_db_customizer_option('opt_header_sticky');

	/** Paths **/
	$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/posts-block-standard-blog');
	$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css

	/** Style and JS Includes **/
	wp_enqueue_style('thshpr-posts-block-standard-blog', $uri . '/static/css/style.css');
	wp_enqueue_script('thshpr-match-height', $uri . '/static/js/jquery.matchHeight-min.js',array('jquery'),'',true );
	wp_enqueue_script('thshpr-strap-point', $uri . '/static/js/strapPoint.min.js',array('jquery'),'',true );
	/** The equal heights is a little tricky. We must make the two columns equal heights to allow for vertical centering
	but we only want this to apply when the columns are parallel (not at tablet / mobile after bootstrap makes a single column).
	So we need to use match height and strap point this coding is contained in inits.js **/
	wp_enqueue_script('blog-inits', $uri . '/static/js/inits.js',array('jquery','thshpr-match-height','thshpr-strap-point'),'',true );

	/** Other variables from options **/
	$order_by=fw_get_db_customizer_option('opt_posts_block_ordering');
	$show_hover_effects=fw_get_db_customizer_option('opt_posts_block_hover_effects');
	$category_tag_number=fw_get_db_customizer_option('opt_posts_block_number_categories');
	$excerpt_length=fw_get_db_customizer_option('opt_posts_block_excerpt_length');
	$large_excerpt_length=fw_get_db_customizer_option('opt_posts_block_large_excerpt_length');
	$components_elements=fw_get_db_customizer_option('opt_posts_block_functionality');
	$read_more=fw_get_db_customizer_option('opt_posts_block_read_more_text');
	$max_posts=fw_get_db_customizer_option('opt_posts_block_number_posts');
	$divider_type=fw_get_db_customizer_option('opt_divider_type');
	$show_author_image=fw_get_db_customizer_option('opt_posts_block_show_author_image');

	/** Specific shortcode variables **/
	$show_divider=fw_get_db_customizer_option('opt_posts_block_show_divider');
	$enabled_pagination=fw_get_db_customizer_option('opt_posts_block_pagination');
	$next_text=fw_get_db_customizer_option('opt_posts_block_next_post_text');
	$prev_text=fw_get_db_customizer_option('opt_posts_block_prev_post_text');
	$small_hide_excerpt=0;
	$show_page_numbers=fw_get_db_customizer_option('opt_posts_block_show_page_numbers');
	if($show_page_numbers=="Yes")
	{
		$show_page_numbers_string="show-page-numbers";
	}
	else
	{
		$show_page_numbers_string="no-page-numbers";
	}
	$layout=fw_get_db_customizer_option('opt_posts_block_layout');
	$vertical_align_columns=fw_get_db_customizer_option('opt_posts_block_vertical_align_columns');

	if($vertical_align_columns=="Yes")
	{
		$vertical_align_columns_string="eq-height";
	}
	else
	{
		$vertical_align_columns_string="";
	}

	/** hover items **/
	$hover_top=thshpr_get_image_hover_string(fw_get_db_customizer_option('opt_image_hover_item_1'));
	$hover_bottom=thshpr_get_image_hover_string(fw_get_db_customizer_option('opt_image_hover_item_2'));

	/** image ratios **/
	$large_image_ratio=fw_get_db_customizer_option('opt_large_image_ratio');
	$small_image_ratio=fw_get_db_customizer_option('opt_small_image_ratio');
	$small_width=fw_get_db_customizer_option('opt_small_image_max_width');
	$large_width=fw_get_db_customizer_option('opt_large_image_max_width');//needs adding to options
	$large_height= thshpr_generate_aspect_height($large_image_ratio,$large_width);
	$small_height= thshpr_generate_aspect_height($small_image_ratio,$small_width);

    /**
      * General Options
      */
    $show_progress_indicator=fw_get_db_customizer_option('opt_show_progress_indicator');
    $sidebar_type=fw_get_db_customizer_option('opt_sidebar_type');
    $sticky_sidebar=fw_get_db_customizer_option('opt_sticky_sidebar');
    $center_title=fw_get_db_customizer_option('opt_posts_block_center_title');
    $title_overlay_image=fw_get_db_customizer_option('opt_posts_block_title_overlay_image');

    $title_overlay_image_string="";
    if($title_overlay_image=="Yes")
    {
        $title_overlay_image_string="archive-title-image-overlay";
    }




    $post_categories=$wp_query->get_queried_object_id();
    //$left_right_padding=fw_get_db_customizer_option('opt_left_right_padding');
    $content_column_string='';
	if($sidebar_type=="left")
  	{
  		$content_column_string.="fw-col-md-8 m-right";
		$main_id='main-right';
  	}
  	else if($sidebar_type=="right")
  	{
  		$content_column_string.="fw-col-md-8 m-left";
		$main_id='main-left';
  	}
  	else
  	{
  		$content_column_string.="fw-col-md-12 m-center";
		$content_inner_string="left-right-padding";
		$main_id='main-center';
  	}


    /**
      * Fullscreen Image Options
      */

      /**
        * Fullscreen Header Image Options
        */
    $header_image_width=1190;//hard set because scaling is used
    $back_image=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_parallax_image');
    $background_image=$back_image['data']['icon'];

    $header_fade_image_scroll=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_header_fade_image_scroll');
    $header_image_height=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_header_image_height');
    $background_position=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_background_position');
    $background_color=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_background_color');
    $background_repeat=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_background_repeat');
    $background_size=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_background_size');
    $background_parallax_ratio=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_background_parallax_ratio');





}

get_header();
include(locate_template('global-templates/page-borders.php'));
include(locate_template('global-templates/header-nav.php'));

if(function_exists( 'fw_get_db_post_option' ) && $back_image)
{
	$parallax_string="";
	include(locate_template('single-templates/parallax-section-string.php')); //generates meta string from customzed options
	echo $parallax_string;
}

?>
<div class="body-main-content" id="body-main-content">
    <section class="fw-main-row ">
		<div class="fw-container ">
			<div class="fw-row">

                <?php
				if($sidebar_type=="left")
				{
					?>

					<div class="fw-col-md-4" id="sidebar-left">
						<div class="<?php echo $sticky_class; ?>">
							<?php get_sidebar(); ?>
						</div>
					</div><!-- close sidebar -->

					<?php
				}

				?>
                <div class="<?php echo $content_column_string; ?>" id="<?php echo $main_id; ?>">
                    <div id="primary" class="content-area">


                        <div class="featured-posts-grid grid-2-col blog-standard">

                            <div class="archive-header <?php echo $title_overlay_image_string; ?>">
                        		<?php
                                if($center_title=="Yes")
                                {
                                    echo'<div class="fw-row"><div class="fw-col-sm-12">';
                    			    the_archive_title( '<h1 class="page-title center">', '</h1>' );
                                    echo'</div></div>';
                                }
                                else
                                {
                    			    the_archive_title( '<h1 class="page-title">', '</h1>' );
                                }
                        		?>
                        	</div><!-- .page-header -->
            		        <?php
                            if($title_overlay_image=="Yes")
                            {
                                the_archive_description( '<div class="taxonomy-description center">', '</div>' );
                            }
                            else
                            {
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            }

                            $item_string="";
                            $i=1;

                            if ( have_posts() ) :
                			// Start the Loop.
                			while ( have_posts() ) : the_post();

                                if($i!=1&&$show_divider=="Yes")
                        		{
                        			$item_string.='<div class="fw-row blog-row"><div class="fw-col-md-12 full-width"><div class="post-divider"></div></div></div>';
                        		}
                        		$hidden_thumb="";

                        		/** post options **/
                        		if(function_exists('fw_get_db_settings_option')) //check for options framework
                        		{
                        			$fullsize=fw_get_db_post_option(get_the_ID(), 'opt_fullsize');
                        			$subtitle=fw_get_db_post_option(get_the_ID(), 'opt_subtitle');
                        		}
                        		else
                        		{
                        			$fullsize="No";
                        		}

                        		/**  Start Full width post **/
                        		if($fullsize=="Yes"||$layout=="full-width")
                        		{
                        			include(locate_template('archive-templates/full-width.php'));
                        		}

                        		/** Start 50% left image **/
                        		else if($layout=="image-left-50")
                        		{
                        			include(locate_template('archive-templates/left-50.php'));
                        		}

                        		/** Start 33% left image **/
                        		else if($layout=="image-left-33")
                        		{
                        			include(locate_template('archive-templates/left-33.php'));
                        		}

                        		/** Start 50% right image **/
                        		else if($layout=="image-right-50")
                        		{
                        			include(locate_template('archive-templates/right-50.php'));
                        		}

                        		/** Start 33% right image **/
                        		else if($layout=="image-right-33")
                        		{
                        			include(locate_template('archive-templates/right-33.php'));
                        		}
                                $i++;
                			// End the loop.
                			endwhile;

                            echo $item_string;



                			// Previous/next page navigation.
                			the_posts_pagination( array(
                				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                				'next_text'          => __( 'Next page', 'twentysixteen' ),
                				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                			) );

                		// If no content, include the "No posts found" template.
                		else :
                			get_template_part( 'template-parts/content', 'none' );

                		endif;
                		?>
                        </div>

                    </div><!-- #primary -->
                </div><!-- close .main-content-inner -->

                <?php
                        if($sidebar_type=="right")
                        {
                            ?>
                                <div class="fw-col-md-4" id="sidebar-right">
                                    <div class="<?php echo $sticky_class; ?>">
                                        <?php get_sidebar(); ?>
                                    </div>
                                </div><!-- close sidebar -->

                            <?php
                        }
                        ?>

            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
