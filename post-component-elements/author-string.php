<?php
/**
 * Generates author info and link
 */

if($show_author_image)
{
    $author_image_string='<div class="author-gravatar"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_avatar( get_the_author_meta( 'ID' ), 40 ).'</a></div>';
    $author_image_visible_class='author-thumbnail-visible';
}
else
{
    $author_image_string='';
    $author_image_visible_class='';
}
$author_link_string='<div class="author-link '.$author_image_visible_class.'"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'By ', 'thshpr' ).get_the_author().'</a></div>';
$item_string.='<div class="meta-author general-meta featured-posts-grid-paragraph component-element">'.$author_image_string.$author_link_string.'</div>';

?>
