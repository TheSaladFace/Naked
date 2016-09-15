<?php
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - --
//
// Title : thshprwidgets.php
// Author : ThemeShaper
// URL : http://www.theme-shaper.net
//
// Description : Initialises default sidebar panels and loads initial widgets
// Created : 19/08/10
//
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// TWITTER WIDGET
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
define("THEME_SLUG", "naked");

add_action( 'widgets_init', 'thshpr_twitter_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_twitter_widget() {
	register_widget( 'thshpr_twitter_Widget' );
}

// Widget class
class thshpr_twitter_widget extends WP_Widget {

function thshpr_twitter_Widget() {

	// Widget settings
	$widget_ops = array(
		'classname' => 'thshpr_twitter_widget',
		'description' => __('Latest Tweets Widget', 'thshpr')
	);

	// Create the widget
	$this->WP_Widget( 'thshpr_tweet_widget',  THEME_SLUG.' - '.__('Twitter Widget','thshpr'), $widget_ops);
	
}


 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//Display Twitter Widget
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
 function widget( $args, $instance ) {
	extract( $args );

	$title = apply_filters('widget_title', $instance['title'] );
	$username = $instance['username'];
	$postcount = $instance['postcount'];
	//$tweettext = $instance['tweettext'];
	echo $before_widget;

	if ( $title )
		echo $before_title . $title . $after_title;
	$GLOBALS['twitternum']+=1;
	//Dispaly Twitter feed
	echo
	"<div class='tweet' id='tweets_".$GLOBALS['twitternum']."'></div>
	<script type='text/javascript'>
	jQuery(document).ready(function() {
		jQuery('#tweets_".$GLOBALS['twitternum']."').tweetable({
			username: '".$username."',
			limit: ".$postcount.",                         
			time: true
		});
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
		// REMOVE DUPLICATE DATES FOR MULTIPLE TWITTER
		/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
		jQuery('ul.tweetList li').each(function ()
		{
			jQuery('small:not(:first)', this).remove();
		});
		});
	</script>
	";
	
	
	echo $after_widget;
	
}

 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Update Twitter Widget
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['username'] = strip_tags( $new_instance['username'] );
	$instance['postcount'] = strip_tags( $new_instance['postcount'] );
	$instance['twittertext'] = strip_tags( $new_instance['twittertext'] );

	return $instance;
}

 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Twitter Widget Settings 
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
function form( $instance ) {

	// Defaults
	$defaults = array(
	'title' => 'Latest Tweets',
	'username' => $GLOBALS['twitter'],
	'postcount' => '3',
	'twittertext' => 'Follow  us on Twitter',
	);
	
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thshpr') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username', 'thshpr') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', 'thshpr') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
	</p>
	
		
	<?php
	}
}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// FLICKR WIDGET
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

add_action( 'widgets_init', 'thshpr_flickr_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_flickr_widget() {
	register_widget( 'thshpr_flickr_Widget' );
}

