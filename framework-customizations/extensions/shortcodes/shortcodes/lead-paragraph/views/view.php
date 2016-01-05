<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

?>
<?php echo '<span class="lead">'.do_shortcode( $atts['text'] ).'</span>'; ?>