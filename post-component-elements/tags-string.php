<?php
/**
 * Generates tag list
 * @requires *$category_tag_number - number of category tags to be shown
 */

$posttags = get_the_tags();
$separator = ' ';
$output = '';
if ($posttags)
{
    $output.='<div class="meta-tags tags featured-posts-grid-paragraph component-element">';
    $n=0;
    foreach($posttags as $tag)
    {
        if($n<$category_tag_number)
        {
           $output .= '<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
        }
        $n++;
    }
    $output.='</div>';
    $item_string.=trim($output, $separator);
}

?>
