<?php
/**
 * Contains meta for single posts
 */

/** Check for Unyson plugin **/
if(defined('FW'))
{

	$post_categories=wp_get_post_categories(get_the_ID());
	$post_categories=array_values($post_categories);
	$post_categories=thshpr_get_category_ids_string($post_categories);

	$divider_uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/divider');
	$components_elements=fw_get_db_post_option(get_the_ID(),'opt_posts_block_functionality');
	$category_tag_number=fw_get_db_post_option(get_the_ID(),'opt_posts_block_number_categories');
	$divider_type=$divider_uri.'/static/img/'.fw_get_db_post_option(get_the_ID(),'opt_divider_type');

	$item_string=""; //the basic string to build up the meta html
	if ($components_elements): foreach ($components_elements as $key=>$value)
	{
		/** Runs through user selected drag and drop component elements from shortcode options **/
		/** Include templates rather than functions due to WordPress loop variable scope **/
		switch($value['opt_header_featuredposts_rows'])
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

	echo $item_string;
}

else
{
	
}
