<?php
/**
 * Generates title
 * @requires $cell_class - type of cell, focus = large
 */

if(!isset($cell_class))
{
     $cell_class="";
}
if($cell_class=="focus")
{
     $item_string.='<div class="component-element meta-title"><h3 class="large-h3"><a href="'.get_permalink().'">'.get_the_title().'</a></h3></div>';
}
else
{
     $item_string.='<div class="component-element meta-title"><h4><a href="'.get_permalink().'">'.get_the_title().'</a></h4></div>';
}

?>
