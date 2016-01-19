<?php

/**
 * Generates date+comments+author
 */

$item_string.='<div class="meta-date-comments-author general-meta featured-posts-grid-paragraph component-element">';
$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
               <span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
               <span class="row-author"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'by ', 'naked' ).get_the_author().'</a></span>';
$item_string.='</div>';

?>
