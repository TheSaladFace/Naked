<?php
/**
 * Generates HTML output for the 5 Posts Featured Shortcode
 */

/** Dont run without Unyson plugin **/
if (!defined('FW')) die('Forbidden');

/** Paths **/
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/5-posts-featured');
$shortcodes_shared_uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes'); //the place for global shortcode templates + css
$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');

/** Style and JS Includes **/
wp_enqueue_style('5-posts-featured', $uri . '/static/css/style.css',null, null, 'screen');
wp_enqueue_style('shared-shortcode-styles', $shortcodes_shared_uri . '/static/css/shared-styles.css',null, null,'screen');

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
$max_posts=5;
$divider_type=$divider_uri.'/static/img/'.$atts['opt_divider_type'];

/** hover items **/
$hover_top=thshpr_get_image_hover_string($atts['opt_image_hover_item_1']);
$hover_bottom=thshpr_get_image_hover_string($atts['opt_image_hover_item_2']);

/** image ratios **/
$large_image_ratio=$atts['opt_large_image_ratio'];
$small_image_ratio=$atts['opt_small_image_ratio'];
$width=700; //note, this is large even for small images because of responsive sizes.
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

<div class="featured-posts-grid posts-block-5 <?php echo $unique_id; //so user can style instance ?>">
	<div class="fw-row">

	<?php
	$args = array(
		'cat' => $post_categories,
		'posts_per_page' => $max_posts,
		'orderby' => $order_by);
	/** WP Query **/
	$the_query = new WP_Query( $args );
	$i=1;
	$item_string="";

		/** The Loop **/
		if ( $the_query->have_posts() )
		{
			while ( $the_query->have_posts() )
			{
				$the_query->the_post();

				/** Start loop divs, varies depending on the type of grid selected, see calculations above **/
				if($featured_placement=="left")
				{
					if($i==1){$cell_class="focus";}	else{$cell_class="";}
					if($i==1){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.' ">';}
					if($i==4){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell last-mobile '.$cell_class.'">';}
				}
				else if($featured_placement=="center")
				{
					if($i==3){$cell_class="focus";}	else{$cell_class="";}
					if($i==1){$item_string.='<div class="fw-col-sm-3 wow fadeIn"><div class="fw-row"><div class="fw-col-sm-12 featured-cell '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-sm-12 no-bottom featured-cell  '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-sm-6 no-bottom featured-cell '.$cell_class.'" >';}
					if($i==4){$item_string.='<div class="fw-col-sm-3" ><div class="fw-row"><div class="fw-col-sm-12 featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-sm-12 no-bottom featured-cell last-mobile '.$cell_class.'">';}
				}
				else if($featured_placement=="right")
				{
					if($i==5){$cell_class="focus";}	else{$cell_class="";}
					if($i==1){$item_string.='<div class="fw-col-md-6"><div class="fw-row"><div class="fw-col-md-6 featured-cell l '.$cell_class.'">';}
					else if($i==2){$item_string.='<div class="fw-col-md-6 featured-cell '.$cell_class.'">';}
					if($i==3){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==4){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell '.$cell_class.'">';}
					if($i==5){$item_string.='<div class="fw-col-md-6 no-bottom featured-cell last-mobile '.$cell_class.'">';}
				}

				$hidden_thumb="";

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
    					case 'Excerpt':
                            include locate_template('post-component-elements/excerpt-string.php');
    					break;
    					case 'Categories':
                            include locate_template('post-component-elements/categories-string.php');
    					break;
    					case 'Tags':
                            include locate_template('post-component-elements/tags-string.php');
                    	break;
    					case 'Read More':
    						include locate_template('post-component-elements/read-more-string.php');
    					break;
    					case 'Author':
    						include locate_template('post-component-elements/author-string.php');
    					break;
    					case 'Date':
    						include locate_template('post-component-elements/date-string.php');
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
					}
				}
			endif;

			/** End loop divs, varies depending on the type of grid selected **/
			if($featured_placement=="left")
			{
				if($i==1){ $item_string.='</div><div class="fw-col-md-6"><div class="fw-row">';}
				else if($i==2){$item_string.='</div>';}
				else if($i==3){$item_string.='</div></div><div class="fw-row">';}
				else if($i==4){$item_string.='</div>';}
				else if($i==5){$item_string.='</div></div></div>';}
			}
			else if($featured_placement=="center")
			{
				if($i==1){ $item_string.='</div>';}
				else if($i==2){$item_string.='</div></div></div>';}
				else if($i==3){$item_string.='</div>';}
				else if($i==4){$item_string.='</div>';}
				else if($i==5){$item_string.='</div></div></div>';}
			}
			else if($featured_placement=="right")
			{
				if($i==1){ $item_string.='</div>';}
				else if($i==2){$item_string.='</div></div><div class="fw-row">';}
				else if($i==3){$item_string.='</div>';}
				else if($i==4){$item_string.='</div></div></div>';}
				else if($i==5){$item_string.='</div>';}
			}
			/** End end loop divs **/
			$i++;
		}
		echo $item_string;
	}
	else
	{
		/** No posts found **/
	}
	/** Restore original Post Data **/
	wp_reset_postdata();
	?>

	</div>
</div>
