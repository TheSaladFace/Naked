<?php

/**
 * Generates date+comments+author
 */
$item_string.='<div class="meta-date-comments-author small-italic general-meta featured-posts-grid-paragraph component-element">';
$item_string.='<span class="row-date small-italic">'.get_the_date() .'</span><span class="slash-divider">/</span>
               <span class="row-comments small-italic"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span><span class="slash-divider">/</span>
               <span class="row-author small-italic"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'By ', 'naked' ).get_the_author().'</a></span>';
$item_string.='</div>';

?>
