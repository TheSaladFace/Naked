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

add_action('widgets_init', 'thshpr_ad_load_widgets');

function thshpr_ad_load_widgets()
{
  register_widget('thshpr_ad_Widget');
}

class thshpr_ad_Widget extends WP_Widget {

  function thshpr_ad_Widget()
  {
  	  $widget_ops = array('classname' => 'widget_advies', 'description' => __( "Displays Adverts", 'thshpr') );
      parent::__construct( 'thshpr_ad', __('Naked Ad Widget', 'thshpr'), $widget_ops );
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
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>

    <ul class="banners clearfix unstyled advie-ul">
      <?php
      $ads = array(1, 2, 3, 4);
      foreach($ads as $ad_count):
        if($instance['thshpr_ad_img_'.$ad_count] && $instance['thshpr_ad_link_'.$ad_count]):
      ?>
      <li class="advie">
       <a href="<?php echo $instance['thshpr_ad_link_'.$ad_count]; ?>"><img src="<?php echo $instance['thshpr_ad_img_'.$ad_count]; ?>" alt="" class="banners_img"/></a>
      </li>
      <?php endif; endforeach; ?>
    </ul>
    <?php echo $after_widget;
  }

  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
	$instance['title']      = strip_tags( $new_instance['title'] );
    $instance['thshpr_ad_img_1'] = $new_instance['thshpr_ad_img_1'];
    $instance['thshpr_ad_link_1'] = $new_instance['thshpr_ad_link_1'];
    $instance['thshpr_ad_img_2'] = $new_instance['thshpr_ad_img_2'];
    $instance['thshpr_ad_link_2'] = $new_instance['thshpr_ad_link_2'];
    $instance['thshpr_ad_img_3'] = $new_instance['thshpr_ad_img_3'];
    $instance['thshpr_ad_link_3'] = $new_instance['thshpr_ad_link_3'];
    $instance['thshpr_ad_img_4'] = $new_instance['thshpr_ad_img_4'];
    $instance['thshpr_ad_link_4'] = $new_instance['thshpr_ad_link_4'];


    return $instance;
  }

  function flush_widget_cache() {
		wp_cache_delete('thshpr_ad', 'widget');
}

  function form($instance)
  {
    /* Set up some default widget settings. */
    $defaults = array( 'title' => __('Advertisement Widget', 'thshpr'), 'thshpr_ad_img_1' => '', 'thshpr_ad_link_1' => '', 'thshpr_ad_img_2' => '', 'thshpr_ad_link_2' => '', 'thshpr_ad_img_3' => '', 'thshpr_ad_link_3' => '', 'thshpr_ad_img_4' => '', 'thshpr_ad_link_4' => '' );
    $instance = wp_parse_args( (array) $instance, $defaults ); ?>
	<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thshpr'); ?></label>
<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
    <p><strong>Ad 1</strong></p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_img_1'); ?>">Image Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_img_1'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_img_1'); ?>" value="<?php echo $instance['thshpr_ad_img_1']; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_link_1'); ?>">Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_link_1'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_link_1'); ?>" value="<?php echo $instance['thshpr_ad_link_1']; ?>" />
    </p>
    <p><strong>Ad 2</strong></p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_img_2'); ?>">Image Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_img_2'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_img_2'); ?>" value="<?php echo $instance['thshpr_ad_img_2']; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_link_2'); ?>">Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_link_2'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_link_2'); ?>" value="<?php echo $instance['thshpr_ad_link_2']; ?>" />
    </p>
    <p><strong>Ad 3</strong></p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_img_3'); ?>">Image Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_img_3'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_img_3'); ?>" value="<?php echo $instance['thshpr_ad_img_3']; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_link_3'); ?>">Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_link_3'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_link_3'); ?>" value="<?php echo $instance['thshpr_ad_link_3']; ?>" />
    </p>
    <p><strong>Ad 4</strong></p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_img_4'); ?>">Image Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_img_4'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_img_4'); ?>" value="<?php echo $instance['thshpr_ad_img_4']; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('thshpr_ad_link_4'); ?>">Ad Link:</label>
      <input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thshpr_ad_link_4'); ?>" name="<?php echo $this->get_field_name('thshpr_ad_link_4'); ?>" value="<?php echo $instance['thshpr_ad_link_4']; ?>" />
    </p>

  <?php
  }
}
?>
