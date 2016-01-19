<?php

if (!defined('FW')) die('Forbidden');

$categories = get_the_category();
//var_dump($categories);
$separator = ' ';
$output = '';
if($categories)
{
  $output.='<div class="meta-categories tags featured-posts-grid-paragraph component-element">';
  $n=0;
  foreach($categories as $category)
  {
    if($category->cat_ID!=$post_category&&$n<=$category_tag_number)
    {
      $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
    $n++;
  }
  $output.='</div>';
$item_string.=trim($output, $separator);
}
?>
