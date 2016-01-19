<?php
/**
 * Generates date + comments
 */

$item_string.='<div class="meta-date-comments general-meta featured-posts-grid-paragraph component-element">';
$item_string.='<span class="row-date">'.get_the_date() .'</span><span class="slash-divider">/</span>
               <span class="row-comments"><a href="'.get_comments_link().'"><i class="fa fa-comments">'.get_comments_number().'</i></a></span>';
$item_string.='</div>';

?>
