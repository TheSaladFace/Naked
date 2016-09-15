<?php
/**
* Description:  Advert Widget
* Author: thshpr Themes
* URL: http://themegasms.com
* Date 26/03/2015
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* @package thshpr
**/

add_action('widgets_init', 'thshpr_social_icons_load_widgets');

function thshpr_social_icons_load_widgets()
{
  register_widget('thshpr_social_icons_Widget');
}

class thshpr_social_icons_Widget extends WP_Widget {

  function thshpr_social_icons_Widget()
  {
  	  $widget_ops = array('classname' => 'widget-social-icons', 'description' => __( "Displays Links to your Social Media", 'thshpr') );
      parent::__construct( 'thshpr_social_icons', __('Social Icons', 'thshpr'), $widget_ops );
      $this->alt_option_name = 'widget_advies';

  	  add_action( 'save_post', array(&$this, 'flush_widget_cache') );
  	  add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
  	  add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
  }

  function widget($args, $instance)
  {
  $title = apply_filters('widget_title', $instance['title'] );
    extract($args);

    echo $before_widget; ?>
	<?php
	if ( $title ) echo $before_title . $title . $after_title;

	if(function_exists( 'fw_get_db_customizer_option' ))
	{
		$social_twitter=fw_get_db_customizer_option('opt_social_twitter');
		$social_facebook=fw_get_db_customizer_option('opt_social_facebook');
		$social_googleplus=fw_get_db_customizer_option('opt_social_googleplus');
		$social_linkedin=fw_get_db_customizer_option('opt_social_linkedin');
		$social_youtube=fw_get_db_customizer_option('opt_social_youtube');
		$social_pinterest=fw_get_db_customizer_option('opt_social_pinterest');
		$social_instagram=fw_get_db_customizer_option('opt_social_instagram');
		$social_tumblr=fw_get_db_customizer_option('opt_social_tumblr');
		$social_vine=fw_get_db_customizer_option('opt_social_vine');
		$social_snapchat=fw_get_db_customizer_option('opt_social_snapchat');
		$social_reddit=fw_get_db_customizer_option('opt_social_reddit');
		$social_flickr=fw_get_db_customizer_option('opt_social_flickr');
		$social_email=fw_get_db_customizer_option('opt_social_email');
	}


	echo'
	<div class="social-icons-widget">
		<div class=" social-share-boxes share-boxes featured-posts-grid-paragraph social-hover">
			<div class="absolute-container">
				<i class=" background-accent header"></i><!--';
				if(isset($social_facebook))
				{
					echo'--><span class="social-box facebook"><a class="inner facebook-inner" href="'.urlencode($social_facebook).'"><i class="fa fa-facebook icon"></i></a></span><!--';
				}
				if(isset($social_twitter))
				{
					echo'--><span class="social-box facebook"><a class="inner twitter-inner" href="'.urlencode($social_twitter).'"><i class="fa fa-twitter icon"></i></a></span><!--';
				}
				if(isset($social_googleplus))
				{
					echo'--><span class="social-box googleplus"><a class="inner google-plus-inner" href="'.urlencode($social_googleplus).'"><i class="fa fa-google-plus icon"></i></a></span><!--';
				}
				if(isset($social_linkedin))
				{
					echo'--><span class="social-box linkedin"><a class="inner linked-in-inner" href="'.urlencode($social_linkedin).'"><i class="fa fa-linkedin icon"></i></a></span><!--';
				}
				if(isset($social_youtube))
				{
					echo'--><span class="social-box youtube"><a class="inner youtube-inner" href="'.urlencode($social_youtube).'"><i class="fa fa-youtube icon"></i></a></span><!--';
				}
				if(isset($social_instagram))
				{
					echo'--><span class="social-box instagram"><a class="inner instagram-inner" href="'.urlencode($social_instagram).'"><i class="fa fa-instagram icon"></i></a></span><!--';
				}
				if(isset($social_pinterest))
				{
					echo'--><span class="social-box pinterest"><a class="inner pinterest-inner" href="'.urlencode($social_pinterest).'"><i class="fa fa-pinterest icon"></i></a></span><!--';
				}
				if(isset($social_tumblr))
				{
					echo'--><span class="social-box tumblr"><a class="inner tumblr-inner" href="'.urlencode($social_tumblr).'"><i class="fa fa-tumblr icon"></i></a></span><!--';
				}
				if(isset($social_vine))
				{
					echo'--><span class="social-box vine"><a class="inner vine-inner" href="'.urlencode($social_vine).'"><i class="fa fa-vine icon"></i></a></span><!--';
				}
				if(isset($social_snapchat))
				{
					echo'--><span class="social-box snapchat"><a class="inner snapchat-inner" href="'.urlencode($social_snapchat).'"><i class="fa fa-snapchat icon"></i></a></span><!--';
				}
				if(isset($social_reddit))
				{
					echo'--><span class="social-box reddit"><a class="inner reddit-inner" href="'.urlencode($social_reddit).'"><i class="fa fa-reddit icon"></i></a></span><!--';
				}
				if(isset($social_flickr))
				{
					echo'--><span class="social-box flickr"><a class="inner flickr-inner" href="'.urlencode($social_flickr).'"><i class="fa fa-flickr icon"></i></a></span><!--';
				}
				if(isset($social_email))
				{
					echo'--><span class="social-box email"><a class="inner email-inner" href="'.urlencode($social_email).'"><i class="fa fa-at icon"></i></a></span>';
				}
				echo'
			</div>
		</div>
	</div>';
    echo $after_widget;
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
	$instance['title']      = strip_tags( $new_instance['title'] );
    return $instance;
  }

  function flush_widget_cache() {
		wp_cache_delete('thshpr_ad', 'widget');
}

  function form($instance)
  {
    /* Set up some default widget settings. */
    $defaults = array( 'title' => __('', 'thshpr'));
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>
	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thshpr'); ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
    <p><strong>This widget is populated from the Customize -> Social section</strong></p>


  <?php
  }
}
?>
