<?php
/**
 * Generates title
 * @requires $cell_class - type of cell, focus = large
 */
$item_string.='<div class="component-element meta-title"><h1 class="archive-title">';

if(is_search())
{
    $item_string.=sprintf( __( 'Search Results for: %s', 'thshpr' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
}
else
{
    $item_string.=get_the_archive_title();
}

$item_string.='</h1></div>';

?>
