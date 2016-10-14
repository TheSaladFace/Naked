<?php
/**
 * Generates HTML output for the 5 Posts Featured Shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/5-posts-featured');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css

/** Style and JS Includes **/
wp_enqueue_style('thshpr-5-posts-featured', $uri . '/static/css/style.css',null, null, 'screen');

/** Generate category id string **/
$post_categories=$atts["opt_posts_block_categories"];
$post_categories=array_values($post_categories);
$post_categories=thshpr_get_category_ids_string($post_categories);

/** Other variables from options **/
$unique_id='id-'.$atts['id'];
$order_by=$atts["opt_posts_block_ordering"];
$show_hover_effects=$atts["opt_posts_block_hover_effects"];
$category_tag_number=$atts["opt_posts_block_number_categories"];
$excerpt_length=$atts["opt_posts_block_excerpt_length"];
$large_excerpt_length=$atts["opt_posts_block_large_excerpt_length"];
$featured_placement=$atts["opt_posts_block_featured_placement"];
$components_elements=$atts["opt_posts_block_functionality"];
$read_more=$atts['opt_posts_block_read_more_text'];
$show_author_image=$atts['opt_posts_block_show_author_image'];

$max_posts=5;
$divider_type=$atts['opt_divider_type'];

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=$atts['opt_small_image_max_width'];
$large_height= thshpr_generate_aspect_height($large_image_ratio,$width);
$small_height= thshpr_generate_aspect_height($small_image_ratio,$width);


/*
grid bootstrap calculations. Left for possible debugging / modification purposes. Loop extracts each post + post component elements.
Relevant div markup is placed before and after each part of the loop.

5 columns featured in left
<div class="fw-row">
	<div class="fw-col-md-6 featured-cell focus">1</div>
	 <div class="fw-col-md-6">
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell ">2</div>
			<div class="fw-col-md-6 featured-cell ">3</div>
		</div>
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell ">4</div>
			<div class="fw-col-md-6 featured-cell ">5</div>
		</div>
	 </div>
</div>

5 columns featured in mid
 <div class="fw-row">

	 <div class="fw-col-sm-3">
	 	<div class="fw-row">
			<div class="fw-col-sm-6 featured-cell "></div>
			<div class="fw-col-sm-6 featured-cell "></div>
		</div>
	 </div>
	 <div class="fw-col-sm-6 featured-cell "></div>
		 <div class="fw-col-sm-3>
		 	<div class="fw-row">
				<div class="fw-col-sm-6 featured-cell "></div>
				<div class="fw-col-sm-6 featured-cell "></div>
			</div>
		 </div>
	</div>
 </div>

 5 columns featured in right
 <div class="fw-row">
	 <div class="fw-col-md-6">
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell "></div>
			<div class="fw-col-md-6 featured-cell "></div>
		</div>
		<div class="fw-row">
			<div class="fw-col-md-6 featured-cell "></div>
			<div class="fw-col-md-6 featured-cell "></div>
		</div>
	 </div>
	 <div class="fw-col-md-6 featured-cell focus"></div>
 </div>
*/
 ?>

<?php
$components_array = array();

$args = array(
	'cat' => $post_categories,
	'posts_per_page' => $max_posts,
	'orderby' => $order_by);
/** WP Query **/
$the_query = new WP_Query( $args );
$featured_position="";
/*focus post positions*/
if($featured_placement=="left")
{
    $featured_position=1;
}
else if($featured_placement=="center")
{
    $featured_position=3;
}
else if($featured_placement=="right")
{
    $featured_position=5;
}

