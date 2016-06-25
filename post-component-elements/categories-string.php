<?php
/**
 * Generates category tag list
 * @requires $category_tag_number - number of category tags to be shown
 * @requires $post_categories - array of category id's included
 */

$categories = get_the_category();
$separator = ' ';
$output = '';

if($categories)
{
    $output.='<div class="meta-categories tags featured-posts-grid-paragraph component-element">';
    $n=0;
    foreach($categories as $category)
    {
        if($category->cat_ID!=$post_categories&&$n<=$category_tag_number) //doesn't display the current category and less than user defined max displayed
        {
            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
        }
        $n++;
    }
    $output.='</div>';
    $item_string.=trim($output, $separator);
}

?>
