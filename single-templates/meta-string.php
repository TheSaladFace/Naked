<?php
/**
 * Contains meta for single posts
 * @requires $post_categories, $divider_uri, $components_elements, $category_tag_number,
 * $divider_type=$divider_uri **/

/** set variables to defaults for templates **/
$components_elements=$meta_components_elements;
$category_tag_number=$meta_category_tag_number;
$show_author_image=$meta_show_author_image;
$divider_type=$meta_divider_type;
$components_elements=$meta_components_elements;

if ($components_elements): foreach ($components_elements as $key=>$value)
{
	/** Runs through user selected drag and drop component elements from shortcode options **/
	/** Include templates rather than functions due to WordPress loop variable scope **/
	switch($value['opt_single_meta_rows'])
	{
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
		case 'Divider':
			include locate_template('post-component-elements/divider-string.php');
		break;
	}
}
endif;

?>
