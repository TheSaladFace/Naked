<?php
/**
* Description: Popular Posts Widget
* Author: Naked Themes
* URL: http://meshaper.com
* Date 11/02/2015
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* @package naked
**/


add_action( 'widgets_init', 'naked_popular_posts_widget' );

/**
* Register the widget
* @since 0.1
*/
function naked_popular_posts_widget() {
	register_widget( 'naked_popular_posts_Widget' );
}

class naked_popular_posts_widget extends WP_Widget {

	function naked_popular_posts_Widget() {
		$widget_ops = array('classname' => 'widget_popular_posts', 'description' => __( "Displays posts from a selected category", 'naked') );
		$this->WP_Widget('popular_posts', __('(Theme) Popular Posts', 'naked'), $widget_ops);
		$this->alt_option_name = 'widget_popular_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	/**
	 * Front-end display of widget.
	 * @since 0.1
	 */
	function widget($args, $instance) {
		
		 if(function_exists( 'fw_get_db_settings_option' )) //check for options framework
		{
			$components= fw_get_db_settings_option('opt_widget_post_elements');
			$category_tag_number=fw_get_db_settings_option('opt_widget_post_category_number');
		
			//top hover item
			$opt_image_hover_item_top= fw_get_db_settings_option('opt_image_hover_item_1');
			if($opt_image_hover_item_top['template']==0) //nothing
			{
			}
			else if($opt_image_hover_item_top['template']==1)//text
			{
				$hover_top=$opt_image_hover_item_top['1']['opt_image_hover_item_1_text'];	
			}
			else if($opt_image_hover_item_top['template']==2)//icon
			{
				$hover_top='<i class="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'" data-value="'.$opt_image_hover_item_top['2']['opt_image_hover_item_1_icon'].'"></i>';
			}
			else if($opt_image_hover_item_top['template']==3)//image
			{
				$hover_top='<img src="'.$opt_image_hover_item_top['3']['opt_image_hover_item_1_image']['url'].'">';	
			}
			
			//bottom hover item
			$opt_image_hover_item_bottom= fw_get_db_settings_option('opt_image_hover_item_2');
			if($opt_image_hover_item_bottom['template']==0) //nothing
			{
			}
			else if($opt_image_hover_item_bottom['template']==1)//text
			{
				$hover_bottom=$opt_image_hover_item_bottom['1']['opt_image_hover_item_2_text'];	
			}
			else if($opt_image_hover_item_bottom['template']==2)//icon
			{
				$hover_bottom='<i class="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'" data-value="'.$opt_image_hover_item_bottom['2']['opt_image_hover_item_2_icon'].'"></i>';
			}
			else if($opt_image_hover_item_bottom['template']==3)//image
			{
				$hover_bottom='<img src="'.$opt_image_hover_item_bottom['3']['opt_image_hover_item_2_image']['url'].'">';	
			}
		
		}
		else
		{
			$components=array("Image","Title","Date");
			$category_tag_number=1;
			$hover_top='N';
			$hover_bottom='';
		}
		 $thumbnail_size='sidebar_image';
		 $small_thumbnail_size='small_sidebar_image';
		 
		$cache = wp_cache_get('widget_popular_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Mini Blog', 'naked') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		$query = array(
			'showposts' => $number, 
			'nopaging' => 0, 
			'post_status' => 'publish',
			'orderby'      => 'meta_value',  /* this will look at the meta_key you set below */
			'meta_key'     => 'naked_post_views_count',
		);
		if(!empty($instance['cat'])){
			$query['cat'] = implode(',', $instance['cat']);
			
		}
		 $post_category=get_cat_ID( implode(',', $instance['cat']) );
		 
		$the_query = new WP_Query($query);
		if ($the_query->have_posts()) :
		
		echo $before_widget; 
		if ( $title ) echo $before_title . $title . $after_title; 
		
		echo'<div class="popular-posts-wrap">';
		echo'<ul class="thumb-list">';
		while ( $the_query->have_posts() ) 
		{
			$the_query->the_post();
			$item_string=""; //set it up for concat
			$post_format = get_post_format();
			
			$hidden_thumb="";
			if ( has_post_thumbnail() ) //hidden thumbnail for use in prev next buttons
			{ 
				$hidden_thumb=get_the_post_thumbnail(get_the_ID(),'prevnext' );
			}
			if($post_format!='quote' && $post_format!='link' && $post_format!='aside' && $post_format!='status')
		    	{ 
				if ($components): foreach ($components as $key=>$value) 
				{
				 
				    switch($value) 
				    {
				 
					case 'Image': 
							if ( has_post_thumbnail() ) 
							{ 
								$item_string.='<div class="widget-paragraph">
													<a href="'.get_permalink().'">
														<div class="grid">											
															<div class="effect-1">'.get_the_post_thumbnail(get_the_ID(),$thumbnail_size ).'
																	
																<div class="item-1">
																	<p><span class="centered">'.$hover_top.'</span></p>
																</div>	
																<div class="item-2">
																	<p><span class="centered">'.$hover_bottom.'</span></p>
																</div>
																									
															</div>
														</div>
													</a>
												</div>';							
							}
							break;
							 
																
						case 'Title': 
								$item_string.='<a href="'.get_permalink().'"><p class="widget-paragraph widget-title">'.get_the_title().'<br/>&#8594;</p></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
							break;
							
							case 'Image Title': 
							if ( has_post_thumbnail() ) 
							{ 
								$item_string.='<div class="widget-paragraph image-title">
													<a href="'.get_permalink().'">
														<div class="grid small-widget-image">											
															<div class="effect-1">'.get_the_post_thumbnail(get_the_ID(),$small_thumbnail_size ).'
																	
																
																									
															</div>
														</div>
													</a>
													<a href="'.get_permalink().'"><p class="widget-paragraph widget-title">'.get_the_title().'</p></a>
													
												</div>';							
							}
							break;
							 
										 
							case 'Categories': 
								$categories = get_the_category();
								$separator = ' ';
								$output = '';
								if($categories)
								{
									$output.='<p class=" widget-paragraph widget-categories">';
									$n=0;
									foreach($categories as $category) 
									{
		
										if($category->cat_ID!=$post_category&&$n<$category_tag_number)
										{											
											$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
										}
										$n++;
									}
									$output.='</p>';
									$item_string.=trim($output, $separator);
								}
								break;
											
								case 'Tags': 
									$posttags = get_the_tags();
									$separator = ' ';
									$output = '';
									if ($posttags) 
									{
										$output.='<p class=" widget-paragraph widget-tags">';
										$n=0;
										  foreach($posttags as $tag) 
										  {
											  if($n<$category_tag_number)
											  {
											  $output .= '<a href="'.get_tag_link($tag->term_id).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
											  }
											  $n++;
										 }
										  $output.='</p>';
										  $item_string.=trim($output, $separator);
									}
								break;
									
								case 'Author': 
									$item_string.='<p class="widget-paragraph widget-author"><i class="icon-user-5 icon"></i>';
									$item_string.=__( 'Posted By: ', 'naked' ).'<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>';
									$item_string.='</p>';
									break;
											
								case 'Date': 
									$item_string.='<p class="featured-thumbnail-slider-date widget-paragraph widget-date"><i class="icon-calendar-inv icon"></i>';
									$item_string.=get_the_date(); 
									$item_string.='</p>';
								break;
							 
						    }
						 
						}
					endif;
							
				echo '  <li>'.$item_string.'</li>';
			}
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget; 
		
		// Reset the global $the_post as this query will have roflstomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_popular_posts', $cache, 'widget');
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
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','naked'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'naked'); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories:' , 'naked'); ?></label>
			<select name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_name('cat');?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->name;?>"<?php echo in_array($category->name, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}