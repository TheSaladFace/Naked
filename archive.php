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

    $override_customizer='';
    if (is_category())
    {
        $overrides=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'override_customizer');
    }
    else if (is_tag())
    {
        $overrides=fw_get_db_term_option($wp_query->get_queried_object_id(), 'post_tag', 'override_customizer');
    }

	if($override_customizer=='override')
	{
        /** Other variables from options **/
    	$order_by=$overrides['override']['opt_posts_block_ordering'];
    	$show_hover_effects=$overrides['override']['opt_posts_block_hover_effects'];
    	$category_tag_number=$overrides['override']['opt_posts_block_number_categories'];
    	$excerpt_length=$overrides['override']['opt_posts_block_excerpt_length'];
    	$large_excerpt_length=$overrides['override']['opt_posts_block_large_excerpt_length'];
    	$post_components_elements=$overrides['override']['opt_posts_block_functionality'];
    	$read_more=$overrides['override']['opt_posts_block_read_more_text'];
    	$max_posts=$overrides['override']['opt_posts_block_number_posts'];
    	$divider_type=$overrides['override']['opt_divider_type'];
    	$show_author_image=$overrides['override']['opt_posts_block_show_author_image'];

    	/** Specific shortcode variables **/
    	$show_divider=$overrides['override']['opt_posts_block_show_divider'];
    	$enabled_pagination=$overrides['override']['opt_posts_block_pagination'];
    	$next_text=$overrides['override']['opt_posts_block_next_post_text'];
    	$prev_text=$overrides['override']['opt_posts_block_prev_post_text'];
    	$small_hide_excerpt=0;
    	$show_page_numbers=$overrides['override']['opt_posts_block_show_page_numbers'];

        $layout=$overrides['override']['opt_posts_block_layout'];
    	$vertical_align_columns=$overrides['override']['opt_posts_block_vertical_align_columns'];

        /** hover items **/
    	$hover_top=thshpr_get_image_hover_string($overrides['override']['opt_image_hover_item_1']);
    	$hover_bottom=thshpr_get_image_hover_string($overrides['override']['opt_image_hover_item_2']);

    	/** image ratios **/
    	$large_image_ratio=$overrides['override']['opt_large_image_ratio'];
    	$small_image_ratio=$overrides['override']['opt_small_image_ratio'];
    	$small_width=$overrides['override']['opt_small_image_max_width'];
    	$large_width=$overrides['override']['opt_large_image_max_width'];//needs adding to options
    	$large_height= thshpr_generate_aspect_height($large_image_ratio,$large_width);
    	$small_height= thshpr_generate_aspect_height($small_image_ratio,$small_width);

        /**
          * General Options
          */
        $show_progress_indicator=$overrides['override']['opt_show_progress_indicator'];
        $sidebar_type=$overrides['override']['opt_sidebar_type'];
        $sticky_sidebar=$overrides['override']['opt_sticky_sidebar'];
        $center_title=$overrides['override']['opt_posts_block_center_title'];
        $title_overlay_image=$overrides['override']['opt_posts_block_title_overlay_image'];

        $title_overlay_image_string="";

        /**
          * Fullscreen Image Options
          */
        $header_image_width=1190;//hard set because scaling is used
        $back_image=fw_get_db_term_option($wp_query->get_queried_object_id(), 'category', 'opt_parallax_image');
        $background_image="";
        if(isset($back_image['data']['icon']))
        {
            $background_image=$back_image['data']['icon'];
        }

        $header_fade_image_scroll=$overrides['override']['opt_header_fade_image_scroll'];
        $header_image_height=$overrides['override']['opt_header_image_height'];
        $background_position=$overrides['override']['opt_background_position'];
        $background_color=$overrides['override']['opt_background_color'];
        $background_repeat=$overrides['override']['opt_background_repeat'];
        $background_size=$overrides['override']['opt_background_size'];
        $background_parallax_ratio=$overrides['override']['opt_background_parallax_ratio'];

        /**
		  * Title Options
		  */

		$breadcrumbs_homepage_title=fw_get_db_customizer_option('opt_breadcrumbs_homepage_title');
        $title_components_elements=$overrides['override']['opt_category_title_functionality'];
        $header_divider_type=$overrides['override']['opt_categories_title_divider_type'];

    }

    else
    {
        /** Other variables from options **/
    	$order_by=fw_get_db_customizer_option('opt_posts_block_ordering');
    	$show_hover_effects=fw_get_db_customizer_option('opt_posts_block_hover_effects');
    	$category_tag_number=fw_get_db_customizer_option('opt_posts_block_number_categories');
    	$excerpt_length=fw_get_db_customizer_option('opt_posts_block_excerpt_length');
    	$large_excerpt_length=fw_get_db_customizer_option('opt_posts_block_large_excerpt_length');
    	$post_components_elements=fw_get_db_customizer_option('opt_posts_block_functionality');
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

        $layout=fw_get_db_customizer_option('opt_posts_block_layout');
    	$vertical_align_columns=fw_get_db_customizer_option('opt_posts_block_vertical_align_columns');

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

        /**
        * Fullscreen Image Options
        */
        $header_image_width=1190;//hard set because scaling is used
        $back_image=fw_get_db_customizer_option('opt_categories_header_parallax_image');

        $background_image="";
        if(isset($back_image['data']['icon']))
        {
            $background_image=$back_image['data']['icon'];
        }

        $header_fade_image_scroll=fw_get_db_customizer_option('opt_categories_header_fade_image_scroll');
        $header_image_height=fw_get_db_customizer_option('opt_categories_header_image_height');
        $background_position=fw_get_db_customizer_option('opt_categories_background_position');
        $background_color=fw_get_db_customizer_option('opt_categories_background_color');
        $background_repeat=fw_get_db_customizer_option('opt_categories_background_repeat');
        $background_size=fw_get_db_customizer_option('opt_categories_background_size');
        $background_parallax_ratio=fw_get_db_customizer_option('opt_categories_background_parallax_ratio');

        /**
		  * Title Options
		  */
		$breadcrumbs_homepage_title=fw_get_db_customizer_option('opt_breadcrumbs_homepage_title');
        $title_components_elements=fw_get_db_customizer_option('opt_categories_title_functionality');
        $header_divider_type=fw_get_db_customizer_option('opt_categories_title_divider_type');

    }


	if($show_page_numbers=="Yes")
	{
		$show_page_numbers_string="show-page-numbers";
	}
	else
	{
		$show_page_numbers_string="no-page-numbers";
	}


	if($vertical_align_columns=="Yes")
	{
		$vertical_align_columns_string="eq-height";
	}
	else
	{
		$vertical_align_columns_string="";
	}


    if($title_overlay_image=="Yes" && $background_image!="") //if the image isn't present we cant have this
    {
        $title_overlay_image_string="archive-title-image-overlay";
    }

    $center_title_string="";
    if($center_title=="Yes")
    {
        $center_title_string="center";
    }

    $post_categories=$wp_query->get_queried_object_id();
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







}

