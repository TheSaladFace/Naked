<?php
/**
* Description: Modified version of 'Lightweight Social Icons'
* Unecessary options stripped, simplified. 
* Simply outputs iconfonts per user specification.
* styles are handled from the theme stylesheet.
* Iconfonts are drawn from the themes iconfonts
* Author: Naked Themes
* URL: http://meshaper.com
* Date 11/02/2015
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* @package naked
*
* Original author:
* Plugin Name: Lightweight Social Icons
* Plugin URI: http://generatepress.com/lightweight-social-icons
* Description: Add simple icon font social media buttons. Choose the order, colors, size and more for 30 different icons!
* Version: 0.2
* Author: Thomas Usborne
* Author URI: http://edge22.com
*
**/


class naked_social_Widget extends WP_Widget {

	/**
	 * Register the widget
	 * @since 0.1
	 */
	function __construct() {
		parent::__construct(
			'naked_social_Widget', // Base ID
			__('(Theme) Social Icons', 'naked'), // Name
			array(
				'description' => __( 'Add social icons to your website.', 'naked' ), 
			)
		);
	}

	/**
	 * Front-end display of widget.
	 * @since 0.1
	 */
	public function widget( $args, $instance ) {
		
		$this->scripts['naked_social_scripts'] = true;
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$options = naked_social_icons();
		$defaults = naked_social_option_defaults();
		$unique_id = $args['widget_id'];
		$output = '';
		
		echo $args['before_widget'];
		
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		$count = 0;
		foreach ( $options as $option ) {
		
			$input = 'input' . $count++;
			$select = 'select' . $count++;
		
			$id = (!empty( $instance[$option['id']] ) ) ? $instance[$option['id']] : '';
			$name = (!empty( $instance[$select] ) ) ? $instance[$select] : '';
			$value = (!empty( $instance[$input] ) ) ? $instance[$input] : '';

			if ( !empty( $value ) && !empty( $name ) ) :
				
				if ( is_email( $value ) ) :
					$the_value = 'mailto:' . $value;
				elseif ( 'phone' == $option['id'] ) :
					$the_value = 'tel:' . $value;
				elseif ( 'skype' == $option['id'] ) :
					$the_value = 'skype:' . $value;
				else:
					$the_value = esc_url( $value );
				endif;

				$output .= sprintf( 
					'<li><a rel="nofollow" title="%1$s" href="%2$s" target="_blank"><i class="icon-%3$s" style="font-size:%4$spx;"></i></a></li>',
					$options[$name]['name'],
					$the_value,
					$name,
					$instance['font-size'] 
				);

			endif;
		}
		if ( $output ) :
			printf( 
				'<ul class="social-icon" style="margin-left:%3$spx;">%2$s</ul>', 
				$unique_id,
				$output,
				$instance['margin-left'] 
			);
		endif;
			
		echo $args['after_widget'];
	}
	

	/**
	 * Build the actual widget in the Dashboard
	 * @since 0.1
	 */
	public function form( $instance ) {
	
		$options = naked_social_icons();
		
		$defaults = naked_social_option_defaults();
	
		if ( isset( $instance[ 'title' ] ) && '' !== $instance[ 'title' ] ) {
			$title = $instance[ 'title' ];
		} else {
			$title = '';
		}
		
		
		
		$c = 0;
		foreach ( $options as $option ) {
			$defaults['input' . $c++] = '';
			$defaults['select' . $c++] = '';
		}
			
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' , 'naked' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'font-size' ); ?>"><?php _e( 'font-size' , 'naked' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'font-size' ); ?>" name="<?php echo $this->get_field_name( 'font-size' ); ?>" type="text" value="<?php echo esc_attr( $instance['font-size'] ); ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'margin-left' ); ?>"><?php _e( 'margin-left, use negative value if icon is large' , 'naked' ); ?></label> 
		<input id="<?php echo $this->get_field_id( 'margin-left' ); ?>" name="<?php echo $this->get_field_name( 'margin-left' ); ?>" type="text" value="<?php echo esc_attr( $instance['margin-left'] ); ?>">
		</p>
		
		<div class="social-icon-fields">
		<?php 
		$count = 0;
		foreach ( $options as $option ) {
			
			$input = 'input' . $count++;
			$select = 'select' . $count++;
			?>
			<div class="naked_social-container">
				<select class="left choose-icon" name="<?php echo $this->get_field_name( $select );?>" id="<?php echo $this->get_field_id( $select );?>">
					<option value=""></option>
					<?php foreach ( $options as $option ) {  ?>
						<option value="<?php echo $option['id']; ?>" <?php selected( $instance[$select], $option['id'] ); ?>><?php echo $option['name']; ?></option>
					<?php } ?>
				</select>
				
				<input class="right social-item" id="<?php echo $this->get_field_id( $input ); ?>" name="<?php echo $this->get_field_name( $input ); ?>" type="text" value="<?php echo esc_attr( $instance[$input] ); ?>">
			</div>
		<?php
		}
		?>
		</div>
		<?php
	}

