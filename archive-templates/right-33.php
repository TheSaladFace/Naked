<?php
/**
 * Generates image right 1/3 blog layout
 * @requires $components_elements, $divider_type
 */

$item_string.='<div class="fw-row blog-row">';

if ( has_post_thumbnail()) //end thumbnail wrap
{
	$item_string.='<div class="fw-col-md-8 '.$vertical_align_columns_string.'"><div class="components-holder focus '.$vertical_align_columns_string.'"><div class="rw-holder">';
}
else //if no image, make the components the will width of container
{
	$item_string.='<div class="fw-col-md-12 focus">';
}
/** run compoents loop **/
if ($components_elements): foreach ($components_elements as $key=>$value)
{
	$cell_class="focus";
	switch($value['opt_header_featuredposts_rows'])
	{
		case 'Title':
			include locate_template('post-component-elements/title-string.php');
		break;
		case 'Subtitle':
			include locate_template('post-component-elements/subtitle-string.php');
		break;
		case 'Excerpt':
			include locate_template('post-component-elements/excerpt-string.php');
		break;
		case 'Featured Image':
			include locate_template('post-component-elements/featured-image-string.php');
		break;
		case 'Categories':
			include locate_template('post-component-elements/categories-string.php');
		break;
		case 'Tags':
			include locate_template('post-component-elements/tags-string.php');
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
		case 'Breadcrumbs':
			include locate_template('post-component-elements/breadcrumbs-string.php');
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
		case 'Read More':
			include locate_template('post-component-elements/read-more-string.php');
		break;
	}
}
endif;

if ( has_post_thumbnail() )
{
	$item_string.='</div></div></div>';
}
else
{
	$item_string.='</div>';
}

if ( has_post_thumbnail()) //wrap the small thumbnail - also using equal heights js plugin
{
	$item_string.='<div class="fw-col-md-4 '.$vertical_align_columns_string.'"><div class="components-holder '.$vertical_align_columns_string.'"><div class="rw-holder">';

	/** Image must come after here **/
	if ($components_elements): foreach ($components_elements as $key=>$value)
	{
		switch($value['opt_header_featuredposts_rows'])
		{
			case 'Thumbnail':
				$cell_class=""; /** forces the image template to use the small image **/
				$width=$small_width; /**force the width to large width **/
				include locate_template('post-component-elements/image-string.php');
			break;
		}
	}
	endif;

	$item_string.='</div></div></div>';
}

$item_string.='</div>';
