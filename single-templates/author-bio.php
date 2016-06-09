<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="author-info">
	<h2 class="author-heading"><?php _e( 'Published by', 'thshpr' ); ?></h2>
	<div class="author-avatar">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Twenty Fifteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */

		echo get_avatar( get_the_author_meta( 'user_email' ), 100 );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description">
		<h3 class="author-title"><?php echo get_the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s', 'thshpr' ), get_the_author() ); ?>
			</a>
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->

<?php
$twitter_url=get_the_author_meta( 'twitter' );
$facebook_url=get_the_author_meta( 'facebook' );
$googleplus_url=get_the_author_meta( 'googleplus' );
$linkedin_url=get_the_author_meta( 'linkedin' );
$pinterest_url=get_the_author_meta( 'pinterest' );
$extrainfo_url=get_the_author_meta( 'extrainfo' );
$website_url=get_the_author_meta( 'url' );

$item_string.='
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
echo $item_string;

?>