$p=0;
$cell_class="";
$item_string="";
	/** The Loop **/
	if ( $the_query->have_posts() )
	{
		while ( $the_query->have_posts() )
		{

			$the_query->the_post();
            $p++;
			$hidden_thumb="";
            /** post options **/
    		if(function_exists('fw_get_db_settings_option')) //check for options framework
    		{
                $subtitle=fw_get_db_post_option(get_the_ID(), 'opt_subtitle');
            }

            /*$item_string.="<br><br>n:".$p;
            $item_string.="<br>Featured positon".$featured_position;*/
            /*check for focus position and alter variables in accordance*/
            if($p==$featured_position)
            {
                $cell_class="focus";
            }
            else
            {
                $cell_class="";
            }


			if ($components_elements): foreach ($components_elements as $key=>$value)
			{


                /** Runs through user selected drag and drop component elements from shortcode options **/
                /** Include templates rather than functions due to WordPress loop variable scope **/
				switch($value['opt_header_featuredposts_rows'])
				{
					case 'Thumbnail':
						include locate_template('post-component-elements/image-string.php');
					break;
                    case 'Title':
						include locate_template('post-component-elements/title-string.php');
					break;
                    case 'Read More':
						include locate_template('post-component-elements/read-more-string.php');
					break;
					case 'Excerpt':
                        include locate_template('post-component-elements/excerpt-string.php');
					break;
                    case 'Subtitle':
            			include locate_template('post-component-elements/subtitle-string.php');
            		break;
					case 'Categories':
                        include locate_template('post-component-elements/categories-string.php');
					break;
					case 'Tags':
                        include locate_template('post-component-elements/tags-string.php');
                	break;
                    case 'Date':
						include locate_template('post-component-elements/date-string.php');
					break;
					case 'Author':
						include locate_template('post-component-elements/author-string.php');
					break;
					case 'Comments':
						include locate_template('post-component-elements/comments-string.php');
					break;
					case 'Date+Comments':
						include locate_template('post-component-elements/date-comments-string.php');
					break;
					case 'Comments+Author':
						include locate_template('post-component-elements/comments-author-string.php');
					break;
					case 'Date+Author':
						include locate_template('post-component-elements/date-author-string.php');
					break;
					case 'Date+Comments+Author':
						include locate_template('post-component-elements/date-comments-author-string.php');
					break;
					case 'Share Boxes':
                        include locate_template('post-component-elements/share-boxes-string.php');
					break;
					case 'Divider':
                        include locate_template('post-component-elements/divider-string.php');
					break;
                    case 'Spacer 50px':
            			include locate_template('post-component-elements/spacer-50px.php');
            		break;
            		case 'Spacer 40px':
            			include locate_template('post-component-elements/spacer-40px.php');
            		break;
            		case 'Spacer 30px':
            			include locate_template('post-component-elements/spacer-30px.php');
            		break;
            		case 'Spacer 20px':
            			include locate_template('post-component-elements/spacer-20px.php');
            		break;
            		case 'Spacer 10px':
            			include locate_template('post-component-elements/spacer-10px.php');
            		break;
            		case 'Spacer 5px':
            			include locate_template('post-component-elements/spacer-5px.php');
            		break;
            		case 'Spacer 2px':
            			include locate_template('post-component-elements/spacer-2px.php');
            		break;
            		case 'Spacer 1px':
            			include locate_template('post-component-elements/spacer-1px.php');
            		break;
				}

			}
		    endif;
            $components_array[]=$item_string;
            $item_string="";

	}
    /** Restore original Post Data **/
    wp_reset_postdata();

}
else
{
	/** No posts found **/
}



?>

<div class="featured-posts-grid posts-block-5 <?php echo $unique_id; //so user can style instance ?>">
    <div class="fw-row">

        <?php
        if($featured_placement=="left")
        {
        ?>

            <!-- featured column -->
            <div class="fw-col-sm-6 no-bottom featured-cell focus">
                <div class="component-element ">
                    <?php echo str_replace("h5", "h3", $components_array[0]); ?>
                </div>
            </div>
            <!-- end featured row -->

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[1]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell  ">
                        <div class="component-element ">
                            <?php echo $components_array[2]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[3]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell last-mobile ">
                        <div class="component-element ">
                            <?php echo $components_array[4]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

        <?php
        }
        else if($featured_placement=="center")
        {
        ?>

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[0]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell  ">
                        <div class="component-element ">
                            <?php echo $components_array[1]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

            <!-- featured column -->
            <div class="fw-col-sm-6 no-bottom featured-cell focus">
                <div class="component-element ">
                    <?php echo str_replace("h5", "h3", $components_array[2]); ?>
                </div>
            </div>
            <!-- end featured row -->

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[3]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell last-mobile ">
                        <div class="component-element ">
                            <?php echo $components_array[4]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

        <?php
        }

        else if($featured_placement=="right")
        {
        ?>

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[0]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell  ">
                        <div class="component-element ">
                            <?php echo $components_array[1]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

            <!-- normal column -->
            <div class="fw-col-sm-3">
                <div class="fw-row">
                    <div class="fw-col-sm-12 featured-cell ">
                        <div class="component-element ">
                            <?php echo $components_array[2]; ?>
                        </div>
                    </div>
                    <div class="fw-col-sm-12 no-bottom featured-cell last-mobile ">
                        <div class="component-element ">
                            <?php echo $components_array[3]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end normal column -->

            <!-- featured column -->
            <div class="fw-col-sm-6 no-bottom featured-cell focus">
                <div class="component-element ">
                    <?php echo str_replace("h5", "h3", $components_array[4]); ?>
                </div>
            </div>
            <!-- end featured row -->

        <?php
        }
        ?>

    </div>
</div>
