<?php
/**
 * Contains meta for single posts
 * @requires $post_categories, $divider_uri, $components_elements, $category_tag_number,
 * $divider_type=$divider_uri **/

/** set variables to defaults for templates **/
$components_elements=$title_components_elements;
$category_tag_number=$title_category_tag_number;
$show_author_image=$title_show_author_image;
$divider_type=$title_divider_type;
$components_elements=$title_components_elements;

if ($components_elements): foreach ($components_elements as $key=>$value)
{
	/** Runs through user selected drag and drop component elements from shortcode options **/
	/** Include templates rather than functions due to WordPress loop variable scope **/
	switch($value['opt_single_title_rows'])
	{
		case 'Title':
			include locate_template('post-component-elements/title-string.php');
		break;
		case 'Subtitle':
			include locate_template('post-component-elements/subtitle-string.php');
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
		case 'Plain Text':
			include locate_template('post-component-elements/plain-text-string.php');
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


	}
}
endif;

?>