class thshpr_flickr_widget extends WP_Widget {

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Widget Setup
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_flickr_Widget() {

	$widget_ops = array(
		'classname' => 'thshpr_flickr_widget',
		'description' => __('A widget that displays your Flickr images.', 'thshpr')
	);
	$this->WP_Widget( 'thshpr_flickr_widget',  THEME_SLUG.' - '.__('Flickr Widget', 'thshpr'), $widget_ops);
	
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Display Widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function widget( $args, $instance ) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title'] );
	$flickrID = $instance['flickrID'];
	$postcount = $instance['postcount'];
	$type = $instance['type'];
	$display = $instance['display'];

	echo $before_widget;

	if ( $title )
		echo $before_title . $title . $after_title;

	// Display Flickr Images
	 ?>
	
	<div id="flickr_badge_wrapper" class="clearfix">
		<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo $postcount ?>&amp;display=<?php echo $display ?>&amp;size=s&amp;layout=x&amp;source=<?php echo $type ?>&amp;<?php echo $type ?>=<?php echo $flickrID ?>"></script>
		
	</div>
	<?php
	echo $after_widget;
	
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Update Widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	// Strip to remove HTML
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['flickrID'] = strip_tags( $new_instance['flickrID'] );

	// No strip
	$instance['postcount'] = $new_instance['postcount'];
	$instance['type'] = $new_instance['type'];
	$instance['display'] = $new_instance['display'];

	return $instance;
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//	Flickr Widget Settings
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function form( $instance ) {

	// Defaults
	$defaults = array(
		'title' => 'My Flickr Images',
		'flickrID' => '',
		'postcount' => '8',
		'type' => 'user',
		'display' => 'latest',
	);

	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'thshpr') ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'flickrID' ); ?>"><?php _e('Flickr ID:', 'thshpr') ?> (<a href="http://idgettr.com/">idGettr</a>)</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'flickrID' ); ?>" name="<?php echo $this->get_field_name( 'flickrID' ); ?>" value="<?php echo $instance['flickrID']; ?>" />
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Photos:', 'thshpr') ?></label>
		<select id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" class="widefat">
			<option <?php if ( '4' == $instance['postcount'] ) echo 'selected="selected"'; ?>>4</option>
			<option <?php if ( '8' == $instance['postcount'] ) echo 'selected="selected"'; ?>>8</option>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type (user or group):', 'thshpr') ?></label>
		<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
			<option <?php if ( 'user' == $instance['type'] ) echo 'selected="selected"'; ?>>user</option>
			<option <?php if ( 'group' == $instance['type'] ) echo 'selected="selected"'; ?>>group</option>
		</select>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( 'display' ); ?>"><?php _e('Display (random or latest):', 'thshpr') ?></label>
		<select id="<?php echo $this->get_field_id( 'display' ); ?>" name="<?php echo $this->get_field_name( 'display' ); ?>" class="widefat">
			<option <?php if ( 'random' == $instance['display'] ) echo 'selected="selected"'; ?>>random</option>
			<option <?php if ( 'latest' == $instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
		</select>
	</p>
	<?php
	}
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
  // CONTACT INFO WIDGET
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

add_action( 'widgets_init', 'thshpr_contact_info_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_contact_info_widget() {
	register_widget( 'thshpr_contact_info_Widget' );
}

// Widget class
class thshpr_contact_info_widget extends WP_Widget {

