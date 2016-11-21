<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
/**
 * The template for displaying Author bios
 * Grabs info from the user part of the admin, no options for this other than id
 *
 * @package naked
 */

$uri=fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/about-the-author');

$unique_id='id-'.$atts['id'];

$twitter_url=get_the_author_meta( 'twitter' );
$facebook_url=get_the_author_meta( 'facebook' );
$googleplus_url=get_the_author_meta( 'googleplus' );
$linkedin_url=get_the_author_meta( 'linkedin' );
$pinterest_url=get_the_author_meta( 'pinterest' );
$youtube_url=get_the_author_meta( 'youtube' );
$instagram_url=get_the_author_meta( 'instagram' );
$tumblr_url=get_the_author_meta( 'tumblr' );
$vine_url=get_the_author_meta( 'vine' );
$snapchat_url=get_the_author_meta( 'snapchat' );
$reddit_url=get_the_author_meta( 'reddit' );
$flickr_url=get_the_author_meta( 'flickr' );
$email_url=get_the_author_meta( 'email' );
$website_url=get_the_author_meta( 'url' );


$show_dividers=$atts['opt_show_dividers'];
$divider_type=fw_locate_theme_path_uri('/static/img/').$atts['opt_divider_type'];
$height=8;
$style_string='"background-image: url('.$divider_type.'.png); height:'.$height.'px;"';


//generate user social link contraptoid
$item_string='
<div class="share-outer component-element '.$unique_id.'">
    <div class="social-share-boxes share-boxes featured-posts-grid-paragraph">
        <div class="absolute-container">
        <i class="a fa fa-share-alt start-icon background-accent share"></i><span class="share-label small-italic">'.__( 'Author Links ', 'thshpr' ).'</span><!--';

		// generate author strings
		if($website_url!="")
		{
			$item_string.='--><span class="social-box website"><a class="inner website-inner" href="'.$website_url.'"><i class="fa fa fa-link icon"></i></a></span><!--';
		}
		if($facebook_url!="")
		{
			$item_string.='--><span class="social-box facebook"><a class="inner facebook-inner" href="'.$facebook_url.'"><i class="fa fa-facebook icon"></i></a></span><!--';
		}
		if($twitter_url!="")
		{
			$item_string.='--><span class="social-box twitter"><a class="inner twitter-inner" href="'.$twitter_url.'"><i class="fa fa-twitter icon"></i></a></span><!--';
		}
		if($googleplus_url!="")
		{
			$item_string.='--><span class="social-box google-plus"><a class="inner google-plus-inner" href="'.$googleplus_url.'"><i class="fa fa-google-plus icon"></i></a></span><!--';
		}
		if($linkedin_url!="")
		{
			$item_string.='--><span class="social-box linked-in"><a class="inner linked-in-inner" href="'.$linkedin_url.'"><i class="fa fa-linkedin icon"></i></a></span><!--';
		}
		if($pinterest_url!="")
		{
			$item_string.='--><span class="social-box pinterest"><a class="inner pinterest-inner" href="'.$pinterest_url.'"><i class="fa fa-pinterest icon"></i></a></span><!--';
		}
        if($instagram_url!="")
		{
			$item_string.='--><span class="social-box instagram"><a class="inner instagram-inner" href="'.$instagram_url.'"><i class="fa fa-instagram icon"></i></a></span><!--';
		}
        if($youtube_url!="")
		{
			$item_string.='--><span class="social-box youtube"><a class="inner youtube-inner" href="'.$youtube_url.'"><i class="fa fa-youtube icon"></i></a></span><!--';
		}
        if($tumblr_url!="")
		{
			$item_string.='--><span class="social-box tumblr"><a class="inner tumblr-inner" href="'.$tumblr_url.'"><i class="fa fa-tumblr icon"></i></a></span><!--';
		}
        if($vine_url!="")
		{
			$item_string.='--><span class="social-box vine"><a class="inner vine-inner" href="'.$vine_url.'"><i class="fa fa-vine icon"></i></a></span><!--';
		}
        if($snapchat_url!="")
		{
			$item_string.='--><span class="social-box snapchat"><a class="inner snapchat-inner" href="'.$snapchat_url.'"><i class="fa fa-snapchat icon"></i></a></span><!--';
		}
        if($reddit_url!="")
		{
			$item_string.='--><span class="social-box reddit"><a class="inner reddit-inner" href="'.$reddit_url.'"><i class="fa fa-reddit icon"></i></a></span><!--';
		}
        if($flickr_url!="")
		{
			$item_string.='--><span class="social-box flickr"><a class="inner flickr-inner" href="'.$flickr_url.'"><i class="fa fa-flickr icon"></i></a></span><!--';
		}
        if($email_url!="")
		{
			$item_string.='--><span class="social-box email"><a class="inner email-inner" href="mailto:'.$email_url.'"><i class="fa fa-envelope icon"></i></a></span>';
		}

$item_string.='
        </div>
    </div>
</div>';
?>

<div class="author-info">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 114 ); ?>
	</div><!-- .author-avatar -->
	<div class="author-content">
		<h4 class="author-title"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h4>
        <?php if($show_dividers){ ?>
        <div class="divider-header component-element">
    		<div class="divider-container">
    			<?php
    				echo'<div class="divider-background" style='.$style_string.'></div>';
    			?>
    		</div>
    	</div>
        <?php } ?>
        <div class="author-extra-info meta-excerpt component-element"><?php echo get_the_author_meta( 'extrainfo' ); ?></div>
        <p class="author-bio">
			<?php
                $bio = nl2br(get_the_author_meta('description'));
                echo $bio;
            ?>
		</p>
        <?php if($show_dividers){ ?>
        <div class="divider-header component-element">
    		<div class="divider-container">
    			<?php
    				echo'<div class="divider-background" style='.$style_string.'></div>';
    			?>
    		</div>
    	</div>
        <?php } ?>
		<?php echo $item_string;?>
	</div><!-- .author-description -->
</div><!-- .author-info -->
