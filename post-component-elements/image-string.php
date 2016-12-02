<?php
/**
 * Generates image string
 * @requires $show_hover_effects, $hover_top, $hover_bottom, $width, $height
 * @optional $cell_class='focus'
 */

if ( has_post_thumbnail() )
{
    $item_string.='

    <div class="component-element">
        <a href="'.get_permalink().'" class="image-holder">
            <div class="grid">';
                if(!isset($cell_class))
                {
                    $cell_class="";
                }
                if($show_hover_effects=="No")
                {
                    $image_string=thshpr_generate_image($width,$height,get_the_ID());
                    $item_string.=$image_string;
                }
                else
                {
                    $item_string.='
                    <div class="effect-1">';
                        $image_string=thshpr_generate_image($width,$height,get_the_ID());
                        $item_string.=$image_string;
                        $item_string.='

                        <div class="item-1">
                            <div><span class="centered">'.$hover_top.'</span></div>
                        </div>
                        <div class="item-2">
                            <div><span class="centered">'.$hover_bottom.'</span></div>
                        </div>
                    </div>';

                }
                $item_string.='

            </div>
        </a>
    </div>';
 }

?>
