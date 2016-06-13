<?php
/**
 * Modifies the section shortcode
 */

/** Dont run without Unyson plugin **/

if (!defined('FW')) die('Forbidden');

$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/section');

$bg_color = '';
if ( ! empty( $atts['opt_background_color'] ) ) {
	$bg_color = 'background-color:' . $atts['opt_background_color'] . ';';
}

$bg_image = '';
if ( ! empty( $atts['opt_background_image'] ) && ! empty( $atts['opt_background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . $atts['opt_background_image']['data']['icon'] . ');';
}

$bg_position = '';
if ( ! empty( $atts['opt_background_position'] )) {
	$bg_position = 'background-position:' . $atts['opt_background_position'] .';';
}

$bg_repeat = '';
if ( ! empty( $atts['opt_background_repeat'] )) {
	$bg_repeat = 'background-repeat:' . $atts['opt_background_repeat'] .';';
}

$bg_size = '';
if ( ! empty( $atts['opt_background_size'] )) {
	$bg_size = 'background-size:' . $atts['opt_background_size'] .';';
}

$padding_top ='';
if ( ! empty( $atts['padding_top'] ))
{
	if($atts['opt_padding_top']=="Yes")
	{
		$padding_top = ' padding-top';
	}
}

$padding_bottom ='';
if ( ! empty( $atts['padding_bottom'] ))
{
	if($atts['opt_padding_bottom']=="Yes")
	{
		$padding_bottom = ' padding-bottom';
	}
}

$margin_top ='';
if ( ! empty( $atts['opt_margin_top'] ))
{
	if($atts['opt_margin_top']=="Yes")
	{
		$margin_top = ' margin-top';
	}
}

$margin_bottom ='';
if ( ! empty( $atts['opt_margin_bottom'] ))
{
	if($atts['opt_margin_bottom']=="Yes")
	{
		$margin_bottom = ' margin-bottom';
	}
}

$bg_attachment='';
$section_parallax_string='';
if ( ! empty( $atts['opt_background_parallax_ratio'] ) ) {
	wp_enqueue_script('thshpr-stellar'); //will enqueue from the default theme location but will load from here if theme is changed
	wp_enqueue_script('thshpr-stellar-init');
	$section_parallax_string='data-stellar-background-ratio="'.$atts['opt_background_parallax_ratio'].'"';
	$bg_attachment= 'background-attachment: fixed;'; //set this to fixed for stellar
}

$bg_video_data_attr    = '';
$section_extra_classes = '';
if ( ! empty( $atts['opt_video'] ) ) {
	$filetype           = wp_check_filetype( $atts['opt_video'] );
	$filetypes          = array( 'mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster' );
	$filetype           = array_key_exists( (string) $filetype['ext'], $filetypes ) ? $filetypes[ $filetype['ext'] ] : 'video';
	$bg_video_data_attr = 'data-wallpaper-options="' . fw_htmlspecialchars( json_encode( array( 'source' => array( $filetype => $atts['opt_video'] ) ) ) ) . '"';
	$section_extra_classes .= ' background-video';
}

if ( ! empty( $atts['opt_background_parallax_ratio'] ) ) {
	$section_extra_classes .= ' parallax-bg';
}

$section_style   = ( $bg_color || $bg_image || $bg_position || $bg_repeat || $bg_size || $bg_attachment) ? 'style="' . esc_attr($bg_color . $bg_image . $bg_position . $bg_repeat . $bg_size . $bg_attachment) . '"' : '';
$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'fw-container-fluid' : 'fw-container';
$container_class.=$padding_top.$padding_bottom.$margin_top.$margin_bottom;
?>
<section class="fw-main-row <?php echo esc_attr($section_extra_classes) ?>" <?php echo $section_style; ?> <?php echo $bg_video_data_attr; ?> <?php echo $section_parallax_string; ?>>
	<div class="<?php echo esc_attr($container_class); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>
</section>