	/**
	 * Save and sanitize values
	 * @since 0.1
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$options = naked_social_icons();
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['font-size'] = strip_tags( $new_instance['font-size'] );
		$instance['margin-left'] = strip_tags( $new_instance['margin-left'] );
		$count = 0;
		foreach ( $options as $option ) {

			$input = 'input' . $count++;
			$select = 'select' . $count++;
			
			$instance[$select] = strip_tags( $new_instance[$select] );

			// If Skype is set, strip tags
			if ( 'skype' == $new_instance[$select] ) :
				$instance[$input] = strip_tags( $new_instance[$input] );
			
			// If Phone is set, strip tags
			elseif ( 'phone' == $new_instance[$select] ) :
				$instance[$input] = strip_tags( $new_instance[$input] );
				
			// If Email is set, sanitize the address
			elseif ( 'email' == $new_instance[$select] ) :
				$instance[$input] = sanitize_email( $new_instance[$input] );
				
			// For everything else, sanitize the URL
			else :
				$instance[$input] = esc_url( $new_instance[$input] );
			endif;

		}

		return $instance;
	}
}

/**
 * Register the widget
 * @since 0.1
 */
function naked_social_register_widget() {
    register_widget( 'naked_social_Widget' );
}
add_action( 'widgets_init', 'naked_social_register_widget' );

/**
 * Set the widget option defaults
 * @since 0.1
 */
function naked_social_option_defaults()
{
	$defaults = array(
		'title' => '',
		'font-size' => '19',
		'margin-left' => '0'
	);
	
	return apply_filters( 'naked_social_option_defaults', $defaults );
}

/**
 * Set the default widget icons
 * @since 0.1
 */
function naked_social_icons() {
	$options = array (
		'facebook' => array(
			'id' => 'facebook',
			'name' => __( 'Facebook', 'naked' )
		),
		'twitter' => array(
			'id' => 'twitter',
			'name' => __( 'Twitter', 'naked' )
		),
		'gplus' => array(
			'id' => 'gplus',
			'name' => __( 'Google+', 'naked' )
		),
		'instagram' => array(
			'id' => 'instagram',
			'name' => __( 'Instagram', 'naked' )
		),
		'linkedin' => array(
			'id' => 'linkedin',
			'name' => __( 'LinkedIn', 'naked' )
		),
		'pinterest' => array(
			'id' => 'pinterest',
			'name' => __( 'Pinterest', 'naked' )
		),
		'flickr' => array(
			'id' => 'flickr',
			'name' => __( 'Flickr', 'naked' )
		),
		'email' => array(
			'id' => 'email',
			'name' => __( 'Email', 'naked' )
		),
		'rss' => array(
			'id' => 'rss',
			'name' => __( 'RSS', 'naked' )
		),
		'stumbleupon' => array(
			'id' => 'stumbleupon',
			'name' => __( 'Stumbleupon', 'naked' )
		),
		'tumblr' => array(
			'id' => 'tumblr',
			'name' => __( 'Tumblr', 'naked' )
		),
		'vimeo' => array(
			'id' => 'vimeo',
			'name' => __( 'Vimeo', 'naked' )
		),
		'youtube' => array(
			'id' => 'youtube',
			'name' => __( 'YouTube', 'naked' )
		),
		'github' => array(
			'id' => 'github',
			'name' => __( 'Github', 'naked' )
		),
		'soundcloud' => array(
			'id' => 'soundcloud',
			'name' => __( 'Soundcloud', 'naked' )
		),
		'deviantart' => array(
			'id' => 'deviantart',
			'name' => __( 'DeviantArt', 'naked' )
		),
		'phone' => array(
			'id' => 'phone',
			'name' => __( 'Phone', 'naked' )
		),
		'skype' => array(
			'id' => 'skype',
			'name' => __( 'Skype', 'naked' )
		),
		'dribbble' => array(
			'id' => 'dribbble',
			'name' => __( 'Dribbble', 'naked' )
		),
		'foursquare' => array(
			'id' => 'foursquare',
			'name' => __( 'Foursquare', 'naked' )
		),
		'reddit' => array(
			'id' => 'reddit',
			'name' => __( 'Reddit', 'naked' )
		),
		'spotify' => array(
			'id' => 'spotify',
			'name' => __( 'Spotify', 'naked' )
		),
		'digg' => array(
			'id' => 'digg',
			'name' => __( 'Digg', 'naked' )
		),
		'vine' => array(
			'id' => 'vine',
			'name' => __( 'Vine', 'naked' )
		),
		'codepen' => array(
			'id' => 'codepen',
			'name' => __( 'Codepen', 'naked' )
		),
		'delicious' => array(
			'id' => 'delicious',
			'name' => __( 'Delicious', 'naked' )
		),
		'jsfiddle' => array(
			'id' => 'jsfiddle',
			'name' => __( 'JSFiddle', 'naked' )
		),
		'stackoverflow' => array(
			'id' => 'stackoverflow',
			'name' => __( 'Stack Overflow', 'naked' )
		),
		'wordpress' => array(
			'id' => 'wordpress',
			'name' => __( 'WordPress', 'naked' )
		),
		'dropbox' => array(
			'id' => 'dropbox',
			'name' => __( 'Dropbox', 'naked' )
		)
	);
		
	return apply_filters( 'naked_social_icons_defaults', $options );
}