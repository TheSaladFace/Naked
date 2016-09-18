<?php
/**
* Description: Featured Posts Widget
* Author: thshpr Themes
* URL: http://themegasms.com
* Date 17/09/2016
* @package thshpr
**/

add_action( 'widgets_init', 'thshpr_featured_posts_widget' );

/**
* Register the widget
* @since 0.1
*/
function thshpr_featured_posts_widget() {
	register_widget( 'thshpr_featured_posts_Widget' );
}

class thshpr_featured_posts_widget extends WP_Widget {

	function thshpr_featured_posts_Widget() {
		$widget_ops = array('classname' => 'widget_featured_posts', 'description' => __( "Displays posts from a selected category", 'thshpr') );
		parent::__construct('featured_posts', __('Naked Featured Posts', 'thshpr'), $widget_ops);
		$this->alt_option_name = 'widget_featured_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	/**
	 * Front-end display of widget.
	 * @since 0.1
	 */
	function widget($args, $instance)
	{
		$post_categories=wp_get_post_categories(get_the_ID());
		$post_categories=array_values($post_categories);
		$post_categories=thshpr_get_category_ids_string($post_categories);

		if(function_exists( 'fw_get_db_customizer_option' ))
		{
			/**
			 * Variables from customizer
			 */
			$widget_component_elements= fw_get_db_customizer_option('opt_widget_functionality');
			$widget_category_tag_number=fw_get_db_customizer_option('opt_widget_number_categories');
			$widget_divider_type=fw_get_db_customizer_option('opt_widget_divider_type');
			$small_image_ratio=fw_get_db_customizer_option('opt_small_image_ratio');
			$width=390;
			$show_hover_effects=fw_get_db_customizer_option('opt_show_hover_effects');
			$small_image_ratio=fw_get_db_customizer_option('opt_small_image_ratio');
			$excerpt_length=fw_get_db_customizer_option('opt_widget_excerpt_length');

			/**
			 * Hover Items
			 */
			$opt_image_hover_item_top= fw_get_db_customizer_option('opt_image_hover_item_1');
			$small_height= thshpr_generate_aspect_height($small_image_ratio,$width);

			if($opt_image_hover_item_top['template']==0) //nothing
			{
			}
			else if($opt_image_hover_item_top['template']==1)//text
			{
				$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_text'];
			}
			else if($opt_image_hover_item_top['template']==2)//icon
			{
				$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
			}
			else if($opt_image_hover_item_top['template']==3)//image
			{
				$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_image']['url'].'">';
			}

			$opt_image_hover_item_bottom= fw_get_db_customizer_option('opt_image_hover_item_2');
			if($opt_image_hover_item_bottom['template']==0) //nothing
			{
			}
			else if($opt_image_hover_item_bottom['template']==1)//text
			{
				$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_text'];
			}
			else if($opt_image_hover_item_bottom['template']==2)//icon
			{
				$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
			}
			else if($opt_image_hover_item_bottom['template']==3)//image
			{
				$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_image']['url'].'">';
			}
		}
		else
		{
			/**
			 * Variables when unyson plugin not added
			 */
			$widget_component_elements= array("Image","Title","Categories");
			$widget_category_tag_number=3;
			$small_image_ratio=fw_get_db_customizer_option('opt_small_image_ratio');
			$width=390;
			$show_hover_effects=fw_get_db_customizer_option('opt_show_hover_effects');
			$small_image_ratio=0.5625;
			$excerpt_length=11;
			$show_hover_effects="No";
			$hover_top='+';
			$hover_bottom='N';
		}

		$cache = wp_cache_get('theme_widget_featured_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Featured Posts', 'thshpr') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;

		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish');
		/**
		 * Get category ID's
		 */
		$catids = array();

		foreach($instance['cat'] as $name) {

			$term=get_term_by( "name", $name, 'category');
			$catids[] = $term->term_id; //store the id of each slug in $catids
		}
		$post_category=implode(',', $catids);

		if(!empty($instance['cat']))
		{
			$query['cat'] = $post_category;
		}

		$the_query = new WP_Query($query);
		if ($the_query->have_posts()) :

		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;

		echo'<div class="featured-posts-wrap posts posts-widget">';
		echo'<ul class="thumb-list">';
		while ( $the_query->have_posts() )
		{
			echo '<li>';
				$the_query->the_post();
				$item_string=""; //set it up for concat
				$post_format = get_post_format();
				include(locate_template('widget-templates/components-string.php')); //generates title string from customzed options
				echo $item_string;
			echo '</li>';
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget;

		// Reset the global $the_post as this query will have roflstomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('theme_widget_featured_posts', $cache, 'widget');
	}

	/**
	 * Save and sanitize values
	 * @since 0.1
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');
		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	/**
	 * Build the actual widget in the Dashboard
	 * @since 0.1
	 */
	function form( $instance ) {

		// Defaults
		$defaults = array(
		'title' => 'Popular Posts',
		'number' => '5',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		$categories = get_categories('orderby=name&hide_empty=0'); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','thshpr'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories (shift / ctrl click for multiple cats):' , 'thshpr'); ?></label>
			<select name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_name('cat');?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->name;?>"<?php echo in_array($category->name, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
	<?php
	}
}