get_header();
include(locate_template('global-templates/page-borders.php'));
include(locate_template('global-templates/header-nav.php'));

if(function_exists( 'fw_get_db_post_option' ) && $background_image!="")
{
	$parallax_string="";
	include(locate_template('single-templates/parallax-section-string.php')); //generates meta string from customzed options
	echo $parallax_string;
    if($title_overlay_image=="Yes")
    {
        echo'<div class="category-spacer"></div>';
    }
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

                            <div class="archive-header <?php echo $title_overlay_image_string; ?> <?php echo $center_title_string; ?>">
                        		<?php
                                $divider_type=$header_divider_type;
                                $components_elements=$title_components_elements; //have to set this here because component elements used twice otherwise
                                $breadcrumbs_offset_string="";
                                $item_string="";
                                if($center_title=="Yes")
                                {
                                    echo'<div class="fw-row"><div class="fw-col-sm-12">';
                                    include locate_template('archive-templates/title-elements-string.php');
                                    echo $item_string;
                                    echo'</div></div>';
                                }
                                else
                                {
                                    include locate_template('archive-templates/title-elements-string.php');
                                    echo $item_string;
                                }

                        		?>
                        	</div><!-- .page-header -->
            		        <?php


                            $item_string="";
                            $i=1;
                            $components_elements=$post_components_elements; //again, this set because there are two component elements, one for title, one for posts

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

<?php
/** Custom query loop pagination **/
$pagination = get_the_posts_pagination
(
	array
	(
		'mid_size' => 0,
		'prev_text' => 'prev',
		'next_text' => 'next',
	)
);

if($enabled_pagination=="Yes")
{
	echo'<div class="next-text hidden">'.$next_text.'</div>';
	echo'<div class="prev-text hidden">'.$prev_text.'</div>';
	echo'<div class="page-nav-standard '.$show_page_numbers_string.'">'.$pagination.'</div>';
}
?>

<?php get_footer(); ?>
