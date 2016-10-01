<?php
/**
 * The template for displaying the page borders.
 *
 *
 * @package naked
 */
if(function_exists( 'fw_get_db_customizer_option' ))
{

	/*header options*/
	$site_borders_color=fw_get_db_customizer_option('opt_site_borders_color');
	$site_borders_size=fw_get_db_customizer_option('opt_site_borders_size');

}
else
{
	$site_borders_color="#111";
	$site_borders_size=20;
}



if($site_borders_size>0)
{
	$css_string='style="width:'.$site_borders_size.'px; background-color:'.$site_borders_color.';"';
	echo'
	<div class="top-border" style="height:'.$site_borders_size.'px; width:100%; background-color:'.$site_borders_color.';"></div>
	<div class="left-border" style="width:'.$site_borders_size.'px; height:100%; background-color:'.$site_borders_color.';"></div>
	<div class="bottom-border" style="height:'.$site_borders_size.'px; width:100%; background-color:'.$site_borders_color.';"></div>
	<div class="right-border" style="width:'.$site_borders_size.'px; height:100%; background-color:'.$site_borders_color.';"></div>';
}


?>
