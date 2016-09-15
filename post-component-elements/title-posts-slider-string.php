<?php
/**
 * Generates title
 * @requires $hidden_thumb - a small thumbnail string showing the next or prev post
 */

if(!isset($cell_class))
{
    $cell_class="";
}
if($cell_class=="focus")
{
    $item_string.='<div class="component-element meta-title"><h3 class="large-h3"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
}
else
{
    $item_string.='<div class="component-element meta-title"><h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5></div><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
}
?>