	function thshpr_contact_info_Widget() {
		$widget_ops = array(
		'classname' => 'thshpr_contact_info', 
		'description' => __( 'Displays a list of contact info.', 'theshpr') 
		);
		
		// Create the widget
		$this->WP_Widget('thshpr_contact_info', THEME_SLUG.' - '.__('Contact Info Widget', 'theshpr'), $widget_ops);
		
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//Display Contact Info Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
		
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Us', 'thshpr') : $instance['title'], $instance, $this->id_base);
		
		$phone = $instance['phone'];
		$cellphone = $instance['cellphone'];
		$email= $instance['email'];
		$address = $instance['address'];
		$name = $instance['name'];
		
		if(!empty($city) && !empty($state)){
			$city = $city.',&nbsp;'.$state;
		}elseif(!empty($state)){
			$city = $state;
		}
		echo $before_widget;
		
		if ( $title)
			echo $before_title . $title . $after_title;
		
		
		//Display Contact Info
		?>
			<ul class="contact_info_wrap">
			<?php if(!empty($name)){?>					<li class="icon_text icon_id"><span class="cinfo-letter text-highlight left">N:</span><span class="left cinfo-details"><?php echo $name;?></span><span class="clear"></span></li><?php ;}?>
			<?php if(!empty($address)){?>				<li class="icon_text icon_home"><span class="cinfo-letter text-highlight left">A:</span><span class="left cinfo-details"><?php echo $address;?></span><span class="clear"></span></li><?php ;}?>
			<?php if(!empty($email)){?>					<li class="icon_text icon_email "><span class="cinfo-letter text-highlight left">E:</span><span class="left cinfo-details"><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></span><span class="clear"></span></li><?php ;}?>
			<?php if(!empty($phone)){?>					<li class="icon_text icon_phone"><span class="cinfo-letter text-highlight left">T:</span><span class="left cinfo-details"><?php echo $phone;?></span><span class="clear"></span></li><?php ;}?>
			<?php if(!empty($cellphone)){?>				<li class="icon_text icon_cellphone"><span class="cinfo-letter text-highlight left">M:</span><span class="left cinfo-details"><?php echo $cellphone;?></span><span class="clear"></span></li><?php ;}?>
			
			
			
			</ul>
		<?php
		echo $after_widget;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Contact Info Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['cellphone'] = strip_tags($new_instance['cellphone']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['name'] = strip_tags($new_instance['name']);
	
		return $instance;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Contact Info Widget Settings
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function form( $instance ) {
	
		// Defaults
		$defaults = array(
		'title' => 'Contact Info',
		'phone' => $GLOBALS['telephone'],
		'cellphone' => $GLOBALS['mobile'],
		'email' => $GLOBALS['email'],
		'address' => $GLOBALS['address'],
		'name' => $GLOBALS['name']
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

	
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
		$cellphone = isset($instance['cellphone']) ? esc_attr($instance['cellphone']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		$address = isset($instance['address']) ? esc_attr($instance['address']) : '';
		$name = isset($instance['name']) ? esc_attr($instance['name']) : '';
		?>
	
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></p>
			<p><label for="<?php echo $this->get_field_id('cellphone'); ?>"><?php _e('Cell phone:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('cellphone'); ?>" name="<?php echo $this->get_field_name('cellphone'); ?>" type="text" value="<?php echo $cellphone; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Address:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Name:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" /></p>
		
<?php
	}

}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
  // SOCIAL MEDIA WIDGET
  /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

add_action( 'widgets_init', 'thshpr_social_media_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_social_media_widget() {
	register_widget( 'thshpr_social_media_Widget' );
}

// Widget class
class thshpr_social_media_widget extends WP_Widget {

	function thshpr_social_media_Widget() {
		$widget_ops = array(
		'classname' => 'thshpr_social_media', 
		'description' => __( 'Displays a list of contact info.', 'theshpr') 
		);
		
		// Create the widget
		$this->WP_Widget('thshpr_social_media', THEME_SLUG.' - '.__('Social Media Widget', 'theshpr'), $widget_ops);
		
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//Display Contact Info Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
		
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('', 'thshpr') : $instance['title'], $instance, $this->id_base);
		
		
		echo $before_widget;
		
		if ( $title)
			echo $before_title . $title . $after_title;
		
		
		//Display Contact Info
		thshpr_social_media();
		echo $after_widget;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Contact Info Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		return $instance;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Contact Info Widget Settings
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function form( $instance ) {
	
		// Defaults
		$defaults = array(
		'title' => 'Follow Us'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 

	
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		
		?>
	
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'theshpr'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
		Please fill in the social media options tab in the theme options page
		</p>
		
		
<?php
	}

}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// RELATED POSTS WIDGET
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

//add_action( 'widgets_init', 'thshpr_related_posts_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_related_posts_widget() {
	register_widget( 'thshpr_related_posts_Widget' );
}

class thshpr_related_posts_widget extends WP_Widget {

	function thshpr_related_posts_Widget() {
		
		// Widget settings
		$widget_ops = array(
			'classname' => 'thshpr_related_posts', 
			'description' => __( "Displays the related posts on your site", 'thshpr') 
		);
		
		// Create the widget
		$this->WP_Widget('thshpr_related_posts', THEME_SLUG.' - '.__('Related Posts', 'thshpr'), $widget_ops);
		$this->alt_option_name = 'thshpr_related_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//Display Related Posts Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function widget($args, $instance) {

		$cache = wp_cache_get('theme_widget_related_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Related Posts', 'thshpr') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$extra = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';

		
		global $post;
		
		$tags = wp_get_post_tags($post->ID);
		$tagIDs = array();
		if ($tags) {
			$tagcount = count($tags);
			for ($i = 0; $i < $tagcount; $i++) {
				$tagIDs[$i] = $tags[$i]->term_id;
			}

			$query = array('tag__in' => $tagIDs,'post__not_in' => array($post->ID),'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
			if(!empty($instance['cat'])){
				$query['cat'] = implode(',', $instance['cat']);
			}
			$r = new WP_Query($query);
			if ($r->have_posts()) :		
			echo $before_widget; 
		if ( $title ) echo $before_title . $title . $after_title; 
		
		echo'<div class="popular_posts_wrap">';
		echo'<ul class="thumb-list">';
		while ($r->have_posts())
		{
			$lightbox="true";
			$r->the_post();
			echo 	'<li>';
			if(!$thumbnail)
			{
				if (has_post_thumbnail() )
				{
					$thumb = get_post_thumbnail_id(); 
					$thumbwidth=75;
					$thumbheight=75;
					$image = thshpr_resize( $thumb, '', $thumbwidth, $thumbheight, true );
					$im='<div class="thumb-rollover alignleft"><a href="'.get_permalink().'"><img src="'.$image['url'].'" width="'.$image['width'].'" height="'.$image['height'].'" /></a></div>';
					echo $im;
				}
				
			}
			echo 	'<a class="thumb-title cuf caps" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
			if($extra=='time')
			{
				echo'	<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_date().'</a>';
			}
			else
			{
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt=='')
				{
					$excerpt = get_the_content();
				}
				echo 	'<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.wp_html_excerpt($excerpt,$desc_length).'...</a>';
			}
			echo 	'<div class="clear"></div>';
			echo 	'</li>';
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget; 
			
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_query();

			endif;

			$cache[$args['widget_id']] = ob_get_flush();
			wp_cache_set('theme_widget_related_posts', $cache, 'widget');
		}
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Related Posts Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		// Strip to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
		$instance['cat'] = $new_instance['cat'];

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_related_entries']) )
			delete_option('widget_related_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_related_posts', 'widget');
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Related Post Widget Settings 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

	function form( $instance ) {
		
		// Defaults
		$defaults = array(
		'title' => 'Related Posts',
		'number' => '5',
		'desc_length' => '35',
		'disable_thumbnail' => 0,
		'display_extra_type' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

		$categories = get_categories('orderby=name&hide_empty=0'); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thshpr'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
		
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
			<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?', 'thshpr' ); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'thshpr' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'thshpr' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'thshpr' ); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories:' , 'thshpr'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 //POPULAR POSTS WIDGET
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

//add_action( 'widgets_init', 'thshpr_popular_posts_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_popular_posts_widget() {
	register_widget( 'thshpr_popular_posts_Widget' );
}

class thshpr_popular_posts_widget extends WP_Widget {

	function thshpr_popular_posts_Widget() {
		$widget_ops = array('classname' => 'widget_popular_posts', 'description' => __( "Displays the popular posts on your site", 'thshpr') );
		$this->WP_Widget('popular_posts',  THEME_SLUG.' - '.__('Popular Posts', 'thshpr'), $widget_ops);
		$this->alt_option_name = 'widget_popular_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//Display Popular Posts Widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function widget($args, $instance) {
		$cache = wp_cache_get('theme_widget_popular_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Posts', 'thshpr') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$extra = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';

		$query = array('showposts' => $number, 'nopaging' => 0, 'orderby'=> 'comment_count', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
		if(!empty($instance['cat'])){
			$query['cat'] = implode(',', $instance['cat']);
		}
		$r = new WP_Query($query);
		if ($r->have_posts()) :
		
		
		
		echo $before_widget; 
		if ( $title ) echo $before_title . $title . $after_title; 
		
		echo'<div class="popular_posts_wrap">';
		echo'<ul class="thumb-list">';
		while ($r->have_posts())
		{
			$lightbox="true";
			$r->the_post();
			echo 	'<li>';
			if(!$thumbnail)
			{
				if (has_post_thumbnail() )
				{
					$thumb = get_post_thumbnail_id(); 
					$thumbwidth=75;
					$thumbheight=75;
					$image = thshpr_resize( $thumb, '', $thumbwidth, $thumbheight, true );
					$im='<div class="thumb-rollover alignleft"><a href="'.get_permalink().'"><img src="'.$image['url'].'" width="'.$image['width'].'" height="'.$image['height'].'" /></a></div>';
					echo $im;
				}
				
			}
			echo 	'<a class="thumb-title cuf caps" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
			if($extra=='time')
			{
				echo'	<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_date().'</a>';
			}
			else
			{
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt=='')
				{
					$excerpt = get_the_content();
				}
				echo 	'<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.wp_html_excerpt($excerpt,$desc_length).'...</a>';
			}
			echo 	'<div class="clear"></div>';
			echo 	'</li>';
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget; 
		
		// Reset the global $the_post as this query will have roflstomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('theme_widget_popular_posts', $cache, 'widget');
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Popular Posts Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		// Strip to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
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

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Popular Post Widget Settings 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

	function form( $instance ) {
		
		// Defaults
		$defaults = array(
		'title' => 'Popular Posts',
		'number' => '5',
		'desc_length' => '35',
		'disable_thumbnail' => 0,
		'display_extra_type' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();
		
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

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
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
			<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?' , 'thshpr'); ?></label></p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'thshpr' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'thshpr' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'thshpr' ); ?></option>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories:' , 'thshpr'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 // RECENT POSTS WIDGET
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

//add_action( 'widgets_init', 'thshpr_recent_posts_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_recent_posts_widget() {
	register_widget( 'thshpr_recent_posts_Widget' );
}

class thshpr_recent_posts_widget extends WP_Widget {

	function thshpr_recent_posts_Widget() {
		$widget_ops = array('classname' => 'widget_recent_posts', 'description' => __( "Displays the recent posts on your site", 'thshpr') );
		$this->WP_Widget('recent_posts', THEME_SLUG.' - '.__('Recent Posts', 'thshpr'), $widget_ops);
		$this->alt_option_name = 'widget_recent_posts';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//Display Recent Posts Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

	function widget($args, $instance) {
		$cache = wp_cache_get('theme_widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'thshpr') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$extra = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';
		
		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
		if(!empty($instance['cat'])){
			$query['cat'] = implode(',', $instance['cat']);
		}

		$r = new WP_Query($query);
		if ($r->have_posts()) :
		echo $before_widget; 
		if ( $title ) echo $before_title . $title . $after_title; 
		
		echo'<div class="popular_posts_wrap">';
		echo'<ul class="thumb-list">';
		while ($r->have_posts())
		{
			$lightbox="true";
			$r->the_post();
			echo 	'<li>';
			if(!$thumbnail)
			{
				if (has_post_thumbnail() )
				{
					$thumb = get_post_thumbnail_id(); 
					$thumbwidth=75;
					$thumbheight=75;
					$image = thshpr_resize( $thumb, '', $thumbwidth, $thumbheight, true );
					$im='<div class="thumb-rollover alignleft"><a href="'.get_permalink().'"><img src="'.$image['url'].'" width="'.$image['width'].'" height="'.$image['height'].'" /></a></div>';
					echo $im;
				}
				
			}
			echo 	'<a class="thumb-title cuf caps" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a>';
			if($extra=='time')
			{
				echo'	<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_date().'</a>';
			}
			else
			{
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt=='')
				{
					$excerpt = get_the_content();
				}
				echo 	'<a class="date" href="'.get_permalink().'" title="'.get_the_title().'">'.wp_html_excerpt($excerpt,$desc_length).'...</a>';
			}
			echo 	'<div class="clear"></div>';
			echo 	'</li>';
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget; 

		// Reset the global $the_post as this query will have roflstomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('theme_widget_recent_posts', $cache, 'widget');
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Recent Posts Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
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
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Recent Post Widget Settings 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function form( $instance ) {
		
		// Defaults
		$defaults = array(
		'title' => 'Popular Posts',
		'number' => '5',
		'desc_length' => '35',
		'disable_thumbnail' => 0,
		'display_extra_type' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();

		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

		$categories = get_categories('orderby=name&hide_empty=0'); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thshpr'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
			<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?', 'thshpr' ); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'thshpr' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'thshpr' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'thshpr' ); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories:' , 'thshpr'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_id('cat'); ?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->term_id;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 //MINI BLOG WIDGET
 /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

add_action( 'widgets_init', 'thshpr_mini_blog_widget' );

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_mini_blog_widget() {
	register_widget( 'thshpr_mini_blog_Widget' );
}

class thshpr_mini_blog_widget extends WP_Widget {

	function thshpr_mini_blog_Widget() {
		$widget_ops = array('classname' => 'widget_mini_blog', 'description' => __( "Displays a mini blog on your site", 'thshpr') );
		$this->WP_Widget('mini_blog',  THEME_SLUG.' - '.__('Mini_Blog', 'thshpr'), $widget_ops);
		$this->alt_option_name = 'widget_mini_blog';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//Display Mini Blog Widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	
	function widget($args, $instance) {
		 global $nude_options;
		 $category_tag_number=$nude_options['opt_widget_post_cat_num'];
		 $thumbnail_size=$nude_options['opt_widget_thumbnail_size'];
		 
		$cache = wp_cache_get('theme_widget_mini_blog', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Mini Blog', 'thshpr') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;
		
		if ( !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;
		else if ( $desc_length < 1 )
			$desc_length = 1;
		
		$thumbnail = $instance['disable_thumbnail'] ? '1' : '0';
		$extra = $instance['display_extra_type'] ? $instance['display_extra_type'] :'time';

		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish');
		if(!empty($instance['cat'])){
			$query['category_name'] = implode(',', $instance['cat']);
			
		}
		 $post_category=get_cat_ID( implode(',', $instance['cat']) );

		$the_query = new WP_Query($query);
		if ($the_query->have_posts()) :
		
		echo $before_widget; 
		if ( $title ) echo $before_title . $title . $after_title; 
		
		echo'<div class="popular_posts_wrap">';
		echo'<ul class="thumb-list">';
		while ( $the_query->have_posts() ) 
		{
			$the_query->the_post();
			$item_string=""; //set it up for concat
			
			$components = $nude_options['opt_widget_post_options']['enabled'];
 			$hidden_thumb="";
			if ( has_post_thumbnail() ) //hidden thumbnail for use in prev next buttons
			{ 
				$hidden_thumb=get_the_post_thumbnail(get_the_ID(),'prevnext' );
			}
			
			if ($components): foreach ($components as $key=>$value) 
			{
			 
			    switch($key) 
			    {
			 
				case 'thumbnail': 
					if ( has_post_thumbnail() ) 
					{ 
						$item_string.='<a href="'.get_permalink().'">
											<div class="grid">											
												<div class="effect-1">'.get_the_post_thumbnail(get_the_ID(),$thumbnail_size ).'
													<div class="item-1">
														<p><span class="centered"><i class="icon-link small-arrow"></i></span></p>
													</div>
													<div class="item-2">
														<p><span class="centered"><i class="icon-link"></i></span></p>
													</div>
												</div>
											</div>
										</a>
										<p class="featured-thumbnail-slider-paragraph extra-margin"></p>
										<p class="spacer-20"></p>'; 
					}
					break;
						 
					case 'description': 
						$item_string.='<a href="'.get_permalink().'"><p class="featured-thumbnail-slider-description featured-thumbnail-slider-paragraph">'.get_field( "mini_excerpt" ).'<br/>&#8594;</p></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_field( "mini_excerpt" ).'</span>';
					break;
									
					case 'title': 
						$item_string.='<a href="'.get_permalink().'"><p class="featured-thumbnail-slider-description featured-thumbnail-slider-paragraph">'.get_the_title().'<br/>&#8594;</p></a><div class="hidden-thumb">'.$hidden_thumb.'</div><span class="hidden-desc">'.get_the_title().'</span>';
					break;
								 
					case 'categories': 
						$categories = get_the_category();
						$separator = ' ';
						$output = '';
						if($categories)
						{
							$output.='<p class="featured-thumbnail-slider-categories featured-thumbnail-slider-paragraph">';
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
									
						case 'tags': 
							$posttags = get_the_tags();
							$separator = ' ';
							$output = '';
							if ($posttags) 
							{
								$output.='<p class="featured-thumbnail-slider-tags featured-thumbnail-slider-paragraph">';
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
							
						case 'author': 
							$item_string.='<p class="featured-thumbnail-slider-author featured-thumbnail-slider-paragraph"><i class="icon-user-5 icon"></i>';
							$item_string.=__( 'Posted By: ', 'naked' ).'<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'">'.get_the_author().'</a>';
							$item_string.='</p>';
							break;
									
						case 'date': 
							$item_string.='<p class="featured-thumbnail-slider-date featured-thumbnail-slider-paragraph"><i class="icon-calendar-inv icon"></i>';
							$item_string.=get_the_date(); 
							$item_string.='</p>';
						break;
						 
					    }
					 
					}
				endif;
						
			echo '  <li>'.$item_string.'</li>';
		}
		echo	'</ul>';
		echo	'</div>';
		echo $after_widget; 
		
		// Reset the global $the_post as this query will have roflstomped on it
		wp_reset_query();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('theme_widget_mini_blog', $cache, 'widget');
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Mini Blog Widget
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		// Strip to remove HTML
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['desc_length'] = (int) $new_instance['desc_length'];
		$instance['disable_thumbnail'] = !empty($new_instance['disable_thumbnail']) ? 1 : 0;
		$instance['display_extra_type'] = $new_instance['display_extra_type'];
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

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Mini Blog Settings 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

	function form( $instance ) {
		
		// Defaults
		$defaults = array(
		'title' => 'Popular Posts',
		'number' => '5',
		'desc_length' => '35',
		'disable_thumbnail' => 0,
		'display_extra_type' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$disable_thumbnail = isset( $instance['disable_thumbnail'] ) ? (bool) $instance['disable_thumbnail'] : false;
		$display_extra_type = isset( $instance['display_extra_type'] ) ? $instance['display_extra_type'] : 'time';
		$cat = isset($instance['cat']) ? $instance['cat'] : array();
		
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;

		if ( !isset($instance['desc_length']) || !$desc_length = (int) $instance['desc_length'] )
			$desc_length = 80;

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
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('disable_thumbnail'); ?>" name="<?php echo $this->get_field_name('disable_thumbnail'); ?>"<?php checked( $disable_thumbnail ); ?> />
			<label for="<?php echo $this->get_field_id('disable_thumbnail'); ?>"><?php _e( 'Disable Post Thumbnail?' , 'thshpr'); ?></label></p>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('display_extra_type'); ?>"><?php _e( 'Display Extra infomation type:', 'thshpr' ); ?></label>
			<select name="<?php echo $this->get_field_name('display_extra_type'); ?>" id="<?php echo $this->get_field_id('display_extra_type'); ?>" class="widefat">
				<option value="time"<?php selected($display_extra_type,'time');?>><?php _e( 'Time', 'thshpr' ); ?></option>
				<option value="description"<?php selected($display_extra_type,'description');?>><?php _e( 'Description', 'thshpr' ); ?></option>
			</select>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('desc_length'); ?>"><?php _e('Length of Description to show:', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('desc_length'); ?>" name="<?php echo $this->get_field_name('desc_length'); ?>" type="text" value="<?php echo $desc_length; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e( 'Categories:' , 'thshpr'); ?></label>
			<select style="height:5.5em" name="<?php echo $this->get_field_name('cat'); ?>[]" id="<?php echo $this->get_field_name('cat');?>" class="widefat" multiple="multiple">
				<?php foreach($categories as $category):?>
				<option value="<?php echo $category->name;?>"<?php echo in_array($category->term_id, $cat)? ' selected="selected"':'';?>><?php echo $category->name;?></option>
				<?php endforeach;?>
			</select>
		</p>
<?php
	}
}




/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
//AD 125
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Add function to widgets_init that'll load our widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

//add_action( 'widgets_init', 'thshpr_ad_125_widget' ); disabled for breathe

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
// Register widget
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/

function thshpr_ad_125_widget() {
	register_widget( 'thshpr_ad_125_Widget' );
}

class thshpr_ad_125_widget extends WP_Widget {

	function thshpr_ad_125_Widget() {
		$widget_ops = array('classname' => 'thshpr_ad_125_widget', 'description' => __( 'Displays a list of advertisements', 'thshpr' ) );
		$this->WP_Widget('thshpr_ad_125_Widget', THEME_SLUG.' - '.__('Advertisement', 'thshpr').' 125', $widget_ops);
		
		if ('widgets.php' == basename($_SERVER['PHP_SELF'])) {
			add_action( 'admin_print_scripts', array(&$this, 'add_admin_script') );
		}
	}
	
	function add_admin_script(){
		//wp_enqueue_script( 'advertisement-widget', THEME_ADMIN_ASSETS_URI . '/js/advertisement-widget.js', array('jquery'));
	}

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//Display Ad Widget
 	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

		$count = (int)$instance['count'];

		$output = '<ul><li class="adcontainer">';
		if( $count > 0){
			for($i=1; $i<= $count; $i++){
				$image = isset($instance['ad_'.$i.'_image'])?$instance['ad_'.$i.'_image']:'';
				$link = isset($instance['ad_'.$i.'_link'])?$instance['ad_'.$i.'_link']:'';
				if(empty($image)){
					$output .= '<a href="'.$link.'" rel="nofollow" target="_blank" alt="Advertisment"><img src="'.THSHPR_DIRECTORY.'/images/default-120.png" alt="Advertisement"/  class="thumb-frame"></a>';
				}
				else
				{
					$output .= '<a href="'.$link.'" rel="nofollow" target="_blank" alt="Advertisment"><img src="'.$image.'" alt="Advertisement"/  class="thumb-frame"></a>';
				}
				
			}
		}
		$output .= '</li></ul>';
		
		if ( !empty( $output ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
			echo $output;
			echo $after_widget;
		}
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Update Ad Widget
 	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = (int) $new_instance['count'];
		for($i=1;$i<=$instance['count'];$i++){
			$instance['ad_'.$i.'_image'] = strip_tags($new_instance['ad_'.$i.'_image']);
			$instance['ad_'.$i.'_link'] = strip_tags($new_instance['ad_'.$i.'_link']);
		}
		return $instance;
	}
	
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
	//	Ad Widget Settings 
 	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -*/
 
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$count = isset($instance['count']) ? absint($instance['count']) : 4;
		for($i=1;$i<=10;$i++){
			$ad_image = 'ad_'.$i.'_image';
			$$ad_image = isset($instance[$ad_image]) ? $instance[$ad_image] : '';
			$ad_link = 'ad_'.$i.'_link';
			$$ad_link = isset($instance[$ad_link]) ? $instance[$ad_link] : '';
		}
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'thshpr'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('How many advertisement to display?', 'thshpr'); ?></label>
			<input id="<?php echo $this->get_field_id('count'); ?>" class="advertisement_count" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" size="3" />
		</p>

		<p>
			<em><?php _e("Note: Please input FULL URL <br/>(e.g. <code>http://www.example.com</code>)", 'thshpr');?></em>
		</p>

		<div class="advertisement_wrap">
		
		<?php for($i=1;$i<=10;$i++): $ad_image = 'ad_'.$i.'_image';$ad_link = 'ad_'.$i.'_link'; ?>
			<div class="advertisement_<?php echo $i;?>" <?php if($i>$count):?>style="display:none"<?php endif;?>>
				<p>
					<label for="<?php echo $this->get_field_id( $ad_image ); ?>"><?php printf(__('#%s Image URL:', 'thshpr'),$i);?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( $ad_image ); ?>" name="<?php echo $this->get_field_name( $ad_image ); ?>" type="text" value="<?php echo $$ad_image; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id( $ad_link ); ?>"><?php printf(__('#%s Link:', 'thshpr'),$i);?></label>
					<input class="widefat" id="<?php echo $this->get_field_id( $ad_link ); ?>" name="<?php echo $this->get_field_name( $ad_link ); ?>" type="text" value="<?php echo $$ad_link; ?>" />
				</p>
			</div>

		<?php endfor;?>
		</div>
<?php
	}
}
?>
