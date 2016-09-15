<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/lead-paragraph');
wp_enqueue_script('thshpr-slick', $uri . '/static/js/fancy-dropcap.js',array('jquery'),'',true );

$lead_text=$atts["opt_lead_text"];

$show_fancy_drop_cap=$atts["opt_show_fancy_drop_cap"];

if($show_fancy_drop_cap)
{
	$show_fancy_drop_cap_class="fancy-drop-cap";
}
else
{
	$show_fancy_drop_cap_class="";
}
?>
<?php echo'<p class="lead-text '.$show_fancy_drop_cap_class.'">'.$lead_text.'</p>'; ?>
