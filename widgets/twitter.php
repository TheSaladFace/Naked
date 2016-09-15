<?php
/**
* Description: Twitter Widget, gets and rotates twitter posts.
* Author: Naked Themes
* URL: http://meshaper.com
* Date 25/03/2015
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* @package naked
**/


add_action( 'widgets_init', 'thshpr_twitter_widget' );

/**
* Register the widget
* @since 0.1
*/
function thshpr_twitter_widget() {
	register_widget( 'thshpr_twitter_Widget' );
}

function parseTweet($text) {
	$text = preg_replace('#http://[a-z0-9._/-]+#i', '<a  target="_blank" href="$0">$0</a>', $text);
	$text = preg_replace('#@([a-z0-9_]+)#i', '@<a  target="_blank" href="http://twitter.com/$1">$1</a>', $text);
	$text = preg_replace('# \#([a-z0-9_-]+)#i', ' #<a target="_blank" href="http://twitter.com/search?q=%23$1">$1</a>', $text);
	$text = preg_replace('#https://[a-z0-9._/-]+#i', '<a  target="_blank" href="$0">$0</a>', $text);

	return $text;
}
class thshpr_twitter_widget extends WP_widget
{

	function thshpr_twitter_Widget() 
	{
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __( "Displays your twitter feed", 'naked') );
		$this->WP_Widget('twitter', __('(Theme) Twitter', 'naked'), $widget_ops);
		$this->alt_option_name = 'widget_twitter';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	/**
	 * Front-end display of widget.
	 * @since 0.1
	 */
	function widget($args, $data)
	{
		 wp_enqueue_script( 'naked-slick-js');
		 wp_enqueue_script( 'full-featured-slider-init-js');
		 wp_enqueue_style( 'naked-slick');
		 wp_enqueue_style( 'naked-slick-theme');


		$title      = apply_filters('widget_title', $data['title'] );
		$nbTweets       = $data['nbTweets'];
		$consumer_key       = $data['consumer_key'];
		$consumer_secret       = $data['consumer_secret'];
		$access_token       = $data['access_token'];
		$access_token_secret       = $data['access_token_secret'];
		$rotation_speed      = $data['rotation_speed'];
		extract($args);
		echo $before_widget;
		if ( $title )
		{
			echo $before_title.$title.$after_title;
		}
		$cache = plugin_dir_path(__FILE__).'cache/twitter.txt';
		if(time() - filemtime($cache) > $data['cachetime'])
		{
			include_once 'class/twitteroauth.php';
			$connect = new TwitterOAuth($data['consumer_key'],$data['consumer_secret'],$data['access_token'],$data['access_token_secret']);
			$tweets = $connect->get('statuses/user_timeline', array('count' => $data['nbTweets']));
			file_put_contents($cache, serialize($tweets));
		}
		else
		{
			$tweets = unserialize(file_get_contents($cache));
		}

		if ( !$consumer_key || !$consumer_secret || !$access_token || !$access_token_secret )
		{
			echo "No Tweets Available or bad configuration...";
		}
		else
		{

			$tweet_speed=$data['rotation_speed']*1000;

			if(!empty($tweets))
			{

				?>
				<script type="text/javascript">
					jQuery(document).ready(function(){
						  jQuery('.twitter-slick').slick({
						    autoplay: true,
						    autoplaySpeed: <?php echo $tweet_speed; ?>,
						  });
						});
				</script>
				<?php

				echo '<div class="twitter"><div class="twitter-slick">';

				$random = 9;

				foreach($tweets as $tweet)
				{
					$text = parseTweet($tweet->text);
					$screen_name = $tweet->user->screen_name;
					$name = $tweet->user->name;
					$retweet = $tweet->id_str;
					$time = date('d M Y',strtotime($tweet->created_at));
					?>

					<div>
						<div class="tweet-content twitter-row">
							<div class="stream-item-header">

								<?php
								if ($data['fullname'] )
								{
									$fullname= '<i class="icon-twitter twitter-feed-twitter"></i><strong class="fullname">' . $name . '</strong>';
								}
								if ($data['username'] )
								{
									$fullname= '<i class="icon-twitter twitter-feed-twitter"></i><a class="account-group" href="http://twitter.com/'.$screen_name.'" target="_blank"><span class="username"> @'.$screen_name. '</span></a>';
								}
								?>
								<?php echo $fullname; ?>
							</div>
							<p class="timestamp entry-meta twitter-row twitter-date">
								<a href="https://twitter.com/'.$screen_name.'/status/'.$retweet.'" target="_blank"><i class="icon-calendar-inv meta-icon"></i><?php echo $time; ?></a>
							</p>
							<div class="striped-divider"></div>
							<div class="tweet-text twitter-row"><?php echo $text; ?></div>
							<div class="striped-divider"></div>
							<div class="twitter-actions entry-meta twitter-row">
								<span><a onClick="window.open('https://twitter.com/intent/tweet?in_reply_to=<?php echo $retweet; ?>','Twitter','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" class="reply-tweet" href="https://twitter.com/intent/tweet?in_reply_to=<?php echo $retweet; ?>"><i class="icon-twitter meta-icon"></i>Reply</a></span>
								<span><a onClick="window.open('https://twitter.com/intent/retweet?tweet_id=<?php echo $retweet; ?>','Twitter','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" class="retweet" href="https://twitter.com/intent/retweet?tweet_id=<?php echo $retweet; ?>"><i class="icon-calendar-inv meta-icon"></i>Retweet</a></span>
								<span><a onClick="window.open('https://twitter.com/intent/favorite?tweet_id=<?php echo $retweet; ?>','Twitter','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" class="favorite-tweet" href="https://twitter.com/intent/favorite?tweet_id=<?php echo $retweet; ?>"><i class="icon-thumbs-up meta-icon"></i>Favorite</a></span>
							</div>


						</div>
					</div>
				<?php
				}

				echo "</div></div>";
			}
		}

		echo $after_widget;
	}

