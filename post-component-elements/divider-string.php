<?php

/**
 * Generates date+comments+author
 * @requires $divider_uri, $divider_type
 */

$style_string='background-image: url('.$divider_type.'.png); height:8px;';
$item_string.='

<div class="divider-container">
    <div class="divider-border" style='.$style_string.'></div>
</div>';

?>