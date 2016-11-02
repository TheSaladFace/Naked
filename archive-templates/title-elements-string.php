<?php
/**
 * Contains meta for single posts
 * @requires $post_categories, $divider_uri, $components_elements, $category_tag_number,
 * $divider_type=$divider_uri **/

if ($components_elements): foreach ($components_elements as $key=>$value)
{
	/** Runs through user selected drag and drop component elements from shortcode options **/
	/** Include templates rather than functions due to WordPress loop variable scope **/

	switch($value['opt_archive_title_rows'])
	{
		case 'Title':
			include locate_template('archive-templates/title-string.php');
		break;
		case 'Description':
			include locate_template('archive-templates/description-string.php');
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
