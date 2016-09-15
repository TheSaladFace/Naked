<?php

/**
 * Generates date+author
 */

$item_string.='<div class="meta-date-author general-meta featured-posts-grid-paragraph component-element small-italic">';
$item_string.='<span class="row-date small-italic">'.get_the_date() .'</span><span class="slash-divider">/</span>
               <span class="row-author small-italic"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.__( 'By ', 'naked' ).get_the_author().'</a></span>';
$item_string.='</div>';

?>
