<?php
/**
 * Generates excerpt
 * @requires $cell_class - type of cell, focus = large
 */

if($cell_class=="focus")
{
     $item_string.='<div class="meta-excerpt large-excerpt component-element"><a href="'.get_permalink().'">'.thshpr_stripped_excerpt($large_excerpt_length).'</a></div>';
}
else
{
     $item_string.='<div class="meta-excerpt small-excerpt component-element"><a href="'.get_permalink().'" >'.thshpr_stripped_excerpt($excerpt_length).'</a></div>';
}

?>
