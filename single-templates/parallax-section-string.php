<?php
/**
 * Contains meta for single posts
 * @requires $background_color, $background_image, $background_position, $background_repeat, $background_size, $background_parallax_ratio, $header_image_height
 * $divider_type=$divider_uri **/

/** generate background strings **/
$background_color_string =''; $background_image_string = '';$background_position_string = ''; $background_repeat_string = ''; $background_size_string = ''; $style_string = '';
if (!empty($background_color)){ $background_color_string=' background-color:'.$background_color.';'; }
if (!empty($background_image)){ $background_image_string=' background-image:url('.$background_image.');'; }
if (!empty($background_position)){ $background_position_string=' background-position:'.$background_position.';'; }
if (!empty($background_repeat)){ $background_repeat_string=' background-repeat:'.$background_repeat.';'; }
if (!empty($background_size)){ $background_size_string=' background-size:'.$background_size.';'; }
if (!empty($header_image_height)){$header_image_height_string=' height:'.$header_image_height.'px;'; } else{ $header_image_height_string=' height:400px;';}

/** generate parallax string **/
$background_attachment_string=''; $section_parallax_string=''; $parallax_string='';
if (!empty($background_parallax_ratio))
{
    $parallax_str='data-stellar-background-ratio="'.$background_parallax_ratio.'"';
    $background_attachment_string= 'background-attachment: fixed;'; //set this to fixed for stellar
}
else
{
    $parallax_str='data-stellar-background-ratio="0"';
    $background_attachment_string= 'background-attachment: fixed;'; //set this to fixed for stellar
}
$style_string = 'style="'.$background_color_string.$background_image_string.$background_position_string.$background_repeat_string.$background_size_string.$background_attachment_string.$header_image_height_string.'"';
$parallax_class="";
if (!empty($background_parallax_ratio))
{
    $parallax_class .= ' parallax-bg';
}
if($header_fade_image_scroll==1)
{
    $parallax_class .= ' parallax-fade';
}

$parallax_string.='<section class="fw-main-row header-image '.$parallax_class.'" '.$style_string.$parallax_str.'><div class="parallax-header"></div></section>';


?>
