<?php

/**
 * Generates date+comments+author
 * @requires $divider_uri, $divider_type
 */

$images_folder=get_stylesheet_directory_uri().'/static/img/';
$style_string='background-image: url('.$images_folder.$divider_type.'.png); height:9px;';
$item_string.='

<div class="divider-container component-element">
    <div style="'.$style_string.'"></div>
</div>';

?>
