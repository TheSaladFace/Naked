<?php
/**
 * Generates image string
 * @requires $show_hover_effects, $hover_top, $hover_bottom, $image_size
 */

if ( has_post_thumbnail() )
{
    $item_string.='
    <div class="m-grid component-element image-holder">
        <a href="'.get_permalink().'">';
    	if($show_hover_effects=="No")
    	{
    		$item_string.=get_the_post_thumbnail(get_the_ID(),$image_size);
        }
    	else
    	{
    		$item_string.='
    		<div class="effect-1">';
    		    $item_string.=get_the_post_thumbnail(get_the_ID(),$image_size);
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
	    </a>
    </div>';
}

?>
