<?php
/**
 * Generates image string
 * @requires $show_hover_effects, $hover_top, $hover_bottom, $width, $large_height, $small_height
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
                    if($cell_class=="focus")
                    {
                        $image_string=thshpr_generate_image($width,$large_height,get_the_ID());
                        $item_string.=$image_string;
                    }
                    else
                    {
                        $image_string=thshpr_generate_image($width,$small_height,get_the_ID());
                        $item_string.=$image_string;
                    }
                }
                else
                {
                    $item_string.='
                    <div class="effect-1">';
                        if($cell_class=="focus")
                        {
                            $image_string=thshpr_generate_image($width,$large_height,get_the_ID());
                            $item_string.=$image_string;
                        }
                        else
                        {
                            $image_string=thshpr_generate_image($width,$small_height,get_the_ID());
                            $item_string.=$image_string;
                        }
                        $item_string.='

                        <div class="item-1">
                            <p><span class="centered">'.$hover_top.'</span></p>
                        </div>
                        <div class="item-2">
                            <p><span class="centered">'.$hover_bottom.'</span></p>
                        </div>
                    </div>';

                }
                $item_string.='

            </div>
        </a>
    </div>';
 }

?>
