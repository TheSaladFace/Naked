<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

$twitter_url=get_the_author_meta( 'twitter' );
$facebook_url=get_the_author_meta( 'facebook' );
$googleplus_url=get_the_author_meta( 'googleplus' );
$linkedin_url=get_the_author_meta( 'linkedin' );
$pinterest_url=get_the_author_meta( 'pinterest' );
$website_url=get_the_author_meta( 'url' );
$background_image_url=$divider_type=get_template_directory_uri ().'/static/img/divider-stripes-large.png';


//$background_image_style_string='style="background: url('.$background_image_url.') top left repeat;"';
$background_image_style_string='style="border-style: solid;
border-width: 9px;
-moz-border-image: url('.$background_image_url.') 9 round;
-webkit-border-image: url('.$background_image_url.') 9 round;
-o-border-image: url('.$background_image_url.') 9 round;
border-image: url('.$background_image_url.') 9 round;"';

//generate user social link contraptoid
$item_string='
<div class="share-boxes featured-posts-grid-paragraph component-element">
    <div class="absolute-container">
        <i class="fa fa-link icon link-outer"></i><span class="share-label">'.__( 'Author Links ', 'thshpr' ).'</span><!--';

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
			$item_string.='--><span class="social-box pinterest"><a class="inner pinterest-inner" href="'.$pinterest_url.'"><i class="fa fa-pinterest icon"></i></a></span>';
		}

$item_string.='
    </div>
</div>';
?>

<div class="author-info" <?php echo $background_image_style_string; ?>>
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 114 ); ?>
	</div><!-- .author-avatar -->
	<div class="author-content">
		<h4 class="author-title"><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h4>
		<div class="author-extra-info meta-excerpt component-element"><?php echo get_the_author_meta( 'extrainfo' ); ?></div>
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
		<?php echo $item_string;?>
	</div><!-- .author-description -->
</div><!-- .author-info -->