	/**
	 * Save and sanitize values
	 * @since 0.1
	 */
	function update($new_data, $old_data)
	{
		$data = $old_data;

		//Strip tags from title and name to remove HTML
		$data['title']      = strip_tags( $new_data['title'] );
		$data['nbTweets']       = strip_tags( $new_data['nbTweets'] );
		$data['fullname']   = strip_tags( $new_data['fullname'] );
		$data['username']   = strip_tags( $new_data['username'] );
		$data['cachetime']   = strip_tags( $new_data['cachetime'] );
		$data['consumer_key']   = strip_tags( $new_data['consumer_key'] );
		$data['consumer_secret']   = strip_tags( $new_data['consumer_secret'] );
		$data['access_token']   = strip_tags( $new_data['access_token'] );
		$data['access_token_secret']   = strip_tags( $new_data['access_token_secret'] );
		$data['rotation_speed']   = strip_tags( $new_data['rotation_speed'] );

		return $data;
	}

	function flush_widget_cache() {
		wp_cache_delete('twitter', 'widget');
	}

	/**
	 * Build the actual widget in the Dashboard
	 * @since 0.1
	 */
	function form($data)
	{
		$defaults = array(
		'title' => __('Latest Tweets', __('(Theme) Twitter', 'naked')),
		'nbTweets' => '3',
		'fullname' => '',
		'username' => '',
		'cachetime' => '1',
		'consumer_key' => '',
		'consumer_secret' => '',
		'access_token' => '',
		'access_token_secret' => '',
		'rotation_speed' =>'6'
		);
		$data = wp_parse_args( (array) $data, $defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $data['title']; ?>" />
		</p>

		<h3><?php _e('Widget Settings', 'naked'); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id( 'nbTweets' ); ?>"><?php _e('Number of Tweets:', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'nbTweets' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'nbTweets' ); ?>" value="<?php echo $data['nbTweets']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'cachetime' ); ?>"><?php _e('Time of cache : (in seconds)', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'cachetime' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'cachetime' ); ?>" value="<?php echo $data['cachetime']; ?>" />
		</p>

		<p>
			  <label for="<?php echo $this->get_field_id("fullname"); ?>">
				  <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("fullname"); ?>" name="<?php echo $this->get_field_name("fullname"); ?>"<?php checked( (bool) $data["fullname"], true ); ?> />
				   <?php _e( 'Show fullname', 'naked' ); ?>
			   </label>
		</p>

		<p>
			  <label for="<?php echo $this->get_field_id("username"); ?>">
			  	  <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("username"); ?>" name="<?php echo $this->get_field_name("username"); ?>"<?php checked( (bool) $data["username"], true ); ?> />
				  <?php _e( 'Show username', 'naked' ); ?>
			  </label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rotation_speed' ); ?>"><?php _e('Rotation Speed (seconds) :', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'rotation_speed' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'rotation_speed' ); ?>" value="<?php echo $data['rotation_speed']; ?>" />
		</p>

		<h3><?php _e('API Settings', 'naked'); ?></h3>
		<small><?php _e('You need to create an application on <a href="https://apps.twitter.com/" target="_blank">Twitter for Developer</a> to have an access to this information.', 'naked'); ?></small><br />

		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_key' ); ?>"><?php _e('Consumer key :', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'consumer_key' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'consumer_key' ); ?>" value="<?php echo $data['consumer_key']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'consumer_secret' ); ?>"><?php _e('Consumer secret :', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'consumer_secret' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'consumer_secret' ); ?>" value="<?php echo $data['consumer_secret']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'access_token' ); ?>"><?php _e('Access token :', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'access_token' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'access_token' ); ?>" value="<?php echo $data['access_token']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'access_token_secret' ); ?>"><?php _e('Access token secret :', 'naked'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'access_token_secret' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'access_token_secret' ); ?>" value="<?php echo $data['access_token_secret']; ?>" />
		</p>

		<?php
	}
}

?>
