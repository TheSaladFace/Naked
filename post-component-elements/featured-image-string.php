<?php
/**
 * Generates $featured_image_link_to_full - popup
 * @requires $featured_image_show - number of category tags to be shown
 * @requires $width,$large_height
 */

if ( has_post_thumbnail() )
{
    $item_string.='
    <div class="featured-image-holder component-element">';

        if($featured_image_link_to_full) //requires unyson plugin / options, if not enabled, don't display meta
        {

            $path = thshpr_get_full_image(get_post_thumbnail_id(get_the_ID()));

            $item_string.='
            <div class="featured-image">
            <a href="'.$path.'" style="position: relative; display: inline-block;">
            ';

            $image_string=thshpr_generate_wp_image($width,$height,get_the_ID());
            $item_string.=$image_string;
            $item_string.='

            </a>
            </div>';

        }
        else
        {

            $item_string.='
            <div class=" '.$image_offset_class.' featured-image">';

            $image_string=thshpr_generate_image($width,$height,get_the_ID());
            $item_string.=$image_string;
            $item_string.='

            </div>';

        }
    $item_string.='
    </div>';
}
?>
