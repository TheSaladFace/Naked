<?php
/**
 * Generates author info and link
 */

$item_string.='<div class="meta-author general-meta featured-posts-grid-paragraph component-element">';
$item_string.='<span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
$item_string.='</div>';

?>